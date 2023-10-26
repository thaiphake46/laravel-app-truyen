<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', []);
    }

    public function storyViewPage()
    {
        return view('reading.story');
    }

    public function chapterViewPage()
    {
        return view('reading.chapter');
    }
}