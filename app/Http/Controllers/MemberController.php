<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\File;
use DB;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::table('members')->orderBy('id')->get();

        return view('admin.members.index', compact(
            'members',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
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
            'name'=>'required',
            'designation'=>'required',
            'email'=>'required',
            'type'=>'required',
            'bio'=>'required',
            'interests'=>'required',
            'position'=>'required'
        ]);

        $member = new Member();

        $img = $request->file('photo');

        if($img){
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/members/".$request->input('type'));
            $img->move($path, $name);
            $member->photo = $name;
        }

        $member->name = $request->input('name');
        $member->designation = $request->input('designation');
        $member->email = $request->input('email');
        $member->type = $request->input('type');
        $member->bio = $request->input('bio');
        $member->interests = $request->input('interests');
        $member->position = $request->input('position');

        $member->save();

        return redirect()->route('all-members')->with('msg','Group Member Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $single_member = Member::find($id);

        return view('admin.members.show', compact(
            'single_member',
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
        $single_member = Member::find($id);
        
        return view('admin.members.edit', compact(
            'single_member',
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
            'designation'=>'required',
            'email'=>'required',
            'type'=>'required',
            'bio'=>'required',
            'interests'=>'required',
            'position'=>'required'
        ]);

        $member = Member::find($id);

        $img = $request->file('photo');

        if($img){
            if($member->photo) {
                $file_photo = public_path("ui/assets/images/members/".$request->input('type').'/{$member->photo}');
                if(File::exists($file_photo)){
                    unlink($file_photo);
                }            
            }

            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/members/".$request->input('type'));
            $img->move($path, $name);
            $member->photo = $name;
        }

        $member->name = $request->input('name');
        $member->designation = $request->input('designation');
        $member->email = $request->input('email');
        $member->type = $request->input('type');
        $member->bio = $request->input('bio');
        $member->interests = $request->input('interests');
        $member->position = $request->input('position');

        $member->save();

        return redirect()->route('all-members')->with('msg','Member Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        if($member->photo) {
                $file_photo = public_path("ui/assets/images/members/".$request->input('type').'/{$member->photo}');
                if(File::exists($file_photo)){
                    unlink($file_photo);
                }            
        }
        $member->delete();
        return redirect()->route('all-members')->with('msg','Study deleted successfully');
    }
}
