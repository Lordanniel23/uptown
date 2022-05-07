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

class readyOrderEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table_id;
    public $addTimer;
    public $time;
    public $count;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table_id)
    {
        $this->table_id=$table_id;

        $update=DB::select("UPDATE tables,ticket,orders SET `status_id` = '3' WHERE orders.ticket_id=ticket.id and orders.status_id!=5 and ticket.table_id=tables.id and tables.id =$table_id and orders.status_id=2;");
        $updateTable=DB::select("UPDATE tables set table_status_id=3 where id=$table_id");
        // $todayDate = Carbon::now()->addMinutes(90);
        // $todayDate = Carbon::now();
        // $todayDate=$todayDate->format('g:i a');
        // $todayend = Carbon::now()->addMinutes(90);
        // $addTimer=DB::select("select menu.name,orders.id,category_menu.id,menu.id, tables.id
        // from menu,ticket,orders,category_menu,tables
        // where menu.Category_ID=category_menu.id and orders.menu_id=menu.id and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and ticket.table_id=tables.id and category_menu.id=5 and table_id=$table_id
        // group by menu.name;");

        // $updatetime=DB::select("UPDATE ticket SET Start_time = '$todayDate' where ticket.table_id=$table_id and ticket.ticket_status_id=2");
        // if(count($addTimer)!=0){
        //     $updatetable=DB::select("UPDATE `uptown`.`tables` SET `end_time` = '$todayend' WHERE (`id` = $table_id);");
        // }
        // $this->addTimer=$addTimer;
        // $this->count=count($addTimer);
        // $this->time=$todayDate;

    }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('readyOrderEvent');
    }

    public function broadcastAs(){
        return 'readyOrderEvent';
    }
}
