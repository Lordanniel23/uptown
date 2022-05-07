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

class paymentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table_id;
    public $receive;
    public $price;
    public $change;
    public $ticket_id;
    public $menuList;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table_id,$price,$receive,$change)
    {
        $this->table_id=$table_id;
        $this->price=$price;
        $this->receive=$receive;
        $this->change=$change;
        $test=array();
        $ticket=DB::select("select id from ticket where table_id=$table_id and ticket_status_id=2");
        $ticket_id=$ticket[0]->id;
        $tableupdate=DB::select("   UPDATE `uptown`.`tables` SET `table_status_id` = '1' WHERE (`id` = $table_id);");
        $tableupdate1=DB::select("   UPDATE `uptown`.`tables` SET `end_time` = '' WHERE (`id` = $table_id);");

        $ticketupdate=DB::select("UPDATE `uptown`.`ticket` SET `ticket_status_id` = '1', `Total_Price` = $price, `Received_total` = $receive, `Change_total` = $change WHERE (`table_id` = $table_id);");
        $orderUpdate=DB::select("UPDATE `uptown`.`orders` SET `status_id` = '4' WHERE ticket_id=$ticket_id and orders.status_id!=5;");
        $menuid=DB::select("select menu.id,menu.name from orders,menu,tables,ticket where orders.Menu_id=menu.id 
        and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and orders.status_id!=5 and ticket_id=$ticket_id and ticket.table_id=tables.id group by menu_id");
        $count=count($menuid);

        for($a=0;$a<$count;$a++){
            $menid=$menuid[$a]->id;
            $menuList=DB::select("select menu.name, count(menu.name) as 'count', menu.price from orders,menu where orders.Menu_id=menu.id and ticket_id=$ticket_id and orders.Menu_id=$menid group by name asc");
            array_push($test,$menid);
        }

        $this->ticket_id=$ticket_id;
        $this->menulist=$test;

        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('paymentEvent');
    }
    public function broadcastAs()
    {
        return 'paymentEvent';
    }
}
