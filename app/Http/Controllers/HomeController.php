<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $randomListStory = Story::all()->random(10);
        $dangDoc = Story::all()->random(5);

        $latestChapter = Story::with('latestChapter')->get();

        return view('index', [
            'randomListStory' => $randomListStory,
            'dangDoc' => $dangDoc,
        ]);
    }

    public function storyViewPage($slug)
    {
        $story = Story::where('slug', $slug)->first();

        return view('reading.story', [
            'story' => $story,
            'listChapter' => $story->chapter
        ]);
    }

    public function chapterViewPage($slug_story, $number)
    {
        if ($number) {
            $story = Story::where('slug', $slug_story)->first();
            $chapter = Chapter::where(['story_id' => $story->id, 'chapter_number' => $number])->first();



            return view('reading.chapter', ['chapter' => $chapter, 'story' => $story]);
        }
        return 'Bạn đã đọc hết truyện';
    }
}
