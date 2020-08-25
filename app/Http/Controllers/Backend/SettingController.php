<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// upload image thumnail
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    protected $uploadPath;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:settings.index|settings.create|settings.edit|settings.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryPhotos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('id','asc')->get();

        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.create');
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
            'title' => 'required|unique:settings',
            'description' => 'required',
            'logo'  => 'required|image|mimes:jpeg,jpg,png|max:1000',
            'favicon'  => 'required|image|mimes:jpeg,jpg,png|max:1000',
            'url' => 'required|unique:settings'
        ]);


        //upload image (cara kedua)
        if ($request->has('logo')) {
            # upload with image
            $image = $request->file('logo');
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
            $logo_data = $fileName;
        }

        if ($request->has('favicon')) {
            # upload with image
            $image = $request->file('favicon');
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
            $favicon_data = $fileName;
        }

        $setting = Setting::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'url' => $request->input('url'),
            'logo' => $logo_data,
            'favicon' => $favicon_data
            // 'slug' => Str::random(6) 
        ]);

        if($setting){
            //redirect dengan pesan sukses
            return redirect()->route('admin.setting.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.setting.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findorfail($id);
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'url' => 'required'
        ]);

        $setting = Setting::findorFail($id);
        
        //cek gambar lama
        $oldImage = $setting->image;

        //upload image (cara kedua)
        if ($request->has('logo')) {
            # upload with image
            $image = $request->file('logo');
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
            $logo_data = $fileName;

            $setting_data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'url' => $request->input('url'),
                'email' => $request->input('email'),
                'no_hp' => $request->input('no_hp'),
                'no_wa' => $request->input('no_wa'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'twitter' => $request->input('twitter'),
                'youtube' => $request->input('youtube'),
                'seo' => $request->input('seo'),
                'keywords' => $request->input('keywords'),
                'googleanalytics' => $request->input('googleanalytics'),
                'street' => $request->input('street'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'country' => $request->input('country'),
                'postalcode' => $request->input('postalcode'),
                'logo' => $logo_data,
            ];
        }
        else {
            $setting_data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'url' => $request->input('url'),
                'email' => $request->input('email'),
                'no_hp' => $request->input('no_hp'),
                'no_wa' => $request->input('no_wa'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'twitter' => $request->input('twitter'),
                'youtube' => $request->input('youtube'),
                'seo' => $request->input('seo'),
                'keywords' => $request->input('keywords'),
                'googleanalytics' => $request->input('googleanalytics'),
                'street' => $request->input('street'),
                'city' => $request->input('city'),
                'province' => $request->input('province'),
                'country' => $request->input('country'),
                'postalcode' => $request->input('postalcode'),
            ];
        }

        $setting->update($setting_data);

        // Jika gambar lama ada maka lakukan hapus gambar
        if ($oldImage !== $setting->image) {
            $this->removeImage($oldImage);
            }

        if($setting){
            //redirect dengan pesan sukses
            return redirect()->route('admin.setting.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.setting.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $setting = Setting::findOrFail($id);
        $setting->delete();

        if($setting){
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
