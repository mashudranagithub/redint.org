<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\File;
use DB;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = Settings::first();
        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'address'=>'required',
            'email'=>'required',
            'mobile'=>'required'
        ]);
        $settings = Settings::first();
        $img = $request->file('logo');
        if($img){
            if($settings->logo) {
                $file_photo = public_path("ui/assets/images/settings/".$settings->logo);
                if(File::exists($file_photo)){
                    unlink($file_photo);
                }            
            }
            $name = $img->getClientOriginalName();
            $path = public_path("ui/assets/images/settings/");
            $img->move($path, $name);
            $settings->logo = $name;
        }
        $settings->facebook = $request->input('facebook');
        $settings->twitter = $request->input('twitter');
        $settings->linkedin = $request->input('linkedin');
        $settings->instagram = $request->input('instagram');
        $settings->youtube = $request->input('youtube');
        $settings->office_time = $request->input('office_time');
        $settings->address = $request->input('address');
        $settings->email = $request->input('email');
        $settings->mobile = $request->input('mobile');
        $settings->save();
        return redirect()->route('settings')->with('msg','Settings Updated Successfully');
    }

}
