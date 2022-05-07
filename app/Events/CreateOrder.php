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

class CreateOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $table;
    public $menu_id;
    public $user_id;
    public $status_id;
    public $discount_id;
    public $ticket;
    public $orderCount;
    public $menu;
    public $recentsales;
    public $menuOnly;
    public $quantity;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table,$menu_id,$user_id,$status_id,$discount_id,$quantity)
    {
        $this->table=$table;
        $this->menu_id=$menu_id;
        $this->user_id=$user_id;
        $this->status_id=$status_id;
        $this->discount_id=$discount_id;
        $this->quantity=$quantity;


        $ticket=DB::select("select ticket.id from ticket where ticket_status_id=2 and table_id=$table order by ticket.id desc limit 1 ");
        $ticket=$ticket[0]->id;
        $menuprice=DB::select("select Price from menu where id = '$menu_id' ");
        $menuprice=$menuprice[0]->Price;
        for($a=0;$a<$quantity;$a++){
            $order = DB::select("INSERT INTO `uptown`.`orders` (`ticket_id`, `Menu_id`, `user_id`, `status_id`, `discount_id`, `price`) VALUES ($ticket, $menu_id,$user_id, $status_id, $discount_id,$menuprice);");
        }

        $orderCount=DB::select("select orders.Menu_id as 'menu_id' ,menu.Name, ticket.id as 'ticket_id', orders.id as 'order_id'
        from orders,ticket,menu
        where orders.ticket_id = ticket.id and orders.Menu_id=menu.id and  ticket.table_id = $table  and ticket.ticket_status_id = 2
        and orders.status_id =1 ");
        $menu=DB::select("select menu.name,menu.price,sum(menu.price) as 'Total',count(menu.name) as 'quantity' from menu,orders,ticket where orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table group by menu.id");

        $menuOnly=DB::select("select menu.name from menu where menu.id=$menu_id");
        $recentsales = DB::select("select orders.id,menu.name as Menuname,menu.price,users.name as username,orders.created_at FROM orders,menu,users where menu.id = orders.menu_id and orders.user_id = users.id order by created_at desc limit 1;");
        $this->ticket=$ticket;
        $this->orderCount=$orderCount;
        $this->menu=$menu;
        $this->menuOnly=$menuOnly;
        $this->recentsales=$recentsales;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('createOrder');
    }
    public function broadCastAs()
    {
        return 'createOrder';
    }
}
