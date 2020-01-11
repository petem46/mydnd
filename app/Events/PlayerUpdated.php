<?php

namespace App\Events;

use App\PC;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlayerUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pc;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PC $pc)
    {
        $this->pc = $pc;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('player-tracker.' . $this->pc->id);
        // return ['private-player-channel.'.$this->pc->id, 'player-tracker'];
    }

    public function broadcastWith()
    {
        $extra = [
            'player name' => $this->pc->name,
        ];

        return array_merge($this->pc->toArray(), $extra);
    }
}
