<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;
use DB;
use Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Gallery::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.photo.index', compact(
            'photos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
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
            'photo'=>'required',
        ]);

        $photo = new Gallery();

        $img = $request->file('photo');

        if($img){
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/gallery/photos/");
            $img->move($path, $name);
            $photo->photo = $name;
        }


        $photo->photo_caption = $request->input('photo_caption');

        $photo->save();

        return redirect()->route('allPhotos')->with('msg','Photo added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Gallery::find($id);
        return view('admin.photo.edit', compact(
            'photo',
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
            'photo'=>'required',
        ]);

        $photo = Gallery::find($id);

        $img = $request->file('photo');

        if($img){
            $file = public_path("ui/assets/gallery/photos/{$photo->photo}");
            if(File::exists($file)){
                unlink($file);
            }
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/gallery/photos/");
            $img->move($path, $name);
            $photo->photo = $name;
        }


        $photo->photo_caption = $request->input('photo_caption');

        $photo->save();

        return redirect()->route('allPhotos')->with('msg','Photo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Gallery::findOrFail($id);
        $file = public_path("ui/assets/gallery/photos/{$photo->photo}");
        if(File::exists($file)){
            unlink($file);
        }
        $photo->delete();

        return redirect()->route('allPhotos')->with('msg','Photo deleted successfully');
    }
}
