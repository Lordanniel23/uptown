<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class kitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = DB::select("select tables.id, tables.tablename,tables.table_status_id,orders.status_id,ticket.id as 'tiket_id'
        from ticket,tables,orders
        where ticket.table_id=tables.id and orders.ticket_id=ticket.id and orders.status_id  =2
        group by tables.tablename order by orders.id");
        // $table = DB::select("Select * from tables");
        $tickid = DB::select("select ticket.id,ticket.table_id from ticket,tables where ticket.table_id = tables.tablename and ticket_status_id=2  order by ticket.id;");
        $menus=DB::select("select menu.id, menu.name, menu.price, menu.image, sub_category_menu.name as 'sub_category_name', category_menu.name as 'Category_Name', category_menu.id as 'Category_id', menu.status_id as 'Status_id'
        from menu,sub_category_menu,category_menu
        where  menu.Category_ID=category_menu.id and menu.status_id!=3
        group by menu.name");
        $orders = DB::select("select ticket.id,menu.name,menu.price from menu,orders,ticket where orders.ticket_id=ticket.id and orders.Menu_id=menu.id;");
        // dd($tables);

        foreach ($tables as $tab) {
            $menu = DB::select("select menu.id,menu.name,menu.price,sum(menu.price) as total_Price,count(menu.name) as total
            from menu,orders,ticket
            where orders.ticket_id=ticket.id and orders.Menu_id=menu.id and orders.status_id='2' and ticket.ticket_status_id=2 and ticket.table_id = " . $tab->tablename . "
            group by menu.id;");
            // $tab->tablename=$menu;
            $tab->menu=$menu;
        };

         ($menu);


        return view('kitchen.index', compact('tables','tickid','orders','menus'));

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

    public function changeTOdeliveredKitchen( Request $request){
        $menu = $request->menu_id;
        $ticket = $request->ticket_id;

        $menuGroup = DB::select("select menu.name,menu.id as 'MenuId',orders.id as 'order_id',ticket.id as 'TicketId',orders.status_id as 'status' from menu,orders,ticket where orders.status_id = 2 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and menu.id=$menu and ticket.id=$ticket");
        for($a=0;$a<count($menuGroup);$a++){
        $orderid=$menuGroup[$a]->order_id;
        $updatedeliver=DB::select("update orders set status_id=3 where id=$orderid and orders.status_id!=5" );
        }

        return $menuGroup;
    }
}
