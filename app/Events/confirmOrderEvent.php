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

class confirmOrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order_id;
    public $count;
    public $totalOrder;
    public $table_id;
    public $menuOrder;
    public $all;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order_id,$table_id)
    {
        $this->order_id=$order_id;
        $this->table_id=$table_id;

        $count=count($order_id);
        for($a=0;$a<$count;$a++){

            $update = DB::select("UPDATE `uptown`.`orders` SET `status_id` = '2' WHERE (`id` = $order_id[$a] and status_id!=3 and status_id!=5);");
        }
        $totalOrder=DB::select("SELECT count(*) as 'count' FROM uptown.orders where status_id=2;");
        // $menuOrder=DB::select("select menu.name,menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
        $menuOrder=DB::select("select ticket.id as 'ticket_id', menu.id as 'menu_id', menu.name,menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
        $all=DB::select("select  menu.name,menu.price,menu.price as 'Total',orders.status_id as 'status',orders.id,menu.name as 'quantity' from menu,orders,ticket where orders.status_id = 1 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id ");
        $this->totalOrder=$totalOrder[0];
        $this->count=$count;
        $this->menuOrder=$menuOrder;
        $this->all=$all;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('confirmOrderEvent');
    }
    public function broadcastAs(){
        return 'confirmOrderEvent';
    }
}
