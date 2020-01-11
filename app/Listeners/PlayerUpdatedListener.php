<?php

namespace App\Listeners;

use App\Events\PlayerUpdated;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;



class PlayerUpdatedListener implements ShouldBroadcast
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PlayerUpdated  $event
     * @return void
     */
    public function handle(PlayerUpdated $event)
    {
        //
        return new Channel('player-tracker');
    }

    public function broadcastOn()
    {
        return new Channel('player-tracker');
    }


}
