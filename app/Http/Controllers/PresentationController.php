<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentation;

use Illuminate\Support\Facades\File;
use DB;

class PresentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presentations = Presentation::orderBy('id', 'DESC')->paginate(6);
        return view('admin.presentation.index', compact(
            'presentations',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.presentation.create');
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
            'presentation_file'=>'required',
        ]);

        $presentation = new Presentation();

        $pdf = $request->file('presentation_file');
        if($pdf){
            $name = $pdf->getClientOriginalName();
            $path = public_path("ui/assets/files/presentations/");
            $pdf->move($path, $name);
            $presentation->presentation_file = $name;
        }

        $presentation->save();

        return redirect()->route('all-presentations')->with('msg','Presentation added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presentation = Presentation::find($id);
        return view('admin.presentation.show', compact(
            'presentation',
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
        $presentation = Presentation::find($id);
        return view('admin.presentation.edit', compact(
            'presentation',
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
            'presentation_file'=>'required',
        ]);

        $presentation = Presentation::find($id);

        $file = public_path("ui/assets/files/presentations/{$presentation->presentation_file}");
        if(File::exists($file)){
            unlink($file);
        }

        $pdf = $request->file('presentation_file');
        if($pdf){
            $name = $pdf->getClientOriginalName();
            $path = public_path("ui/assets/files/presentations/");
            $pdf->move($path, $name);
            $presentation->presentation_file = $name;
        }

        $presentation->save();

        return redirect()->route('all-presentations')->with('msg','Presentation updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presentation = Presentation::findOrFail($id);
        $file = public_path("ui/assets/files/presentations/{$presentation->presentation_file}");
        if(File::exists($file)){
            unlink($file);
        }
        $presentation->delete();
        return redirect()->route('all-presentations')->with('msg','Presentation deleted successfully');

    }
}
