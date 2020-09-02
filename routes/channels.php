<?php

    use Illuminate\Support\Facades\Broadcast;

    Broadcast::channel('App.User.{id}', function ($user, $id) {
        return (int) $user->id === (int) $id;
    });
