<?php

namespace App\Policies;

use App\Models\Story;
use App\Models\User;

class ChapterPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function checkAuthor(User $user, Story $story)
    {
        return !!$user->is_author && $user->id == $story->user_id;
    }
}
