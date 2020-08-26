<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// upload image thumnail
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    protected $uploadPath;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:participants.index|participants.create|participants.edit|participants.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryPhotos'));
    }

    public function event()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.participant.event', compact('events'));
    }

    public function index()
    {
        $events = Event::latest()->get();

        $participants = Participant::latest()->when(request()->q, function($participants) {
            $participants = $participants->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);
        return view('admin.participant.index', compact('participants', 'events'));
    }

    public function create()
    {
        $events = Event::latest()->get();

        return view('admin.participant.create', compact('events'));
    }


   public function store(Request $request)
   {
        
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

        $participant_data = [
            'image'     => $image_data,
            'name'   => $request->input('name'),
             'nik'   => $request->input('nik'),
             'event_id'   => $request->input('event_id'),
             'birthplace'   => $request->input('birthplace'),
             'dateofbirth'   => $request->input('dateofbirth'),
             'gender'   => $request->input('gender'),
             'religion'   => $request->input('religion'),
             'no_hp'   => $request->input('no_hp'),
             'no_wa'   => $request->input('no_wa'),
             'email'   => $request->input('email'),
             'jabatan_dpc'   => $request->input('jabatan_dpc'),
             'status_dprd'   => $request->input('status_dprd'),
             'jabatan_dprd'   => $request->input('jabatan_dprd'),
             'address'   => $request->input('address'),
             'rt'   => $request->input('rt'),
             'district'   => $request->input('district'),
             'vilage'   => $request->input('vilage'),
             'city'   => $request->input('city'),
             'postalcode'   => $request->input('postalcode')
         ];
       
    }
    else {
        $participant_data = [
         'name'   => $request->input('name'),
         'nik'   => $request->input('nik'),
         'event_id'   => $request->input('event_id'),
         'birthplace'   => $request->input('birthplace'),
         'dateofbirth'   => $request->input('dateofbirth'),
         'gender'   => $request->input('gender'),
         'religion'   => $request->input('religion'),
         'no_hp'   => $request->input('no_hp'),
         'no_wa'   => $request->input('no_wa'),
         'email'   => $request->input('email'),
         'jabatan_dpc'   => $request->input('jabatan_dpc'),
         'status_dprd'   => $request->input('status_dprd'),
         'jabatan_dprd'   => $request->input('jabatan_dprd'),
         'address'   => $request->input('address'),
         'rt'   => $request->input('rt'),
         'district'   => $request->input('district'),
         'vilage'   => $request->input('vilage'),
         'city'   => $request->input('city'),
         'postalcode'   => $request->input('postalcode')
        ];
    }
       
       
        $participant_data['slug'] = Str::random(8);

        $participant = Participant::create($participant_data); 


        if($participant){
            //redirect dengan pesan sukses
            return redirect()->route('admin.participant.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.participant.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

   }


   public function edit(Participant $participant)
   {
        $events = Event::latest()->get();
        return view('admin.participant.edit', compact('participant', 'events'));
   }

   public function update(Request $request, Participant $participant)
   {
        $participant = Participant::findOrFail($participant->id);

        //cek gambar lama
        $oldImage = $participant->image;

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

           $participant_data = [
               'image'     => $image_data,
               'name'   => $request->input('name'),
                'nik'   => $request->input('nik'),
                'event_id'   => $request->input('event_id'),
                'birthplace'   => $request->input('birthplace'),
                'dateofbirth'   => $request->input('dateofbirth'),
                'gender'   => $request->input('gender'),
                'religion'   => $request->input('religion'),
                'no_hp'   => $request->input('no_hp'),
                'no_wa'   => $request->input('no_wa'),
                'email'   => $request->input('email'),
                'jabatan_dpc'   => $request->input('jabatan_dpc'),
                'status_dprd'   => $request->input('status_dprd'),
                'jabatan_dprd'   => $request->input('jabatan_dprd'),
                'address'   => $request->input('address'),
                'rt'   => $request->input('rt'),
                'district'   => $request->input('district'),
                'vilage'   => $request->input('vilage'),
                'city'   => $request->input('city'),
                'postalcode'   => $request->input('postalcode')
            ];
          
       }
       else {
           $participant_data = [
            'name'   => $request->input('name'),
            'nik'   => $request->input('nik'),
            'event_id'   => $request->input('event_id'),
            'birthplace'   => $request->input('birthplace'),
            'dateofbirth'   => $request->input('dateofbirth'),
            'gender'   => $request->input('gender'),
            'religion'   => $request->input('religion'),
            'no_hp'   => $request->input('no_hp'),
            'no_wa'   => $request->input('no_wa'),
            'email'   => $request->input('email'),
            'jabatan_dpc'   => $request->input('jabatan_dpc'),
            'status_dprd'   => $request->input('status_dprd'),
            'jabatan_dprd'   => $request->input('jabatan_dprd'),
            'address'   => $request->input('address'),
            'rt'   => $request->input('rt'),
            'district'   => $request->input('district'),
            'vilage'   => $request->input('vilage'),
            'city'   => $request->input('city'),
            'postalcode'   => $request->input('postalcode')
           ];
       }
       
       // update photo
       $participant->update($participant_data);

        // Jika gambar lama ada maka lakukan hapus gambar
        if ($oldImage !== $participant->image) {
            $this->removeImage($oldImage);
        }

       if($participant){
        //redirect dengan pesan sukses
        return redirect()->route('admin.participant.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
        //redirect dengan pesan error
        return redirect()->route('admin.participant.index')->with(['error' => 'Data Gagal Diupdate!']);
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
