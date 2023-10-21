<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use Illuminate\Support\Str;
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
        $aa = ['name' => 'huy thai', 'age' => 21];
        return view('story.index', ['list' => $aa]);
    }

    public function createStoryPage()
    {
        $category = Category::all();
        // dd($category);
        return view('story.create', ['category' => $category]);
    }

    public function storeStory(Request $request)
    {
        // dd($request->all());

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
            'slug' => Str::slug($request->name, '_') . time(),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id')
        ]);

        if ($story) {
            $request->image->move(storage_path('app/public/images'), $generatedImageName);
        }

        return $story;
    }
}
