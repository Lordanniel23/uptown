<?php

namespace App\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Datetime;
use Carbon\Carbon;
class deliveryEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $ticket;
    public $menu_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($menu_id,$ticket)
    {
        $menuGroup = DB::select("select menu.name,menu.id as 'MenuId',orders.id as 'order_id',ticket.id as 'TicketId',orders.status_id as 'status' from menu,orders,ticket where orders.status_id = 2 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and menu.id=$menu_id and ticket.id=$ticket");
        for($a=0;$a<count($menuGroup);$a++){
        $orderid=$menuGroup[$a]->order_id;
        $updatedeliver=DB::select("update orders set status_id=3 where id=$orderid and orders.status_id!=5" );
        }


        $this->menu_id = $menu_id;
        $this->ticket = $ticket;
        $this->menuGroup = $menuGroup;



    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('deliveryEvent');
    }
    public function broadcastAS()
    {
        return 'deliveryEvent';
    }
}
