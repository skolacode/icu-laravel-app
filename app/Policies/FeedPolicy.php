<?php

namespace App\Policies;

use App\Models\Feed;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class FeedPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(?User $user, Feed $feed)
    {
        // Log::debug("message", [ 'id' => $feed->user_id]);

        return $feed->user_id == 1;
    }
}
