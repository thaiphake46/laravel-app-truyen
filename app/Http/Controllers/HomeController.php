<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Story;

class HomeController extends Controller
{
    public function index()
    {
        $randomListStory = Story::where('is_hidden', true)->get();

        // dd($listStory->random());

        if (!$randomListStory->isEmpty() && $randomListStory->count() > 10) {
            $randomListStory = $randomListStory->random(10);
        }

        $dangDoc = Story::where('is_hidden', true)->get();

        if (!$dangDoc->isEmpty() && $dangDoc->count() > 5) {
            $dangDoc = $dangDoc->random(5);
        }

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
        $story = Story::where('slug', $slug_story)->first();
        $chapterNumberMax = Chapter::where('story_id', $story->id)->get()->max('chapter_number');

        if ($chapterNumberMax < $number) {
            return view('reading.endStory');
        } else if ($number <= 0) {
            abort(404);
        }

        $chapter = Chapter::where(['story_id' => $story->id, 'chapter_number' => $number])->first();
        return view('reading.chapter', ['chapter' => $chapter, 'story' => $story]);
    }
}
