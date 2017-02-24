<?php
namespace App\Models;
use DB;
use Carbon\Carbon;
use App\Models\Tag;
use App\Services\Parsedowner;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content_raw', 'meta_description',
        'is_draft', 'published_at', 'admin_id','expired_at','is_file'
    ];

    /**
     * The morph class name for this model.
     *
     * @var array
     */
    protected $morphClass = 'Post';

    /**
     * Set the title attribute and the slug.
     *
     * @param string $value
     */
    public function setTitleAttribute( $value )
    {
        $this->attributes[ 'title' ] = $value;
        if ( !$this->exists ) {
            $this->setUniqueSlug( $value, '' );
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param string $title
     * @param mixed $extra
     */
    protected function setUniqueSlug( $title, $extra )
    {
        $slug = str_slug( $title . '-' . $extra );
        if ( static::whereSlug( $slug )->exists() ) {
            $this->setUniqueSlug( $title, $extra + 1 );

            return;
        }
        $this->attributes[ 'slug' ] = $slug;
    }

    /**
     * Set the HTML content automatically when the raw content is set.
     *
     * @param string $value
     */
    public function setContentRawAttribute( $value )
    {
        $markdown = new Parsedowner();
        $this->attributes[ 'content_raw' ] = $value;
        $this->attributes[ 'content_html' ] = $markdown->toHTML( $value );
    }

    /**
     * Sync tag relationships and add new tags as needed.
     *
     * @param array $tags
     */
    public function syncTags( array $tags )
    {
        Tag::addNeededTags( $tags );
        if ( count( $tags ) ) {
            $this->tags()->sync(
                Tag::whereIn( 'tag', $tags )->lists( 'id' )->all()
            );

            return;
        }
        $this->tags()->detach();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany( 'App\Models\Tag', 'post_tag_pivot' );
    }

    /**
     * Get the raw content attribute.
     *
     * @param $value
     *
     * @return Carbon|\Illuminate\Support\Collection|int|mixed|static
     */
    public function getContentAttribute( $value )
    {
        return $this->content_raw;
    }

    /**
     * Scope a query to get published or non published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param bool $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft( $query, $type = TRUE )
    {
        return $query->whereIsDraft( $type );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne( 'App\Models\Image', 'imageable' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo( 'App\Models\Admin', 'admin_id' );
    }

     public function getPost($id)
    {
            $current_date = Carbon::now();
             
            return DB::table('postsview')
            ->where('tag_id', $id)
            ->where('published_at','<=',$current_date)
            ->where('expired_at','>=',$current_date)
            ->orderBy('published_at','desc')
            ->get();
    }

    public function getarchieve($id)
    {
             $current_date = Carbon::now();
             return DB::table('postsview')
                    ->where('tag_id', $id)
                    ->where('published_at','<=',$current_date)
                    ->where('expired_at','<',$current_date)
                    ->orderBy('published_at','desc')
                    ->get();
        

    }


    public function delete(array $options = array())
    {
        if ( ! empty($this->image))
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }


}