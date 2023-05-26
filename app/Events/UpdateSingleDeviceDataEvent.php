<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateSingleDeviceDataEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $userId;
    protected $deviceAttribute;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $userId, array $deviceAttribute)
    {
        $this->userId = $userId;
        $this->deviceAttribute = $deviceAttribute;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.' . $this->userId);
    }

    public function broadcastWith()
    {
        return [
            "field" => [
                "created"  => $this->deviceAttribute[0],
                "filled"   => $this->deviceAttribute[1],
                "unfilled" => $this->deviceAttribute[2],
            ]
        ];
    }
}
