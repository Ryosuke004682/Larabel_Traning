<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    
    public function update(User $user, Message $message)
    {
        //編集は投稿者本人のみ許可
        return $user->id == $message->user_id;
    }
    
    public function delete(User $user, Message $message)
    {
        //削除は投稿者本人のみ許可
        return $user->id == $message->user_id;
    }
}
