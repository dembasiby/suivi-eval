<?php

namespace App\Observers;

use App\Models\Reponse;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ReponseActionObserver
{
    public function updated(Reponse $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Reponse'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
