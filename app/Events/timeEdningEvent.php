<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\DB;

class timeEdningEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public  $tableitems;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
      $tableitems = DB::select('select ticket.id as ticket_id,tables.id as table_id , sum(orders.status_id = 2) as confirmed, sum(orders.status_id = 3) as to_serve,sum(orders.status_id = 4) as delivered from  ticket,orders,tables where orders.ticket_id = ticket.id and tables.id = ticket.table_id and ticket.ticket_status_id =2 group by ticket.id ; ');
      $this->tables = $tableitems;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('timeEdningEvent');
    }
    public function broadcastAs(){
        return 'timeEdningEvent';
    }
}
