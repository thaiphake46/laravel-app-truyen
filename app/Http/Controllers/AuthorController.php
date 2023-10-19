<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('author');
    }

    public function listStoryPage()
    {
        return view('story.index');
    }

    public function createStoryPage()
    {
        return view('story.create');
    }
}
