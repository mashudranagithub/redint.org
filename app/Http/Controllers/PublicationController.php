<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use DB;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::orderBy('id', 'DESC')->paginate(5);
        return view('admin.publication.index', compact(
            'publications',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publication.create');
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
            'type'=>'required',
            'title'=>'required',
            'link'=>'required',
        ]);

        $publication = new Publication();

        $publication->type = $request->input('type');
        $publication->title = $request->input('title');
        $publication->link = $request->input('link');

        $publication->save();

        return redirect()->route('all-publications')->with('msg','Study added Successfully');
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
        $publication = Publication::find($id);
        return view('admin.publication.edit', compact(
            'publication'
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
            'type'=>'required',
            'title'=>'required',
            'link'=>'required',
        ]);

        $publication = Publication::find($id);

        $publication->type = $request->input('type');
        $publication->title = $request->input('title');
        $publication->link = $request->input('link');

        $publication->save();

        return redirect()->route('all-publications')->with('msg','Study Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("publications")->where('id', $id)->delete();
        return redirect()->route('all-publications')->with('msg','Study deleted successfully');
    }
}
