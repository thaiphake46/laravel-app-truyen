<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listStoryPage()
    {
        $this->authorize('checkAuthor', Story::class);

        $listStory = Story::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('story.index', [
            'listStory' => $listStory
        ]);
    }

    public function createStoryPage()
    {
        $this->authorize('checkAuthor', Story::class);

        $category = Category::all();

        return view('story.create', ['category' => $category]);
    }

    public function storeStory(Request $request)
    {
        $this->authorize('checkAuthor', Story::class);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,webp',
        ]);

        $generatedImageName = 'image' . time() . '_' .  Str::slug($request->name, '_') . '.' . $request->image->extension();

        $story = Story::create([
            'name' => $request->input('name'),
            'image' => $generatedImageName,
            'description' => $request->input('description'),
            'slug' => Str::slug($request->name, '_') . '_' . time(),
            'user_id' => Auth::id(),
            'category_id' => $request->input('category_id')
        ]);

        if ($story) {
            // $request->image->move(storage_path('app/public/images'), $generatedImageName);
            $request->file('image')->storeAs('public/images', $generatedImageName);
        }

        return redirect()->route('listStoryPage');
    }

    public function editStoryPage($id)
    {
        $story = Story::find($id);

        $this->authorize('editAndUpdateAndDel', $story);

        $category = Category::all();

        return view('story.edit', [
            'category' => $category,
            'story' => $story
        ]);
    }

    public function updateStory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg,svg,webp',
        ]);

        $story = Story::find($id);

        $this->authorize('editAndUpdateAndDel', $story);

        $story->name = $request->input('name');
        $story->description = $request->input('description');

        if ($request->hasFile('image')) {
            $generatedImageName = 'image' . time() . '_' .  Str::slug($request->name, '_') . '.' . $request->image->extension();
            if (Storage::disk('public/images')->exists($story->image)) {
                Storage::delete('public/images/' . $story->image);
            }
            $story->image = $generatedImageName;
        }

        $story->save();

        if ($request->hasFile('image') && $story) {
            $request->file('image')->storeAs('public/images', $generatedImageName);
        }

        return redirect()->route('listStoryPage');
    }

    public function deleteStory($id)
    {
        $story = Story::find($id);

        $this->authorize('editAndUpdateAndDel', $story);

        Chapter::where('story_id', $story->id)->delete();

        if (Storage::disk('public/images')->exists($story->image)) {
            Storage::delete('public/images/' . $story->image);
        }

        $story->delete();

        return redirect()->route('listStoryPage');
    }
}
