<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoStoreRequest;
use App\Http\Requests\PhotoUpdateRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
// upload image thumnail
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    protected $uploadPath;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:photos.index|photos.create|photos.edit|photos.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryPhotos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->get();
        $photos = Photo::latest()->when(request()->q, function($photos) {
            $photos = $photos->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.photo.index', compact('photos', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoStoreRequest $request)
    {

         //upload image (cara kedua)
         if ($request->has('image')) {
            # upload with image
            $image = $request->file('image');
            $fileName = time().$image->getClientOriginalName();
           
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\config\cms.php
                $width = config('cms.image.thumbnailphoto.width');
                $height = config('cms.image.thumbnailphoto.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }

            // Tampung isi image ke variable data
            $image_data = $fileName;
        }

        $photo = Photo::create([
            'image'     => $image_data,
            'caption'   => $request->input('caption'),
            'album_id'   => $request->input('album_id')
        ]);

        if($photo){
            //redirect dengan pesan sukses
            return redirect()->route('admin.photo.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.photo.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('admin.photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoUpdateRequest $request, Photo $photo)
    {

        $photo = Photo::findOrFail($photo->id);
       
         //cek gambar lama
         $oldImage = $photo->image;

         if ($request->has('image')) {
           
            # upload with image
            $image = $request->file('image');
            //$fileName = $image->getClientOriginalName();
            $fileName = time().$image->getClientOriginalName();
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailpoto.width');
                $height = config('cms.image.thumbnailphoto.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }
            // Tampung isi image ke variable data
            $image_data = $fileName;

            $event_data = [
                'image'     => $image_data,
                'caption'   => $request->input('caption'),
                'album_id'   => $request->input('album_id')
            ];
           
        }
        else {
            $event_data = [
                'caption'   => $request->input('caption'),
                'album_id'   => $request->input('album_id')
            ];
        }
        
        // update photo
        $photo->update($event_data);
        
          // Jika gambar lama ada maka lakukan hapus gambar
          if ($oldImage !== $photo->image) {
            $this->removeImage($oldImage);
        }

        if($photo){
            //redirect dengan pesan sukses
            return redirect()->route('admin.photo.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.photo.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $image = Storage::disk('local')->delete('public/photos/'.$photo->image);
        $photo->delete();

        if($photo){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }


    // fucntion remove image
    private function removeImage($image)
    {
        if ( ! empty($image) )
        {
            $imagePath     = $this->uploadPath . '/' . $image;
            $ext           = substr(strrchr($image, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;
            
            if ( file_exists($imagePath) ) unlink($imagePath);
            if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
        }
    }
}
