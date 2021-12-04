<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->orderBy('id', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'detail'=>'required',
            'type'=>'required',
        ]);
        $post = new Post();
        $img = $request->file('image');
        if($img){
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/post/".$request->input('type'));
            $img->move($path, $name);
            $post->image = $name;
        }
        $post->title = $request->input('title');
        $post->detail = $request->input('detail');
        $post->type = $request->input('type');
        $post->save();
        return redirect()->route('all-posts')->with('msg','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact(
            'post',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact(
            'post',
        ));
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
        $this->validate($request,[
            'title'=>'required',
            'detail'=>'required',
            'type'=>'required',
        ]);

        $post = Post::find($id);

        $img = $request->file('image');

        if($img){
            if($post->image) {
                $file_photo = public_path("ui/assets/images/post/".$request->input('type').'/{$post->image}');
                if(File::exists($file_photo)){
                    unlink($file_photo);
                }            
            }
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/post/".$request->input('type'));
            $img->move($path, $name);
            $post->image = $name;
        }
        $post->title = $request->input('title');
        $post->detail = $request->input('detail');
        $post->type = $request->input('type');
        $post->save();
        return redirect()->route('all-posts')->with('msg','Post Updated Successfully');
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
        if($post->image) {
            $file_photo = public_path("ui/assets/images/post/".$post->type.'/'.$post->image);
            if(File::exists($file_photo)){
                unlink($file_photo);
            }            
        }
        $post->delete();
        return redirect()->route('all-posts')->with('msg','Post deleted successfully');
    }
}
