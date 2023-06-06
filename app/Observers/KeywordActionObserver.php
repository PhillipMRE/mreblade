<?php

namespace App\Observers;

use App\Models\Keyword;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class KeywordActionObserver
{
    public function created(Keyword $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Keyword'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Keyword $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Keyword'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Keyword $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Keyword'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
