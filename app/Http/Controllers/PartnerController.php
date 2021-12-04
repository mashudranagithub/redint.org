<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\File;
use DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::orderBy('id', 'desc')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
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
            'link'=>'required',
            'image'=>'required',
        ]);
        $partner = new Partner();
        $img = $request->file('image');
        if($img){
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/partners/");
            $img->move($path, $name);
            $partner->image = $name;
        }
        $partner->link = $request->input('link');
        $partner->save();
        return redirect()->route('all-partners')->with('msg','Partner Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::find($id);
        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partners.edit', compact('partner'));
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
            'link'=>'required',
            'image'=>'required',
        ]);
        $partner = Partner::find($id);
        $img = $request->file('image');
        if($img){
            if($partner->image) {
                $file_photo = public_path("ui/assets/images/partners/".$partner->image);
                if(File::exists($file_photo)){
                    unlink($file_photo);
                }            
            }
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/partners/");
            $img->move($path, $name);
            $partner->image = $name;
        }
        $partner->link = $request->input('link');
        $partner->save();
        return redirect()->route('all-partners')->with('msg','Partner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        if($partner->image) {
            $file_photo = public_path("ui/assets/images/partners/".$partner->image);
            if(File::exists($file_photo)){
                unlink($file_photo);
            }            
        }
        $partner->delete();
        return redirect()->route('all-partners')->with('msg','partner deleted successfully');
    }
}
