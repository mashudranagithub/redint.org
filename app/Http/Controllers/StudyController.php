<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyAreas;
use App\Models\Study;
use Illuminate\Support\Facades\File;
use DB;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = Study::orderBy('id', 'DESC')->paginate(5);
        return view('admin.study.index', compact(
            'studies',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $study_areas = StudyAreas::orderBy('id', 'DESC')->get(['id', 'name']);
        return view('admin.study.create', compact(
            'study_areas',
        ));
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
            'desc_one'=>'required',
            'study_areas_id'=>'required',
        ]);

        $study = new Study();

        $study->title = $request->input('title');
        $study->external_link = $request->input('external_link');

        $pdf = $request->file('pdf_file');
        if($pdf){
            $name = $pdf->getClientOriginalName();
            $path = public_path("ui/assets/files/study/");
            $pdf->move($path, $name);
            $study->pdf_file = $name;
        }

        $study->desc_one = $request->input('desc_one');
        $study->desc_two = $request->input('desc_two');
        $study->study_areas_id = $request->input('study_areas_id');

        $study->save();

        return redirect()->route('all-study')->with('msg','Study added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study = Study::find($id);
        $study_areas = StudyAreas::orderBy('id', 'DESC')->get(['id', 'name']);
        return view('admin.study.show', compact(
            'study',
            'study_areas',
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
        $study = Study::find($id);
        $study_areas = StudyAreas::orderBy('id', 'DESC')->get(['id', 'name']);
        return view('admin.study.edit', compact(
            'study',
            'study_areas',
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
            'desc_one'=>'required',
            'study_areas_id'=>'required',
        ]);

        $study = Study::find($id);

        $study->title = $request->input('title');
        $study->external_link = $request->input('external_link');

        $pdf = $request->file('pdf_file');
        if($pdf){
            if($study->pdf_file) {
                $pdf_f = public_path("ui/assets/files/study/{$study->pdf_file}");
                if(File::exists($pdf_f)){
                    unlink($pdf_f);
                }            
            }
            $name = $pdf->getClientOriginalName();
            $path = public_path("ui/assets/files/study/");
            $pdf->move($path, $name);
            $study->pdf_file = $name;
        }

        $study->desc_one = $request->input('desc_one');
        $study->desc_two = $request->input('desc_two');
        $study->study_areas_id = $request->input('study_areas_id');

        $study->save();

        return redirect()->route('all-study')->with('msg','Study Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = Study::findOrFail($id);
        if($study->pdf_file) {
            $pdf = public_path("ui/assets/files/study/{$study->pdf_file}");
            if(File::exists($pdf)){
                unlink($pdf);
            }            
        }
        $study->delete();
        return redirect()->route('all-study')->with('msg','Study deleted successfully');
    }
}
