<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// upload image thumnail
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    protected $uploadPath;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:slider.index|sliders.create|sliders.delete']);
        $this->uploadPath = public_path(config('cms.image.directorySliders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->when(request()->q, function($sliders) {
            $sliders = $sliders->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:3000',
            'title'     => 'required',
            'link'     => 'required'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/sliders', $image->hashName());
        
        
         //upload image (cara kedua)
         if ($request->has('image')) {
            # upload with image
            $image = $request->file('image');
            $fileName = time().$image->getClientOriginalName();
           
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailslider.width');
                $height = config('cms.image.thumbnailslider.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }

            // Tampung isi image ke variable data
            $image_data = $fileName;
        }

        $slider = Slider::create([
            'image'     => $image_data,
            'title'     => $request->input('title'),
            'link'      => $request->input('link'),
            'slug'      => Str::slug($request->input('title'), '-'),
            'author_id'   => Auth::id() 
        ]);

        $slider->save();

        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.slider.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $slider = Slider::findOrFail($id);
        $image = Storage::disk('local')->delete('public/sliders/'.$slider->image);
        $slider->delete();

        if($slider){
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
