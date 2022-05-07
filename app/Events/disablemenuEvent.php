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

class disablemenuEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $menuid; 
    public $menuitem; 
    public $menuname;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($menuid)
    {
        $this->menuid = $menuid;

        $menuitem = DB::select("SELECT * FROM menu where id = $menuid");
        $menuname = $menuitem[0]->Name;
        $menu = DB::select("UPDATE menu SET status_id = 2 where id = $menuid");
        $orders = DB::select("update orders set status_id = 7 where status_id = 2 or status_id = 1  and Menu_id = '$menuid';");

        $this->menuitem = $menuitem;
        $this->menuname = $menuname;


    }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('disablemenuEvent');
    }

    public function broadcastAs(){
        return 'disablemenuEvent';
    }
}
