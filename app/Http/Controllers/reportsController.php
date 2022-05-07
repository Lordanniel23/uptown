<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class reportsController extends Controller
{
    public function bestseller()
    {
        $roles = DB::select("Select * from roles");
        $users = DB::select("Select * from users");
        $bestsellers = DB::select("SELECT menu.id,menu.Image,menu.Name,menu.price,category_menu.name as 'Category',DATE(orders.created_at) as 'created_at',count(menu_id) as 'count' FROM orders,menu,category_menu where menu.id = orders.Menu_id and category_menu.id = menu.Category_ID group by menu_id , DATE(orders.created_at) having count(menu_id) > 1 order by count desc;");
       return view('admin/reports.popularmenu', compact('bestsellers','roles','users'));
    }



        public static function sales(){
            $roles = DB::select("Select * from roles");
            $today1 = DB::select("select menu.price from menu,orders,category_menu where orders.Menu_id = menu.id and orders.status_id = 4 and category_menu.id = menu.Category_ID and created_at >= curdate();");
            $today1 = collect($today1)->sum('price');
            $week1 = DB::select("select menu.price from menu,orders,category_menu where orders.Menu_id = menu.id and orders.status_id = 4 and category_menu.id = menu.Category_ID and created_at >= now() - interval 1 week;");
            $week1 = collect($week1)->sum('price');
            $twoweek1 = DB::select("select menu.price from menu,orders,category_menu where orders.Menu_id = menu.id and orders.status_id = 4 and category_menu.id = menu.Category_ID and created_at >= now() - interval 2 week;");
            $twoweek1 = collect($twoweek1)->sum('price');
            $month1 = DB::select("select menu.price from menu,orders,category_menu where orders.Menu_id = menu.id and orders.status_id = 4 and category_menu.id = menu.Category_ID and MONTH(created_at) = MONTH(now());");
            $month1 = collect($month1)->sum('price');
            $todays=array(); 
            $weeks=array(); 
            $twoweeks=array(); 
            $months=array(); 
    
            $populars = DB::select("select menu.id as 'menuid',menu.image,menu.name,category_menu.name as 'category',menu.price,count(menu.name) as 'popular' from menu,orders,category_menu where orders.Menu_id = menu.id and category_menu.id = menu.Category_ID  and orders.status_id = 4 group by menu.id order by popular desc limit 7;");
            $menus = DB::select("select *,menu.id as 'menuid' from menu,category_menu where menu.Category_ID = category_menu.id and menu.status_id != 3 ;");
            // dd($menus);
            $day =  Carbon::today();
            for ($i=0; $i < count($menus); $i++) {
                $menu=$menus[$i]->menuid;
                $today = DB::select(" select *,( select count(menu.name) as 'popular' from menu,orders,category_menu where orders.Menu_id = menu.id and category_menu.id = menu.Category_ID and orders.created_at >= '$day' and menu.id= $menu and orders.status_id = 4 group by menu.id desc ) as 'popular'   from menu where menu.id= $menu order by popular desc");
                array_push($todays,$today);
            }
            for ($i=0; $i < count($menus); $i++) {
                $menu=$menus[$i]->menuid;
                $week = DB::select(" select *,( select count(menu.name) as 'popular' from menu,orders,category_menu where orders.Menu_id = menu.id and category_menu.id = menu.Category_ID and orders.created_at >= 'now() - interval 1 week' and orders.status_id = 4 and menu.id= $menu group by menu.id  order by popular desc ) as 'popular' from menu where menu.id= $menu order by popular desc");
                array_push($weeks,$week);
            }
            for ($i=0; $i < count($menus); $i++) {
                $menu=$menus[$i]->menuid;
                $twoweek = DB::select(" select *,( select count(menu.name) as 'popular' from menu,orders,category_menu where orders.Menu_id = menu.id and category_menu.id = menu.Category_ID and orders.created_at >= 'now() - interval 2 week' and orders.status_id = 4 and menu.id= $menu group by menu.id  order by popular desc ) as 'popular' from menu where menu.id= $menu order by popular desc");
                array_push($twoweeks,$twoweek);
            }
            for ($i=0; $i < count($menus); $i++) {
                $menu=$menus[$i]->menuid;
                $month = DB::select(" select *,( select count(menu.name) as 'popular' from menu,orders,category_menu where orders.Menu_id = menu.id and category_menu.id = menu.Category_ID and orders.status_id = 4  and orders.created_at >= 'MONTH(now())' and menu.id= $menu group by menu.id  order by popular desc ) as 'popular' from menu where menu.id= $menu order by popular desc");
                array_push($months,$month);
            }

            // dd($todays);

            // dd($week);
            return view('admin/reports.salesreport',compact('roles','today1','week1','twoweek1','month1','populars','menus','todays','weeks','twoweeks','months'));

        }
        public static function menu(){
            $roles = DB::select("Select * from roles");
            $menus = DB::select("Select * from menu");
            $users = DB::select("Select * from users");
            $status = DB::select("Select * from status_menu");
           return view('admin/reports.menu', compact('menus','roles','users','status'));

        }
        public static function users(){
            $roles = DB::select("Select * from roles");
            $users = DB::select("Select * from users");
            $status = DB::select("select * from status_user;");
                // dd($status);
    
            return view('admin/reports.employee', compact('users','roles','status'));
            }
        public static function backup(){


            $tableid=1;
            $ticketid = DB::select("SELECT ticket.id FROM uptown.ticket where table_id = $tableid;");
            $ticketid = $ticketid[0]->id;
            $discounts = DB::select("SELECT orders.discount_id,discount.name FROM orders,ticket,discount where discount.id = orders.discount_id and ticket.id = orders.ticket_id and orders.ticket_id = '$ticketid' group by discount_id;");
            $discounttype = DB::select("SELECT * from discount");

            dd($discounts);






                return view('admin/reports.bestseller');
        }    
       
}
