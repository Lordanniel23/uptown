<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class waiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $discount2=DB::select("select * from discount where discount.id!=3 and discount.status!=3 ");
        $tables = DB::select("Select * from tables where tables.table_status_id !=5 and tables.table_status_id !=4 ");
        $categories2 = Db::select("Select category_menu.name as name, category_menu.id , count(menu.id) as menu_count ,category_menu.status_id as status_id from category_menu,menu where menu.status_id!=3 and  category_menu.id = menu.Category_ID group by category_menu.id  ;");
        $categories = DB::select("Select * from category_menu where category_menu.status_id=1");
        $tickid = DB::select("SELECT ticket.id,ticket.table_id FROM ticket,tables where ticket.table_id = tables.tablename;");
        $menus=DB::select("select menu.id, menu.name, menu.price, menu.image, sub_category_menu.name as 'sub_category_name', category_menu.name as 'Category_Name', category_menu.id as 'Category_id', menu.status_id as 'Status_id'
        from menu,sub_category_menu,category_menu
        where  menu.Category_ID=category_menu.id and menu.status_id!=3
        group by menu.name");
        $discs = DB::select("SELECT * FROM discount where discount.status!=3");
        return view('waiter.index', compact('discount2','tables','categories','menus','user','tickid','discs','categories2'));
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

    public function cartItem($id){
        $table = DB::select("SELECT tables.id FROM tables where tables.tablename = $id;");
        $table_id = $table[0]->id;
        $tickid = DB::select("SELECT ticket.id FROM ticket where ticket.table_id = $table_id and  ticket.ticket_status_id = 2 ;");
        $ticket_id = $tickid[0]->id;
        $menu1=DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
        $menu2=DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 2 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
        $menu3=DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 3 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
        $menu4=DB::select("select menu.name,menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 4 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
        $allMenu=DB::select("select menu.name,menu.price,menu.price as 'Total',orders.id as 'orderId',orders.status_id as 'status',orders.id,menu.name as 'quantity' from menu,orders,ticket where  orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id ");
        $data['unconfirm']=$menu1;
        $data['confirm']=$menu2;
        $data['delivery']=$menu3;
        $data['delivered']=$menu4;
        $data['all']=$allMenu;
        return $data;
    }
    public function cartcount(Request $request){
        $table_id = $request->tableId;


        $orderCount=DB::select("select count(*) as 'count' from orders,ticket,tables where orders.ticket_id=ticket.id and ticket.table_id=tables.id and  tables.id=$table_id and ticket.ticket_status_id=2" );
        $orderCount1=DB::select("select count(*) as 'count' from orders,ticket,tables where orders.ticket_id=ticket.id and ticket.table_id=tables.id and  tables.id=$table_id and ticket.ticket_status_id=2 and orders.status_id = 1" );
        return  $orderCount1;
    }
    public function cartItem1($id){
        $tableticketCount = DB::select("
        SELECT tables.id as table_id,count(ticket.id)  as ticket_count
         from ticket,tables
         where tables.id = $id and ticket.table_id = tables.id and ticket.ticket_status_id = 2 ;");

         if( $tableticketCount[0]->ticket_count == 0 ){

         }else{
            $table = DB::select("SELECT tables.id FROM tables where tables.tablename = $id;");
            $table_id = $table[0]->id;
            $tickid = DB::select("SELECT ticket.id FROM ticket where ticket.table_id = $table_id and  ticket.ticket_status_id = 2 ;");
            $ticket_id = $tickid[0]->id;
            $test=array();
            $test2=array();
            $user =  Auth::user()->id;
            // $data['confirm'];
            //confimed menu item
            $menuidConfirm=DB::select("select menu.id ,orders.user_id as user from orders,menu,tables,ticket where  orders.Menu_id=menu.id and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and orders.status_id=2 and ticket.table_id=tables.id and tables.id=$table_id group by menu_id ");
            $menuid=DB::select("select menu.id ,orders.user_id as user from orders,menu,tables,ticket where orders.user_id = $user and  orders.Menu_id=menu.id and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and orders.status_id=1 and ticket.table_id=tables.id and tables.id=$table_id group by menu_id ");
            $menuid1=DB::select("select orders.id as order_id, menu.id ,orders.user_id as user from orders,menu,tables,ticket where orders.user_id = $user and  orders.Menu_id=menu.id and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and orders.status_id=1 and ticket.table_id=tables.id and tables.id=$table_id  ");
            $count=count($menuid);
            $countconfirm=count($menuidConfirm);

            //for delivery
            $menu3=DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 3 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
            //delivered
            $menu4=DB::select("select menu.name,menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 4 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");

            for($a=0;$a<$count;$a++){
                $menid=$menuid[$a]->id;
                $confirmMenu=DB::select("select orders.ticket_id as ticket_id, ticket.table_id as tableid, orders.Menu_id as menu_id , orders.id as order_id , orders.user_id as user, menu.name ,menu.price,(select sum(menu.Price-(menu.Price*(discount.Percentage/100))) from orders,menu,discount,ticket where orders.menu_id=menu.id and orders.discount_id=discount.id and orders.ticket_id=ticket.id and ticket.table_id=$table_id and
                Menu_id=$menid and  orders.status_id=1 and ticket.ticket_status_id=2
                group by menu_id ) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' , (select count(orders.discount_id) from menu,orders,ticket as dicountCount  where orders.discount_id !=3 and Menu_id=$menid and orders.status_id != 1 and orders.status_id = 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id  ) as 'discount' from menu,orders,ticket
                        where orders.status_id=1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id and menu_id=$menid
                        group by menu.id");
                        $data['test']=$count;
                //  $data['discounted'][$a]['name']=$confirmMenu[0]->name;
                    array_push($test,$confirmMenu);

            }

            //for confimed
            for($a=0;$a<$countconfirm;$a++){
                $menid2=$menuidConfirm[$a]->id;
                $confirmMenu2=DB::select("select orders.ticket_id as ticket_id, ticket.table_id as tableid, orders.Menu_id as menu_id , orders.id as order_id , orders.user_id as user, menu.name ,menu.price,(select sum(menu.Price-(menu.Price*(discount.Percentage/100))) from orders,menu,discount,ticket where orders.menu_id=menu.id and orders.discount_id=discount.id and orders.ticket_id=ticket.id and ticket.table_id=$table_id and
                Menu_id=$menid2 and  orders.status_id=2 and ticket.ticket_status_id=2
                group by menu_id ) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' , (select count(orders.discount_id) from menu,orders,ticket as dicountCount  where orders.discount_id !=3 and Menu_id=$menid2 and orders.status_id != 1 and orders.status_id = 2 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id  ) as 'discount' from menu,orders,ticket
                        where orders.status_id=2 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id and menu_id=$menid2
                        group by menu.id");
                        $data['test2']=$countconfirm;
                //  $data['discounted'][$a]['name']=$confirmMenu[0]->name;
                    array_push($test2,$confirmMenu2);

            }


            $data['test']=$test;
            $data['test2']=$test2;
            $menu1=DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' from menu,orders,ticket where orders.status_id = 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id group by menu.id");
            $menu2=DB::select("select menu.name,menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity',
            (select count(orders.discount_id) from menu,orders,ticket  where orders.discount_id !=3 and orders.status_id != 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id   ) as 'discount'
            from menu,orders,ticket
            where orders.status_id != 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id
            group by menu.id");

            $allMenu=DB::select("select orders.user_id as user, menu.name,menu.price,sum(menu.price) as 'Total',orders.status_id as 'status',orders.id,count(menu.name) as 'quantity' ,
            (select count(orders.discount_id) from menu,orders,ticket  where orders.user_id = $user and  orders.discount_id !=3 and orders.status_id = 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id   ) as 'discount'
            from menu,orders,ticket
            where orders.status_id = 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and ticket.table_id=$table_id
            group by menu.id");
            $data['unconfirm']=$menu1;
            $data['confirm']=$test;
            $data['confirmorders']=$test2;
            $data['all']=$allMenu;
            $data['menu']=$menuid1;
            $data['delivery']=$menu3;
            $data['delivered']=$menu4;
         }




        $data['ticketCount']=$tableticketCount;
        return $data;
    }

    public function vieworder(Request $request){
        $menuid=$request->menuId;
        $ticketid=$request->ticketId;
        $menu1=DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',orders.status_id as 'status' from menu,orders,ticket where orders.status_id = 1 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and menu.id=$menuid and ticket.id=$ticketid");
        return $menu1;
    }

    public function editCart($ticket_id,$menu_id){
        $ticket_id = $ticket_id;
        $menu = $menu_id;
        dd($ticket_id);

    }

    public function getMenuItem( Request $request){
        $menu = $request->menu_id;
        $ticket = $request->ticket_id;

        $menuGroup = DB::select("select menu.name as 'menu_name', discount.name,orders.id
        from orders,menu,discount,ticket
        where orders.ticket_id=ticket.id and orders.discount_id=discount.id and orders.Menu_id=menu.id and orders.status_id!=5 and orders.ticket_id=$ticket and orders.menu_id=$menu");
        return $menuGroup;
    }

    public function cancelMenu( Request $request){
       $order_id=$request->orderid;
       $updatedeliver=DB::select("update orders set status_id=5 where id=$order_id");


       return $order_id;
    }
    public function getMenuItemdelivery( Request $request){
        $menu = $request->menu_id;
        $ticket = $request->ticket_id;

        $menuGroup = DB::select("select menu.name,menu.id as 'MenuId',ticket.id as 'TicketId',orders.status_id as 'status' from menu,orders,ticket where orders.status_id = 3 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and menu.id=$menu and ticket.id=$ticket");
        return $menuGroup ;
    }

   public function changeTOdelivered( Request $request){
        $menu = $request->menu_id;
        $ticket = $request->ticket_id;

        $menuGroup = DB::select("select menu.name,menu.id as 'MenuId',orders.id as 'order_id',ticket.id as 'TicketId',orders.status_id as 'status' from menu,orders,ticket where orders.status_id = 3 and ticket.ticket_status_id=2 and orders.ticket_id=ticket.id and orders.Menu_id=menu.id and menu.id=$menu and ticket.id=$ticket");
        for($a=0;$a<count($menuGroup);$a++){
        $orderid=$menuGroup[$a]->order_id;
        $updatedeliver=DB::select("update orders set status_id=4 where id=$orderid and orders.status_id!=5" );
        }

        return $menuGroup[0]->order_id;
    }


    public function clearcart(Request $request){

        $table = $request->table;

        $menuGroup = DB::select("select  tables.id as 'table',menu.name as 'menu',orders.id as 'order_id' from menu,ticket,orders,tables where orders.status_id =1 and ticket.ticket_status_id=2 and orders.Menu_id = menu.id and ticket.table_id =tables.id and tables.id=$table and orders.ticket_id=ticket.id;");
        for($a=0;$a<count($menuGroup);$a++){
            $orderid=$menuGroup[$a]->order_id;
            $updatedeliver=DB::select("update orders set status_id=5 where id=$orderid" );
            }
        return $menuGroup;
    }

    public function canselcartItem(Request $request){

        $tableid = $request->tableID;
        $menuID = $request->menuID;
        $ticketID = $request->ticketID;
        $userID = $request->userID;
        $quantity = $request->quantity;

        $menuGroup = DB::select("select tables.id as 'table',menu.name as 'menu',orders.id as 'order_id' from menu,ticket,orders,tables where orders.Menu_id=$menuID and orders.status_id =1 and ticket.ticket_status_id=2 and orders.Menu_id = menu.id and ticket.table_id =tables.id and tables.id=$tableid and orders.ticket_id=ticket.id and orders.user_id=$userID;");
            for($a=0;$a<count($menuGroup);$a++){
            $orderid=$menuGroup[$a]->order_id;
            $updatedeliver=DB::select("update orders set status_id=5 where id=$orderid" );
            }
        return $menuGroup;


    }

    public function EditcartQuantity(Request $request){

        $order_id = $request->order_id;
        $tableNum = $request->table_num;
        $menu_id = $request->menu_id;
        $cartQuantity = $request->quantity;
        $ticket_id = $request->ticket_id;

        $menuGroup = DB::select("select orders.Menu_id as 'menu_id' ,menu.Name, ticket.id as 'ticket_id', orders.id as 'order_id' from orders,ticket,menu where menu.id = $menu_id and ticket.id =  $ticket_id and orders.Menu_id =  menu.id and ticket.ticket_status_id = 2 and orders.status_id =1 and ticket.table_id = $tableNum order by  orders.discount_id DESC");
            for($a=0;$a<(count($menuGroup)-$cartQuantity);$a++){
                $orderid=$menuGroup[$a]->order_id;
                $updatedeliver=DB::select("update orders set status_id=5 where id=$orderid" );
                }

        return  $menuGroup;

    }

    public function cartCountQuantity(Request $request){
        $table = $request->table;
        //if table has no ticket return 0
        $cartcount = count($menuGroup =DB::select("select orders.Menu_id as 'menu_id' ,menu.Name, ticket.id as 'ticket_id', orders.id as 'order_id'
        from orders,ticket,menu
        where orders.ticket_id = ticket.id and orders.Menu_id=menu.id and  ticket.table_id = $table  and ticket.ticket_status_id = 2
        and orders.status_id =1"));
        return $cartcount ;
    }

    public function discountappend(Request $request){

        $table = $request->tableid;
        $menuid = $request->menuId;
        $userid = $request->userid;
        $discounttypes = Db::select("SELECT * FROM discount where discount.status !=3");
        $discounts = DB::select("
        select discount.name as discount_name, orders.id as order_id, menu.id as menu_id ,orders.user_id as user, orders.discount_id as discount, count(orders.discount_id) as count_discount
        from orders,menu,tables,ticket,discount
        where discount.id = orders.discount_id and  orders.user_id =$userid and orders.Menu_id=$menuid and orders.Menu_id=menu.id and orders.ticket_id=ticket.id and ticket.ticket_status_id=2 and orders.status_id=1 and ticket.table_id=tables.id and tables.id=$table
        group by orders.discount_id");


        $data['discounts']=$discounts;
        $data['discounttypes']=$discounttypes;

        return $data;

    }


}
