<?php

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// upload image thumnail
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumStoreRequest;
use App\Http\Requests\AlbumUpdateRequest;

class AlbumController extends Controller
{
    protected $uploadPath;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:albums.index|albums.create|albums.edit|albums.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryAlbums'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->when(request()->q, function($albums) {
            $albums = $albums->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumStoreRequest $request)
    {

         //upload image (cara kedua)
         if ($request->has('image')) {
            # upload with image
            $image = $request->file('image');
            $fileName = time().$image->getClientOriginalName();
           
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailalbum.width');
                $height = config('cms.image.thumbnailalbum.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }

            // Tampung isi image ke variable data
            $image_data = $fileName;
        }

        // dd($image_data);
        $album = Album::create([
            'image'     => $image_data,
            'title'     => $request->input('title'),
            'description'     => $request->input('description'),
            'slug'      => Str::slug($request->input('title'), '-')
        ]);
            
        $album->save();

        if($album){
            //redirect dengan pesan sukses
            return redirect()->route('admin.album.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.album.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumUpdateRequest $request, Album $album)
    {

        $album = Album::findOrFail($album->id);
       
         //cek gambar lama
         $oldImage = $album->image;

         if ($request->has('image')) {
           
            # upload with image
            $image = $request->file('image');
            //$fileName = $image->getClientOriginalName();
            $fileName = time().$image->getClientOriginalName();
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailalbum.width');
                $height = config('cms.image.thumbnailalbum.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }
            // Tampung isi image ke variable data
            $image_data = $fileName;

            $event_data = [
                'image'       => $image_data,
                'title'       => $request->input('title'),
                'description'     => $request->input('description'),
                'slug'        => Str::slug($request->input('title'), '-')
            ];
           
        }
        else {
            $event_data = [
                'title'       => $request->input('title'),
                'description'     => $request->input('description'),
                'slug'        => Str::slug($request->input('title'), '-')
            ];
        }
        
        // update album
        $album->update($event_data);
        
          // Jika gambar lama ada maka lakukan hapus gambar
          if ($oldImage !== $album->image) {
            $this->removeImage($oldImage);
        }

        if($album){
            //redirect dengan pesan sukses
            return redirect()->route('admin.album.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.album.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $album = Album::findOrFail($id);
        $album->delete();

        if($album){
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
