<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;


class StoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function checkAuthor(User $user)
    {
        return !!$user->is_author;
    }

    public function editAndUpdateAndDel(User $user, Story $story)
    {
        return  !!$user->is_author && $user->id == $story->user_id;
    }
}
