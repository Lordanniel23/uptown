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

class enablemenuEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $menuid; 
    public $menuitem; 


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($menuid)
    {
        $this->menuid = $menuid;

        $menuitem = DB::select("SELECT * FROM menu where id = $menuid");
        $menu = DB::select("UPDATE menu SET status_id = 1 where id = $menuid");

        $this->menuitem = $menuitem;
       


    }



    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('enablemenuEvent');
    }

    public function broadcastAs(){
        return 'enablemenuEvent';
    }
}
