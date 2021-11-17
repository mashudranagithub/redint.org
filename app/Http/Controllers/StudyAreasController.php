<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\StudyAreas;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class StudyAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study_areas = StudyAreas::orderBy('id', 'desc')->get();
        return view('admin.study-area.index', compact(
            'study_areas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.study-area.create');
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
            'name'=>'required',
            'banner'=>'required',
            'square_image'=>'required',
            'description'=>'required',
        ]);

        $study_area = new StudyAreas();

        $img = $request->file('banner');

        if($img){
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/study/banners/");
            $img->move($path, $name);
            $study_area->banner = $name;
        }

        $s_img = $request->file('square_image');

        if($s_img){
            $name = $s_img->getClientOriginalName();
            $path = public_path("ui/assets/images/study/square-images/");
            $s_img->move($path, $name);
            $study_area->square_image = $name;
        }


        $study_area->name = $request->input('name');
        $study_area->description = $request->input('description');

        $study_area->save();

        return redirect()->route('all-study-area')->with('msg','Study Area added Successfully');
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
        $study_area = StudyAreas::find($id);
        return view('admin.study-area.edit', compact(
            'study_area'
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
            'name'=>'required',
            'description'=>'required',
        ]);

        $study_area = StudyAreas::find($id);

        $img = $request->file('banner');

        if($img){
            $banner = public_path("ui/assets/images/study/banners/{$study_area->banner}");
            if(File::exists($banner)){
                unlink($banner);
            }
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/study/banners/");
            $img->move($path, $name);
            $study_area->banner = $name;
        }

        $s_img = $request->file('square_image');

        if($s_img){
            $square_image = public_path("ui/assets/images/study/square-images/{$study_area->square_image}");
            if(File::exists($square_image)){
                unlink($square_image);
            }
            $name = $s_img->getClientOriginalName();
            $path = public_path("ui/assets/images/study/square-images/");
            $s_img->move($path, $name);
            $study_area->square_image = $name;
        }

        $study_area->name = $request->input('name');
        $study_area->description = $request->input('description');

        $study_area->save();

        return redirect()->route('all-study-area')->with('msg','Study Area Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study_area = StudyAreas::findOrFail($id);
        $banner = public_path("ui/assets/images/study/banners/{$study_area->banner}");
        if(File::exists($banner)){
            unlink($banner);
        }
        $square_image = public_path("ui/assets/images/study/square-images/{$study_area->square_image}");
        if(File::exists($square_image)){
            unlink($square_image);
        }
        $study_area->delete();
        return redirect()->route('all-study-area')->with('msg','Study Area deleted successfully');
    }
}
