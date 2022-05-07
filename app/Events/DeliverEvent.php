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
class DeliverEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $ticket;
    public $menu_id;
    public $table;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($menu_id,$ticket,$table)
    {
        $menuGroup = DB::select("select menu.name,menu.id as 'MenuId',orders.id as 'order_id',ticket.id as 'TicketId',orders.status_id as 'status' from menu,orders,ticket where orders.status_id = 3 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and menu.id=$menu_id and ticket.id=$ticket");
        for($a=0;$a<count($menuGroup);$a++){
        $orderid=$menuGroup[$a]->order_id;
        $updatedeliver=DB::select("update orders set status_id=4 where id=$orderid and orders.status_id!=5" );
        }

        $checkTableNull = DB::select("Select * from tables where id = $table;");
        $checkTicket = DB::select("Select * from ticket where id = $ticket");
        $testmessage = "";
        $todayDate = Carbon::now();
        $todayDate=$todayDate->format('g:i a');
        $todayend = Carbon::now()->addMinutes(90);

        $menuIf = DB::select("Select * from menu where id = $menu_id");

        if ($menuIf[0]->Category_ID == 5 ){

            $addTimer=DB::select("select menu.name,orders.id,category_menu.id,menu.id, tables.id
            from menu,ticket,orders,category_menu,tables
            where menu.Category_ID=category_menu.id and orders.menu_id=menu.id and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and ticket.table_id=tables.id and category_menu.id=5 and table_id=$table
            group by menu.name;");

            $updatetime=DB::select("UPDATE ticket SET Start_time = '$todayDate' where ticket.table_id=$table and ticket.ticket_status_id=2");
                if(count($addTimer)!=0){
                    $updatetable=DB::select("UPDATE `uptown`.`tables` SET `end_time` = '$todayend' WHERE (`id` = $table);");

                }
        }






        // $this->addTimer=$addTimer;
        // $this->count=count($addTimer);
        // $this->time=$todayDate;


        $this->menu_id = $menu_id;
        $this->ticket = $ticket;
        $this->menuGroup = $menuGroup;
        $this->table = $table;
        $this->testmessage = $testmessage;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('DeliverEvent');
    }
    public function broadcastAS()
    {
        return 'DeliverEvent';
    }
}
