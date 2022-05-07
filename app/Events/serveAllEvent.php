<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Datetime;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class serveAllEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table)
    {
        $this->table=$table;
        $menuGroup = DB::select("select  tables.id as 'table',menu.name as 'menu',orders.id as 'order_id' from menu,ticket,orders,tables where orders.status_id =3 and ticket.ticket_status_id=2 and orders.Menu_id = menu.id and ticket.table_id =tables.id and tables.id=$table and orders.ticket_id=ticket.id;");
        for($a=0;$a<count($menuGroup);$a++){
            $orderid=$menuGroup[$a]->order_id;
            $updatedeliver=DB::select("update orders set status_id=4 where id=$orderid" );
            }

            

    }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('serveAllEvent');
    }

    public function broadcastAs(){
        return 'serveAllEvent';
    }
}
