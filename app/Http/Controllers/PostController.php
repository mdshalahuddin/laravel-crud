<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }
   public function ourFileStore( Request $request){
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'nullable|mimes:jpeg,png',
    ]);
    // Image Uplad

    $imageName =  time().'.'.$request->image->extension();
    $request->image->move(public_path('images'),$imageName);
    // Add new post
        $post = new Post();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();
        return redirect()->route('home')->with('success','successfully');
}

    public function editData($id){
    $post = Post::find($id);
        return view('edit',['ourPost'=>$post]);

    }
    public function updateData(Request $request,$id){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png',
        ]);
        // Image Uplad



        // Update post
            $post = Post::find($id);
            $post->name = $request->name;
            $post->description = $request->description;
            if(isset($request->image)){
                $imageName =  time().'.'.$request->image->extension();
                $request->image->move(public_path('images'),$imageName);
                $post->image = $imageName;

            }
            $post->save();
            return redirect()->route('home')->with('success','Your Post has been Update');
    }
    public function deleteData($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home')->with('success','Your Post has been Update');


    }
}