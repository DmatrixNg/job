<?php
namespace App\Core;

use Auth;

use Image;
/**
 *
 */
class Images
{


  public function store($image,$filenamewithextension,$filename,$extension)
{

  //Log::debug($image);

      //filename to store
      $filenametostore = $filename.'_'.time().'.'.$extension;
      //small thumbnail name
      $smallthumbnail = $filename.'_small_'.time().'.'.$extension;

      //medium thumbnail name
      $mediumthumbnail = $filename.'_medium_'.time().'.'.$extension;

      //large thumbnail name
      $largethumbnail = $filename.'_large_'.time().'.'.$extension;

      //Upload File
      $image->storeAs('public/'.Auth::user()->id.'/images/', $filenametostore);
      $image->storeAs('public/'.Auth::user()->id.'/images/thumbnail', $smallthumbnail);
      $image->storeAs('public/'.Auth::user()->id.'/images/thumbnail', $mediumthumbnail);
      $image->storeAs('public/'.Auth::user()->id.'/images/thumbnail', $largethumbnail);

      // dd($image->storeAs('public/'.Auth::user()->id.'/images/', $filenametostore));
      //create small thumbnail
      $smallthumbnailpath = public_path('storage/'.Auth::user()->id.'/images/thumbnail/'.$smallthumbnail);
      $this->createThumbnail($smallthumbnailpath, 150, 93);

      //create medium thumbnail
      $mediumthumbnailpath = public_path('storage/'.Auth::user()->id.'/images/thumbnail/'.$mediumthumbnail);
      $this->createThumbnail($mediumthumbnailpath, 300, 185);

      //create large thumbnail
      $largethumbnailpath = public_path('storage/'.Auth::user()->id.'/images/thumbnail/'.$largethumbnail);
      $this->createThumbnail($largethumbnailpath, 550, 340);

      $imagePath ='/storage/'.Auth::user()->id.'/images/thumbnail/'.$mediumthumbnail;
      // dd($imagePath );
      return $imagePath;

}
      /**
      * Create a thumbnail of specified size
      *
      * @param string $path path of thumbnail
      * @param int $width
      * @param int $height
      */
      public function createThumbnail($path, $width, $height)
      {
        // dd($path);
      $img = Image::make($path)->resize($width, $height, function ($constraint) {
      $constraint->aspectRatio();
      });
      $img->save($path);

      //$img = Image::make($path)->resize($width, $height)->save($path);
      }

}
