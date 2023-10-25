<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listChapterPage($slug)
    {
        $story  = Story::where('slug', $slug)->first();

        $this->authorize('checkAuthor', $story);

        $listChapter = Chapter::where('story_id', $story->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('chapter.index', [
            'slug' => $slug,
            'listChapter' => $listChapter
        ]);
    }

    public function createChapterPage($slug)
    {
        $story = Story::where('slug', $slug)->first();

        $this->authorize('checkAuthor', $story);

        return view('chapter.create', [
            'slug' => $slug,
            'story_id' => $story->id
        ]);
    }

    public function storeChapter(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $story = Story::where('slug', $slug)->first();

        $this->authorize('checkAuthor', $story);

        $chapterNumber = Chapter::where('story_id', $story->id)->get()->max('chapter_number');

        if ($chapterNumber) {
            $chapterNumber++;
        } else {
            $chapterNumber = 1;
        }

        $chapter = Chapter::create([
            'slug' => Str::slug($request->name, '_') . '_' . time(),
            'chapter_number' => $chapterNumber,
            'name' => $request->name,
            'content' => $request->content,
            'story_id' => $story->id,
        ]);

        return redirect()->route('listChapterPage', ['slug' => $slug]);
    }

    public function editChapterPage($slug_story, $slug_chapter)
    {
        $chapter = Chapter::where('slug', $slug_chapter)->first();
        $story = Story::find($chapter->story_id);

        $this->authorize('checkAuthor', $story);

        return view('chapter.edit', ['slug_story' => $slug_story, 'chapter' => $chapter]);
    }

    public function updateChapter(Request $request, $slug_story, $slug_chapter)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $chapter = Chapter::where('slug', $slug_chapter)->first();
        $story = Story::find($chapter->story_id);

        $this->authorize('checkAuthor', $story);

        $chapter->name = $request->input('name');
        $chapter->content  = $request->input('content');
        $chapter->save();
        return redirect()->route('listChapterPage', ['slug' => $slug_story]);
    }

    public function deleteChapter($slug_story, $slug_chapter)
    {
        $chapter = Chapter::where('slug', $slug_chapter)->first();
        $story = Story::find($chapter->story_id);

        $this->authorize('checkAuthor', $story);

        $chapter->delete();
        return redirect()->route('listChapterPage', ['slug' => $slug_story]);
    }
}
