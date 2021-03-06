<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use Illuminate\Support\Facades\File;
use DB;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = Research::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.research.index', compact(
            'research'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.research.create');
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
            'research_image'=>'required',
            'research_title'=>'required',
            'research_detail'=>'required',
        ]);

        $research = new Research();

        $img = $request->file('research_image');

        if($img){
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/research/");
            $img->move($path, $name);
            $research->research_image = $name;
        }

        $research->research_title = $request->input('research_title');

        $research->research_detail = $request->input('research_detail');

        $research->save();

        return redirect()->route('all-research')->with('msg','Research Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $research = Research::find($id);
        return view('admin.research.show', compact(
            'research'
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
        $research = Research::find($id);
        return view('admin.research.edit', compact(
            'research'
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
            'research_title'=>'required',
            'research_detail'=>'required',
        ]);

        $research = Research::find($id);

        $img = $request->file('research_image');

        if($img){

            $file = public_path("ui/assets/images/research/{$research->research_image}");
            if(File::exists($file)){
                unlink($file);
            }
            
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/research/");
            $img->move($path, $name);
            $research->research_image = $name;
        }

        $research->research_title = $request->input('research_title');

        $research->research_detail = $request->input('research_detail');

        $research->save();

        return redirect()->route('all-research')->with('msg','Research Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $research = Research::findOrFail($id);
        $file = public_path("ui/assets/images/research/{$research->research_image}");
        if(File::exists($file)){
            unlink($file);
        }
        $research->delete();
        return redirect()->route('all-research')->with('msg','Research deleted successfully');
    }
}
