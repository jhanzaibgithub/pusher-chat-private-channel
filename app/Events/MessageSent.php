<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $userId;

    public function __construct($message, $userId)
    {
     
                $this->message = $message;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new Channel('user.' . $this->userId);
    }

    public function broadcastWith()
    {
        return ['message' => $this->message ,'userId' => $this->userId ];
    }
    public function broadcastAs()
    {
        return 'new-message';
    }
}
