<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use db;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag', 'icon', 'title', 'meta_description'
    ];

    /**
     * Get the posts relationship.
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_tag_pivot');
    }

    /**
     * Add tags from the list.
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }
        $found = static::whereIn('tag', $tags)->lists('tag')->all();
        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'meta_description' => ''
            ]);
        }
    }

    public function getTag($id)
    {
        $tagId = DB::table('post_tag_pivot')->select()->where('post_id',$id)->first();
        $tagTitle=Tag::select('title')->where('id',$tagId->tag_id)->get();
        
        return $tagTitle;
    }
}