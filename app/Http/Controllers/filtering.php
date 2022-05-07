<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\models\menuModel;
use File;
use Validator; 
use Auth;

class filtering extends Controller 
{
    public function menuName(Request $request){
        $name=$request->name;
        $menus = DB::select("Select * from menu where Name= '$name' ");
        return $menus;
      }
      public function menuNameedit(Request $request){
        $name=$request->name; 
        $id=$request->id;
        $menus = DB::select("Select * from menu where Name= '$name' and id != $id ");
        return $menus;
      }
      public function categoryName(Request $request){
        $name=$request->name;
        $category = DB::select("Select * from category_menu where Name= '$name'");
        return $category;
      }
      public function categoryNameedit(Request $request){
        $name=$request->name;
        $id=$request->id;
        $category = DB::select("Select * from category_menu where Name= '$name' and id != $id ");
        return $category;
      }
      public function employeeUsername(Request $request){
        $name=$request->name;
        $employee = DB::select("select * from users where username = '$name'");
        return $employee;
      }
      public function menucategory(Request $request){
        $name=$request->name;
        $employee = DB::select("select * from category_menu where name = '$name'");
        return $employee;
      }
      public function menucategoryz(Request $request){
        $name=$request->name;
        $id=$request->id;
        $employee = DB::select("select * from category_menu where name = '$name' and id != '$id'");
        return $employee;
      }
      public function submenuName(Request $request){
        $name=$request->name;
        $menus = DB::select("Select * from menu where name= '$name' ");
        return $menus;
      }
      public function submenuNameedit(Request $request){
        $id=$request->id;
        $name=$request->name;
        $menus = DB::select("Select * from submenu where name= '$name' and id != $id ");
        return $menus;
      }
      public function mindateone(Request $request){
        $q1=$request->q1;
        $menus = DB::select("SELECT menu.id,menu.Image,menu.Name,menu.price,category_menu.name as 'Category',orders.created_at,count(menu_id) as 'count' FROM orders,menu,category_menu where menu.id = orders.Menu_id and category_menu.id = menu.Category_ID and DATE(created_at) = '$q1' group by menu_id having count(menu_id) > 1 order by count desc;");
        return $menus;
      }
      public function reciept(Request $request){
        $tableid=$request->tableid;
        $ticketid = DB::select("SELECT ticket.id FROM uptown.ticket where table_id = $tableid;");
        $ticketid = $ticketid[0]->id;
        $value = DB::select("SELECT menu.Name,count(orders.Menu_id) as 'quantity',orders.price,count(orders.Menu_id) * orders.price as 'total' FROM orders,ticket,menu where ticket.id = orders.ticket_id and orders.ticket_id = $ticketid and menu.id = orders.Menu_id and orders.status_id != 1 and orders.status_id != 5 and orders.status_id != 7 group by orders.menu_id order by menu.Name asc;");
        // $sum = DB::select("SELECT sum(orders.price) as 'sum' FROM orders,ticket where ticket.id = orders.ticket_id and orders.ticket_id = '$ticketid';");
        // $sum = $sum[0]->sum;
        // $sum = $value['subtotal'];
        // $value['menus'] = $menus;
        // $value['sum'] = $sum;
        return $value;
      }
      public function recieptsubtotal(Request $request){
        $tableid=$request->tableid;
        $ticketid = DB::select("SELECT ticket.id FROM uptown.ticket where table_id = $tableid;");
        $ticketid = $ticketid[0]->id;
        $sum = DB::select("SELECT sum(orders.price) as 'sum' FROM orders,ticket where ticket.id = orders.ticket_id and orders.ticket_id = '$ticketid' and orders.status_id != 1 and orders.status_id != 5 and orders.status_id != 7;");
        return $sum;
      }
      public function ticketid(Request $request){
        $tableid=$request->tableid;
        $ticketid = DB::select("SELECT ticket.id FROM uptown.ticket where table_id = $tableid;");
        return $ticketid;
      }
      public function recieptauth(Request $request){
        $auth = Auth::user()->name;
        return $auth;
      }

      public function recieptdiscount(Request $request){
        $tableid=$request->tableid;
        $ticketid = DB::select("SELECT ticket.id FROM uptown.ticket where table_id = $tableid;");
        $ticketid = $ticketid[0]->id;
        $discounts = DB::select("SELECT orders.discount_id,discount.name FROM orders,ticket,discount where discount.id = orders.discount_id and ticket.id = orders.ticket_id and orders.ticket_id = '$ticketid' and discount.id != 3 group by discount_id;");
        $discounttype = DB::select("SELECT * from discount");
        $result['discounts'] = $discounts;
        $result['discounttype'] = $discounttype;
        return $result;
      }
}
