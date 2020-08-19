<?php

namespace App\Http\Controllers\Backend;


use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
// upload image thumnail
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    protected $uploadPath;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:events.index|events.create|events.edit|events.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryAgenda'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->when(request()->q, function($events) {
            $events = $events->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
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
                $width = config('cms.image.thumbnailagenda.width');
                $height = config('cms.image.thumbnailagenda.height');
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
        $event = Event::create([
            'image'     => $image_data,
            'title'     => $request->input('title'),
            'slug'      => Str::slug($request->input('title'), '-'),
            'content'   => $request->input('content'),
            'location'  => $request->input('location'),
            'date'      => $request->input('date')
        ]);
            
        $event->save();

        if($event){
            //redirect dengan pesan sukses
            return redirect()->route('admin.event.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.event.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {

        $event = Event::findOrFail($event->id);
       
         //cek gambar lama
         $oldImage = $event->image;

         if ($request->has('image')) {
           
            # upload with image
            $image = $request->file('image');
            //$fileName = $image->getClientOriginalName();
            $fileName = time().$image->getClientOriginalName();
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailagenda.width');
                $height = config('cms.image.thumbnailagenda.height');
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
                'slug'        => Str::slug($request->input('title'), '-'),
                'content'     => $request->input('content'),
                'status'     => $request->input('status'),  
                'location'  => $request->input('location'),
                'date'      => $request->input('date')
            ];
           
        }
        else {
            $event_data = [
                'title'       => $request->input('title'),
                'slug'        => Str::slug($request->input('title'), '-'),
                'content'     => $request->input('content'),
                'status'     => $request->input('status'),  
                'location'  => $request->input('location'),
                'date'      => $request->input('date')
            ];
        }
        
        // update event
        $event->update($event_data);
        
          // Jika gambar lama ada maka lakukan hapus gambar
          if ($oldImage !== $event->image) {
            $this->removeImage($oldImage);
        }

        if($event){
            //redirect dengan pesan sukses
            return redirect()->route('admin.event.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.event.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $event = Event::findOrFail($id);
        $event->delete();

        if($event){
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
