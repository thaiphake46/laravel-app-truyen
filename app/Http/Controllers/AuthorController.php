<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // dd(Auth::user()->email);
        $listStory = Story::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($listStory);
        // return $listStory;
        return view('story.index', [
            'listStory' => $listStory
        ]);
    }

    public function createStoryPage()
    {
        $category = Category::all();
        // dd($category);
        return view('story.create', ['category' => $category]);
    }

    public function storeStory(Request $request)
    {
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
        // dd('id: ' . $id);
        $category = Category::all();
        $story = Story::find($id);

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
        // dd(Storage::disk('public/images')->exists($story->image));
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
            // $request->image->move(storage_path('app/public/images'), $generatedImageName);
            $request->file('image')->storeAs('public/images', $generatedImageName);
        }

        return redirect()->route('listStoryPage');
    }
}