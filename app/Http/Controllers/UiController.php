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
use App\Models\Member;
use App\Models\Post;
use App\Models\Partner;
use App\Models\Settings;

use Illuminate\Support\Facades\File;
use DB;

class UiController extends Controller
{

    public function homepage()
    {
        $about = Post::orderBy('id', 'desc')->where('type', 'about-organization')->get('detail');
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $publications = Publication::orderBy('id', 'DESC')->take(10)->get();
        $events = Event::orderBy('id', 'DESC')->where('event_status', 'upcoming')->take(6)->get();
        $partners = Partner::orderBy('id', 'desc')->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $study_post = Post::orderBy('id', 'desc')->where('type', 'studies')->get();
        $publication_post = Post::orderBy('id', 'desc')->where('type', 'publications')->get();
        $presentation_post = Post::orderBy('id', 'desc')->where('type', 'presentations')->get();
        $settings = Settings::first();
        return view('ui.index', compact(
            'researches',
            'publications',
            'events',
            'footer_s_areas',
            'about',
            'partners',
            'study_post',
            'publication_post',
            'presentation_post',
            'settings'
        ));
    }


    public function gallery()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
    	$photos = Gallery::orderBy('id', 'desc')->paginate(10);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.gallery', compact(
        	'photos',
            'researches',
            'footer_s_areas',
            'settings'
        ));
    }


    public function background()
    {
        $background = Post::orderBy('id', 'desc')->where('type', 'about-organization')->get();
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.background', compact(
            'researches',
            'footer_s_areas',
            'background',
            'settings'
        ));
    }


    public function visionMission()
    {
        $vision = Post::orderBy('id', 'desc')->where('type', 'vision')->get();
        $mission = Post::orderBy('id', 'desc')->where('type', 'mission')->get();
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.vision-mission', compact(
            'researches',
            'footer_s_areas',
            'vision',
            'mission',
            'settings'
        ));
    }


    public function professionals()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $members = Member::orderBy('position', 'asc')->where('type', 'professionals')->paginate(10);
        $settings = Settings::first();
        return view('ui.professionals', compact(
            'researches',
            'footer_s_areas',
            'members',
            'settings'
        ));
    }


    public function advisors()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $members = Member::orderBy('position', 'asc')->where('type', 'advisors')->paginate(10);
        $settings = Settings::first();
        return view('ui.advisors', compact(
            'researches',
            'footer_s_areas',
            'members',
            'settings'
        ));
    }


    public function management()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $members = Member::orderBy('position', 'asc')->where('type', 'management')->paginate(10);
        $settings = Settings::first();
        return view('ui.management', compact(
            'researches',
            'footer_s_areas',
            'members',
            'settings'
        ));
    }


    public function studies()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $study_areas = StudyAreas::orderBy('id', 'desc')->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $study_post = Post::orderBy('id', 'desc')->where('type', 'studies')->get();
        $settings = Settings::first();
        return view('ui.study.studies', compact(
            'study_areas',
            'researches',
            'footer_s_areas',
            'study_post',
            'settings'
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
        $settings = Settings::first();

        return view('ui.study.study-area', compact(
            'study_areas',
            'study',
            'study_list',
            'researches',
            'footer_s_areas',
            'settings'
        ));
    }



    public function study($id)
    {
        $single_study = Study::find($id);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.study.single-study', compact(
            'single_study',
            'researches',
            'footer_s_areas',
            'settings'
        ));
    }


    public function publications()
    {
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $publication_post = Post::orderBy('id', 'desc')->where('type', 'publications')->get();
        $journals = Publication::orderBy('id', 'DESC')->where('type', '=', 'journal')->paginate(5);
        $books = Publication::orderBy('id', 'DESC')->where('type', '=', 'book')->paginate(5);
        $reports = Publication::orderBy('id', 'DESC')->where('type', '=', 'report')->paginate(5);
        $monographs = Publication::orderBy('id', 'DESC')->where('type', '=', 'monograph')->paginate(5);
        $workings = Publication::orderBy('id', 'DESC')->where('type', '=', 'working')->paginate(5);
        $abstracts = Publication::orderBy('id', 'DESC')->where('type', '=', 'abstract')->paginate(5);
        $newspapers = Publication::orderBy('id', 'DESC')->where('type', '=', 'newspaper')->paginate(5);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.publications', compact(
            'journals',
            'abstracts',
            'newspapers',
            'researches',
            'footer_s_areas',
            'publication_post',
            'settings'
        ));
    }


    public function presentations()
    {
        $presentations = Presentation::orderBy('id', 'DESC')->paginate(1);
        $researches = Research::orderBy('id', 'desc')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $presentation_post = Post::orderBy('id', 'desc')->where('type', 'presentations')->get();
        $settings = Settings::first();
        return view('ui.presentations', compact(
            'presentations',
            'researches',
            'footer_s_areas',
            'presentation_post',
            'settings'
        ));
    }


    public function researches()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $research_list = Research::orderBy('id', 'DESC')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.researches', compact(
            'researches',
            'research_list',
            'footer_s_areas',
            'settings'
        ));
    }


    public function single_research($id)
    {
        $research = Research::find($id);
        $researches = Research::orderBy('id', 'DESC')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.single-research', compact(
            'researches',
            'research',
            'footer_s_areas',
            'settings'
        ));
    }


    public function events()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $events = Event::orderBy('id', 'DESC')->where('event_status', 'upcoming')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.events.events', compact(
            'researches',
            'events',
            'footer_s_areas',
            'settings'
        ));
    }


    public function workshops()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $events = Event::orderBy('id', 'DESC')->where('event_status', 'running')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.events.events', compact(
            'researches',
            'events',
            'footer_s_areas',
            'settings'
        ));
    }

    public function awards()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $events = Event::orderBy('id', 'DESC')->where('event_status', 'previous')->paginate(6);
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.events.events', compact(
            'researches',
            'events',
            'footer_s_areas',
            'settings'
        ));
    }


    public function single_event($id)
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $latest_events = Event::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $event = Event::find($id);
        $settings = Settings::first();
        return view('ui.events.single-event', compact(
            'researches',
            'event',
            'latest_events',
            'footer_s_areas',
            'settings'
        ));
    }


    public function contact()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $settings = Settings::first();
        return view('ui.contact', compact(
            'researches',
            'footer_s_areas',
            'settings'
        ));
    }


    public function consultancy()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $post = Post::orderBy('id', 'desc')->where('type', 'consultancy')->get();
        $settings = Settings::first();
        return view('ui.consultancy', compact(
            'researches',
            'footer_s_areas',
            'post',
            'settings'
        ));
    }


    public function social()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $post = Post::orderBy('id', 'desc')->where('type', 'social-services')->get();
        $settings = Settings::first();
        return view('ui.social', compact(
            'researches',
            'footer_s_areas',
            'post',
            'settings'
        ));
    }


    public function technical()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $post = Post::orderBy('id', 'desc')->where('type', 'technical-notes')->get();
        $settings = Settings::first();
        return view('ui.technical', compact(
            'researches',
            'footer_s_areas',
            'post',
            'settings'
        ));
    }


    public function networkPartners()
    {
        $researches = Research::orderBy('id', 'DESC')->take(10)->get();
        $footer_s_areas = StudyAreas::orderBy('id', 'desc')->take(5)->get();
        $partners = Partner::orderBy('id', 'desc')->get();
        $settings = Settings::first();
        return view('ui.network-partners', compact(
            'researches',
            'footer_s_areas',
            'partners',
            'settings'
        ));
    }






}
