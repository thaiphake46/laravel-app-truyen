<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function verifyAuthorPage()
    {
        $user = User::find(Auth::id());

        if ($user->is_author) {
            return redirect()->route('listStoryPage');
        }
        return view('auth.authorVerify');
    }

    public function verifyAuthor()
    {
        $user = User::find(Auth::id());
        $user->is_author = true;
        $user->save();
        return redirect()->route('listStoryPage');
    }
}
