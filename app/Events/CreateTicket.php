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



class CreateTicket implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table;
    public $ticket_status;
    public $user;
    public $status;
    public $count;
    public $ticket_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table,$ticket_status,$user)
    {
        $this->table=$table;
        $this->ticket_status=$ticket_status;
        $this->user = $user;
        $status = DB::select("select * from ticket where table_id=$table and ticket_status_id=2");
        $count=count($status);

        if($count==1){

        }else if($count==0 && $count!=1){
            DB::select("INSERT INTO ticket (`table_id`, `ticket_status_id`, `user_id`, `Total_Price`, `Received_total`, `Change_total`, `Start_time`)
            VALUES ($table, $ticket_status,$user, '0', '0', '0', '0')");
            $ticket_id= DB::select("select id from ticket where ticket_status_id=$ticket_status and table_id=$table");
            DB::select("UPDATE `uptown`.`tables` SET `table_status_id` = '2' WHERE (`id` = $table)");
        $this->ticket_id=$ticket_id[0]->id;
        }
        $this->status=$status;
        //$this->count=$count;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('createTicket');
    }
    public function broadcastAs(){
        return 'createTicket';
    }
}
