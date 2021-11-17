<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\StudyAreas;
use App\Models\Study;
use App\Models\Publication;
use App\Models\Presentation;
use App\Models\Research;
use App\Models\Event;

use Illuminate\Support\Facades\File;
use DB;

class UiController extends Controller
{

    public function homepage()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $publications = Publication::orderBy('id', 'DESC')->take(10)->get();
        $events = Event::orderBy('id', 'DESC')->take(6)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.index', compact(
            'researches',
            'publications',
            'events',
            'footer_s_areas'
        ));
    }


    public function gallery()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
    	$photos = Gallery::orderBy('id', 'desc')->paginate(10);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.gallery', compact(
        	'photos',
            'researches',
            'footer_s_areas'
        ));
    }


    public function background()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.background', compact(
            'researches',
            'footer_s_areas'
        ));
    }


    public function visionMission()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.vision-mission', compact(
            'researches',
            'footer_s_areas'
        ));
    }


    public function professionals()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.professionals', compact(
            'researches',
            'footer_s_areas'
        ));
    }


    public function studies()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $study_areas = StudyAreas::orderBy('id', 'desc')->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.study.studies', compact(
            'study_areas',
            'researches',
            'footer_s_areas'
        ));
    }



    public function studyArea($id)
    {
        $study_areas = StudyAreas::orderBy('id', 'desc')->get(['id', 'name']);
        $study = StudyAreas::find($id);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $study_list = Study::orderBy('id', 'desc')
                    ->where('study_areas_id', '=', $id)
                    ->get(['id', 'title']);

        return view('ui.study.study-area', compact(
            'study_areas',
            'study',
            'study_list',
            'researches',
            'footer_s_areas'
        ));
    }



    public function study($id)
    {
        $single_study = Study::find($id);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.study.single-study', compact(
            'single_study',
            'researches',
            'footer_s_areas'
        ));
    }


    public function publications()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();

        $journals = Publication::orderBy('id', 'DESC')->where('type', '=', 'journal')->paginate(5);
        $books = Publication::orderBy('id', 'DESC')->where('type', '=', 'book')->paginate(5);
        $reports = Publication::orderBy('id', 'DESC')->where('type', '=', 'report')->paginate(5);
        $monographs = Publication::orderBy('id', 'DESC')->where('type', '=', 'monograph')->paginate(5);
        $workings = Publication::orderBy('id', 'DESC')->where('type', '=', 'working')->paginate(5);
        $abstracts = Publication::orderBy('id', 'DESC')->where('type', '=', 'abstract')->paginate(5);
        $newspapers = Publication::orderBy('id', 'DESC')->where('type', '=', 'newspaper')->paginate(5);

        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.publications', compact(
            'journals',
            'abstracts',
            'newspapers',
            'researches',
            'footer_s_areas'
        ));
    }


    public function presentations()
    {
        $presentations = Presentation::orderBy('id', 'DESC')->paginate(1);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.presentations', compact(
            'presentations',
            'researches',
            'footer_s_areas'
        ));
    }


    public function researches()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $research_list = Research::orderBy('id', 'DESC')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.researches', compact(
            'researches',
            'research_list',
            'footer_s_areas'
        ));
    }


    public function single_research($id)
    {
        $research = Research::find($id);
        $researches = Research::orderBy('id', 'DESC')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.single-research', compact(
            'researches',
            'research',
            'footer_s_areas'
        ));
    }


    public function events()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $events = Event::orderBy('id', 'DESC')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        return view('ui.events.events', compact(
            'researches',
            'events',
            'footer_s_areas'
        ));
    }


    public function single_event($id)
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $latest_events = Event::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $event = Event::find($id);
        return view('ui.events.single-event', compact(
            'researches',
            'event',
            'latest_events',
            'footer_s_areas'
        ));
    }


    public function contact()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();

        return view('ui.contact', compact(
            'researches',
            'footer_s_areas'
        ));
    }


}
