<?php

return [

    'user_model' => App\User::class,

    'message_model' => App\Message::class,

    'participant_model' => App\Participant::class,

    'thread_model' => App\Thread::class,

    /**
     * Define custom database table names.
     */
    'messages_table' => null,

    'participants_table' => null,

    'threads_table' => null,
];
