<?php

namespace App\Models;

use File;
use App\Services\ImageManager;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image extends Model
{   
    /**
     * Constant for default image path
     */
    const IMAGE_PATH = 'images/';

    /**
     * Constant for default thumbnail path
     */
    const THUMB_PATH = 'images/thumbnails/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'path', 'size','imageable_type','imageable_id' ];

    /**
     * @param $image
     */
    public function upload($image)
    {
        if ( $image instanceof UploadedFile && $image->isValid() ) {

            $this->removeImage();
            
            $this->size = File::size($image);

            $this->path = ImageManager::upload( $image, $this->image_path, $this->name );

            $this->save();
        }
    }

    /**
     * Remove Image File Function
     */
    public function removeImage()
    {
        if ( !empty( $this->path ) && file_exists( $this->path ) )
            unlink($this->path);
    }

    /**
     * @param int $w
     * @param int $h
     * @return string
     */
    public function resize($w = null, $h = null)
    {
        if ( empty( $this->path ) or !file_exists( ltrim($this->path, '/') ) ) {

            return config('paths.placeholder.default');

        } else {

            return ImageManager::resize( $w, $h, $this->path, self::THUMB_PATH );

        }
    }

    /**
     * @return mixed
     */
    public function getImagePathAttribute()
    {
        $class = $this->imageable_type;

        if ( is_null(config('paths.image.'.$class)) ) return self::IMAGE_PATH;

        return ltrim(config('paths.image.'.$class), '/');
    }

    /**
     * @param int $w
     * @param int $h
     * @return string
     */
    public function thumbnail($w = 150, $h = 150)
    {   
        if ( empty( $this->path ) or !file_exists( ltrim($this->path, '/') ) ) {

            return config('paths.placeholder.post');

        } else {

            return ImageManager::getThumbnail($w, $h, ltrim($this->path, '/'), self::THUMB_PATH, str_slug($this->imageable_type));

        }
    }

    public function placeholder($w = 150, $h = 150,$type)
    {
        if($type == "technology"){
          return ImageManager::getThumbnail($w, $h, ltrim('assets/frontend/img/populartest_placeholder.png', '/'), self::THUMB_PATH, str_slug($type));
        }
        elseif($type == "staff"){
          return ImageManager::getThumbnail($w, $h, ltrim('assets/frontend/img/staffphoto_placeholder.png', '/'), self::THUMB_PATH, str_slug($type));  
        }
        elseif($type == "department"){
          return ImageManager::getThumbnail($w, $h, ltrim('assets/frontend/img/department_placeholder.png', '/'), self::THUMB_PATH, str_slug($type));  
        }
        elseif($type == "post"){
          return ImageManager::getThumbnail($w, $h, ltrim('assets/frontend/img/image_not_found.png', '/'), self::THUMB_PATH, str_slug($type));  
        }
        else{
             return ImageManager::getThumbnail($w, $h, ltrim('assets/frontend/img/image_not_found.png', '/'), self::THUMB_PATH, str_slug('placeholder')); 
        }

    }

    public function getImage($type,$id)
    {   
        
      return   Image::select()->where('imageable_type',$type)
                       ->where('imageable_id',$id)->get();
                  
    }

    /**
     * @param array $options
     * @return bool|null
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        $this->removeImage();

        return parent::delete($options);
    }
}
