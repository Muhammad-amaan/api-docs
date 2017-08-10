<?php

namespace App\Providers;


class PushEventProvider
{

    public static function send_message($channel, $event, $data)
    {
        $options = array(
            'cluster' => 'eu',
            'encrypted' => true
        );
        $pusher = new \Pusher(
            '5cb795a1a20ec864a711',
            '2391033580b110818cdf',
            '250357',
            $options
        );
        $pusher->trigger($channel, $event, $data);
        return true;
    }

}
