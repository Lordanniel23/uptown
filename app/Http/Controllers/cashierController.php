<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class cashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::select("Select * from roles");
        $address = DB::select("Select * from systemsettings where id = 1");
        $contactnumber = DB::select("Select * from systemsettings where id = 2");
        $user = Auth::user()->id;
        $tables = DB::select("Select * from tables where table_status_id != 5");
        $categories = DB::select("Select * from category_menu ORDER BY id DESC");
        $categories2 = Db::select("Select category_menu.name as name, category_menu.id , count(menu.id) as menu_count ,category_menu.status_id as status_id from category_menu,menu where menu.status_id!=3 and  category_menu.id = menu.Category_ID group by category_menu.id  ;");
        $menus=DB::select("select menu.id, menu.name, menu.price, menu.image, sub_category_menu.name as 'sub_category_name', category_menu.name as 'Category_Name', category_menu.id as 'Category_id', menu.status_id as 'Status_id'
        from menu,sub_category_menu,category_menu
        where  menu.Category_ID=category_menu.id and menu.status_id!=3
        group by menu.name");
        $discount=DB::select("select * from discount where discount.status!=3");
        $discount2=DB::select("select * from discount where discount.id!=3 and discount.status!=3 ");
        $available=DB::select('select count(*) as available from tables where tables.table_status_id = 1;');
        $timestarted=DB::select('select count(*) as started from uptown.tables where end_time != 0');
        // $timestarted=DB::select('select count(*) as started from uptown.ticket where Start_time != 0 and ticket_status_id = 2;');
        $timestarted = $timestarted[0]->started;
        $available = $available[0]->available;
        $discs = DB::select("SELECT * FROM discount where discount.status!=3");
        $orderTaken=DB::select('select orders.id ,ticket.id as ticket_id from orders , ticket where orders.status_id =2 and ticket.ticket_status_id =2 and orders.ticket_id = ticket.id; ');
        $ordersCount = count($orderTaken);
        // dd($available);
        return view('cashier.index', compact('tables','categories2','categories','menus','roles','discount','user','available','timestarted','discs','ordersCount','discount2','roles','address',''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getCashierStatus(){

        $available=DB::select('select count(*) as available from tables where tables.table_status_id = 1;');
        $timestarted=DB::select('select count(*) as started from uptown.tables where end_time != " "');
        // $timestarted=DB::select('select count(*) as started from uptown.ticket where Start_time != 0 and ticket_status_id = 2;');
        $orderTaken=DB::select('select orders.id ,ticket.id as ticket_id from orders , ticket where orders.status_id =2 and ticket.ticket_status_id =2 and orders.ticket_id = ticket.id; ');
        $timestarted = $timestarted[0]->started;
        $available = $available[0]->available;
        $ordersCount = count($orderTaken);
        $data['available'] = $available;
        $data['timerStarted'] = $timestarted;
        $data['ordertaken'] = $ordersCount;
        return $data;
    }

    public function timeEnding(){
        $items = DB::select('select ticket.table_id as tableID ,ticket.Start_time as start_time,tables.end_time as end_time  from ticket,tables where Start_time != " " and tables.end_time != " " and ticket_status_id = 2 and tables.id = ticket.table_id ;');
        $data['timeEnding']= $items;
        return $data;
    }
    public function tableStatusIndicator(){

        $tableStatusIndicator = DB::select('select ticket.id as ticket_id,tables.id as table_id , sum(orders.status_id = 2) as confirmed, sum(orders.status_id = 3) as to_serve,sum(orders.status_id = 4) as delivered from  ticket,orders,tables where orders.ticket_id = ticket.id and tables.id = ticket.table_id and ticket.ticket_status_id =2 group by ticket.id ; ');
        $data['tablesStatus']= $tableStatusIndicator;
        return $data ;
    }

    public function EditCartCart(Request $request){
        $order_id = $request->order_id;
        $tableNum = $request->table_num;
        $menu_id = $request->menu_id;
        $cartQuantity = $request->quantity;
        $ticket_id = $request->ticket_id;
        $discount_type = $request->discount;

        $menuGroup = DB::select("select orders.Menu_id as 'menu_id' ,menu.Name, ticket.id as 'ticket_id', orders.id as 'order_id' from orders,ticket,menu where menu.id = $menu_id and ticket.id =  $ticket_id and orders.Menu_id =  menu.id and ticket.ticket_status_id = 2 and orders.status_id =1 and ticket.table_id = $tableNum and orders.discount_id = $discount_type ");
            for($a=0;$a<(count($menuGroup)-$cartQuantity);$a++){
                $orderid=$menuGroup[$a]->order_id;
                $updatedeliver=DB::select("update orders set status_id=5 where id=$orderid" );
                }

        return  $menuGroup;
    }


}
