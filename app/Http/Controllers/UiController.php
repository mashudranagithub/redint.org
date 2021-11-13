<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\StudyAreas;
use App\Models\Study;
use App\Models\Publication;
use App\Models\Presentation;
use App\Models\Research;
use DB;

class UiController extends Controller
{

    public function homepage()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $publications = Publication::orderBy('id', 'DESC')->take(10)->get();
        return view('ui.index', compact(
            'researches',
            'publications'
        ));
    }


    public function gallery()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
    	$photos = Gallery::orderBy('id', 'desc')->paginate(10);
        return view('ui.gallery', compact(
        	'photos',
            'researches'
        ));
    }


    public function background()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        return view('ui.background', compact(
            'researches'
        ));
    }


    public function visionMission()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        return view('ui.vision-mission', compact(
            'researches'
        ));
    }


    public function professionals()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        return view('ui.professionals', compact(
            'researches'
        ));
    }


    public function studies()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $study_areas = StudyAreas::orderBy('id', 'desc')->get();
        return view('ui.study.studies', compact(
            'study_areas',
            'researches'
        ));
    }



    public function studyArea($id)
    {
        $study_areas = StudyAreas::orderBy('id', 'desc')->get(['id', 'name']);
        $study = StudyAreas::find($id);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();

        $study_list = Study::orderBy('id', 'desc')
                    ->where('study_areas_id', '=', $id)
                    ->get(['id', 'title']);

        return view('ui.study.study-area', compact(
            'study_areas',
            'study',
            'study_list',
            'researches'
        ));
    }



    public function study($id)
    {
        $single_study = Study::find($id);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        return view('ui.study.single-study', compact(
            'single_study',
            'researches'
        ));
    }


    public function publications()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $journals = Publication::orderBy('id', 'DESC')->where('type', '=', 'journal')->paginate(5);
        $abstracts = Publication::orderBy('id', 'DESC')->where('type', '=', 'abstract')->paginate(5);
        $newspapers = Publication::orderBy('id', 'DESC')->where('type', '=', 'newspaper')->paginate(5);
        return view('ui.publications', compact(
            'journals',
            'abstracts',
            'newspapers',
            'researches'
        ));
    }


    public function presentations()
    {
        $presentations = Presentation::orderBy('id', 'DESC')->paginate(1);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        return view('ui.presentations', compact(
            'presentations',
            'researches'
        ));
    }


    public function researches()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $research_list = Research::orderBy('id', 'DESC')->paginate(6);
        return view('ui.researches', compact(
            'researches',
            'research_list',
        ));
    }



    public function single_research($id)
    {
        $research = Research::find($id);
        $researches = Research::orderBy('id', 'DESC')->paginate(6);
        return view('ui.single-research', compact(
            'researches',
            'research'
        ));
    }


}
