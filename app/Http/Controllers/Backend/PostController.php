<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostUpdateRequest;
// upload image thumnail
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    protected $uploadPath;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:posts.index|posts.create|posts.edit|posts.delete']);
        $this->uploadPath = public_path(config('cms.image.directoryPosts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->when(request()->q, function($posts) {
            $posts = $posts->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.posts.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //upload image (cara kedua)
        if ($request->has('image')) {
            # upload with image
            $image = $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailpost.width');
                $height = config('cms.image.thumbnailpost.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }

            // Tampung isi image ke variable data
            $image_data = $fileName;
        }

        $post = Post::create([
            'image'       => $image_data,
            'title'       => $request->input('title'),
            'slug'        => Str::slug($request->input('title'), '-'),
            'category_id' => $request->input('category_id'),
            'content'     => $request->input('content'),  
            'status'     => $request->input('status'),  
            'excerpt'     => Str::limit($request->input('content'), 50),
            'author_id'   => Auth::id()  
        ]);

        $post->save();
        
        //assign tags
        $post->tags()->attach($request->input('tags'));

        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('admin.post.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.post.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.posts.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {

        // Cara Kedua
        $post = Post::findorfail($post->id);
        //cek gambar lama
        $oldImage = $post->image;

         if ($request->has('image')) {
            # upload with image
            $image = $request->file('image');
            //$fileName = $image->getClientOriginalName();
            $fileName = time().$image->getClientOriginalName();
            $destination = $this->uploadPath;
            
            $successUploaded = $image->move($destination, $fileName);
            
            if ($successUploaded) {
                # script dibawah koneksi ke file App\confog\cms.php
                $width = config('cms.image.thumbnailpost.width');
                $height = config('cms.image.thumbnailpost.height');
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                
                image::make($destination . '/' . $fileName)
                ->resize($width, $height)
                ->save($destination . '/' . $thumbnail);
            }
            // Tampung isi image ke variable data
            $image_data = $fileName;

            $post_data = [
                'image'       => $image_data,
                'title'       => $request->input('title'),
                'slug'        => Str::slug($request->input('title'), '-'),
                'category_id' => $request->input('category_id'),
                'content'     => $request->input('content'),
                'status'     => $request->input('status'),  
                'excerpt'     => Str::limit($request->input('content'), 50),
                'author_id'   => Auth::id()  
            ];
         
        }
        else {
            $post_data = [
                'title'       => $request->input('title'),
                'slug'        => Str::slug($request->input('title'), '-'),
                'category_id' => $request->input('category_id'),
                'content'     => $request->input('content'),
                'status'     => $request->input('status'),  
                'excerpt'     => Str::limit($request->input('content'), 50),
                'author_id'   => Auth::id()  
            ];
        }
        
        // update post
        $post->update($post_data);

        //assign tags
        $post->tags()->sync($request->input('tags'));

        // Jika gambar lama ada maka lakukan hapus gambar
        if ($oldImage !== $post->image) {
            $this->removeImage($oldImage);
            }
            
        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('admin.post.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.post.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $post = Post::findOrFail($id);
        $image = Storage::disk('local')->delete('public/posts/'.$post->image);
        $post->delete();

        if($post){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    // function remove image
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
