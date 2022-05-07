<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\waiterController;
use App\Http\Controllers\kitchenController;
use App\Http\Controllers\cashierController;
use App\Http\Controllers\menuController;
use App\Events\Message;
use App\Events\CreateTicket;
use App\Events\CreateOrder;
use App\Events\unconfirmedEvent;
use App\Events\confirmOrderEvent;
use App\Events\readyOrderEvent;
use App\Events\paymentEvent;
use App\Events\TimerEvent;
use App\Events\deliveryEvent;
use App\Events\DeliverEvent;
use App\Events\serveAllEvent;
use App\Events\disablemenuEvent;
use App\Events\enablemenuEvent;
use App\Events\timeEdningEvent;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/chat', function () {
    return view('chat');
});

Route::get('/timeEdningEvent', function(){
    event(new timeEdningEvent(
        )
    );
    return ["success"=>true];
});


Route::post('/diablemenu', function(Request $request){
    event(new disablemenuEvent(
        $request->input('menuid')
        )
    );
    return ["success"=>true];
});


Route::post('/enablemenu', function(Request $request){
    event(new enablemenuEvent(
        $request->input('menuid')
        )
    );
    return ["success"=>true];
});

Route::post('/serveAllEvent', function(Request $request){
    event(new serveAllEvent(
        $request->input('table')
        )
    );
    return ["success"=>true];
});

Route::post('/DeliverEvent', function(Request $request){
    event(new DeliverEvent(
        $request->input('menu_id'),
        $request->input('ticket'),
        $request->input('table')
        )
    );
    return ["success"=>true];
});

Route::post('/deliveryEvent', function(Request $request){
    event(new deliveryEvent(
        $request->input('menu_id'),
        $request->input('ticket')
        )
    );
    return ["success"=>true];
});

Route::post('/send-message', function(Request $request){
    event(new Message(
        $request->input('username'),
        $request->input('message')
        )
    );
    return ["success"=>true];
});

Route::post('/paymentEvent', function(Request $request){
    event(new PaymentEvent(
        $request->input('table_id'),
        $request->input('price'),
        $request->input('receive'),
        $request->input('change')
        )
    );
    return ["success"=>true];
});

Route::post('/create-ticket', function(Request $request){
    event(new CreateTicket(
        $request->input('table'),
        $request->input('ticket_status',),
        $request->input('user')
        )
    );
    return ["success"=>true];
});
Route::post('/confirmOrder', function(Request $request){
    event(new confirmOrderEvent(
        $request->input('order_id'),
        $request->input('table_id')

        )
    );
    return ["success"=>true];
});

Route::post('/readyOrder', function(Request $request){
    event(new readyOrderEvent(
        $request->input('table_id')
        )
    );
    return ["success"=>true];
});

Route::post('/create-order', function(Request $request){
    event(new CreateOrder(
        $request->input('table'),
        $request->input('menu_id'),
        $request->input('user_id'),
        $request->input('status_id'),
        $request->input('discount_id'),
        $request->input('quantity')
        )
    );
    return ["success"=>true];
});

Route::post('/unconfirmed', function(Request $request){
    event(new unconfirmedEvent(
        $request->input('unconfirmed'),
        )
    );
    return ["success"=>true];
});

Route::post('/timer', function(Request $request){
    event(new TimerEvent(
        // $request->input('timer'),
        )
    );
    return ["success"=>true];
});

Route::group(['middleware' => ['guest']], function () {
    //only guests can access these routes
    Route::get('/', function () {return view('auth.login');})->name('/');
    Route::get('/login', function () {return view('auth.login');})->name('login');

});


// Route::get('/waiter' , function () {
    //     return view('waiter.index');
    // });

    //for ajax

    Route::get('/admin/employee/employeeUsername', 'App\Http\Controllers\employeeController@employeeUsername');
    Route::get('/filtering/menuName', 'App\Http\Controllers\filtering@menuName');
    Route::get('/filtering/submenuName', 'App\Http\Controllers\filtering@submenuName');
    Route::get('/filtering/submenuNameedit', 'App\Http\Controllers\filtering@submenuNameedit');
    Route::get('/filtering/menuNameedit', 'App\Http\Controllers\filtering@menuNameedit');
    Route::get('/filtering/categoryName', 'App\Http\Controllers\filtering@categoryName');
    Route::get('/filtering/categoryNameedit', 'App\Http\Controllers\filtering@categoryNameedit');
    Route::get('/filtering/employeeUsername', 'App\Http\Controllers\filtering@employeeUsername');
    Route::get('/filtering/mindate1', 'App\Http\Controllers\filtering@mindateone');

    Route::get('//filtering/menucategoryedit', 'App\Http\Controllers\filtering@menucategoryz');
    Route::get('/filtering/menucategory', 'App\Http\Controllers\filtering@menucategory');
    Route::get('/login/checkacct', 'App\Http\Controllers\employeeController@verify');
    Route::get('/forgotpass/question1', 'App\Http\Controllers\passwordController@question1');
    Route::get('/forgotpass/question2', 'App\Http\Controllers\passwordController@question2');
    Route::get('/admin/category/name', 'App\Http\Controllers\categoryController@name');
    Route::get('/vieworder',[WaiterController::class,'vieworder']);
    Route::get('/discountappend',[WaiterController::class,'discountappend']);

    Route::get('/forgotpassword', 'App\Http\Controllers\passwordController@index');
    Route::post('/forgotpassword/check', 'App\Http\Controllers\passwordController@verify');
    Route::get('/changepassword', 'App\Http\Controllers\passwordController@changepass');
    Route::post('/changepassword/check', 'App\Http\Controllers\passwordController@checkchangepass');

    Route::get('/filtering/address', 'App\Http\Controllers\adminController@address');
    Route::get('/filtering/phonenumber', 'App\Http\Controllers\adminController@phonenumber');


    //reciept
    Route::get('/filtering/resibolist', 'App\Http\Controllers\filtering@reciept');
    Route::get('/filtering/resibolistsubtotal', 'App\Http\Controllers\filtering@recieptsubtotal');
    Route::get('/filtering/resibolistdiscount', 'App\Http\Controllers\filtering@recieptdiscount');
    Route::get('/filtering/ticketid', 'App\Http\Controllers\filtering@ticketid');
    Route::get('/filtering/recieptauth', 'App\Http\Controllers\filtering@recieptauth');






    ///////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Auth::routes([
        'login'    => true,
        'logout'   => true,
        'register' => false,
        'reset'    => false,   // for resetting passwords
        'confirm'  => true,  // for additional password confirmations
        'verify'   => false,  // for email verification
    ]);

    Route::group(['middleware' => 'auth'], function (){
        //account user settings
        Route::post('/settings/one', 'App\Http\Controllers\settingController@one');
        Route::post('/settings/two', 'App\Http\Controllers\settingController@two');
        Route::post('/settings/three', 'App\Http\Controllers\settingController@three');

        Route::get('/settings/{id}',    'App\Http\Controllers\accountController@index')->name('settings');
        Route::post('/settings/{id}',   'App\Http\Controllers\accountController@update');
        Route::get('/newuser',          'App\Http\Controllers\newaccountController@home');
        Route::POST('/newuser/{id}',    'App\Http\Controllers\newaccountController@save');
        //Admin Routes
        Route::group(['middleware' => ['App\Http\Middleware\adminMiddleware']], function() {
            Route::get('/admin/employee/archived', 'App\Http\Controllers\userArchived@archive');
            Route::post('/admin/employee/archived/{id}', 'App\Http\Controllers\userArchived@restore');
            Route::post('/admin/employee/reset/{id}', 'App\Http\Controllers\userArchived@reset');
            Route::post('/admin/employee/update/{id}', 'App\Http\Controllers\employeeController@update');
            Route::post('/admin/employee/create', 'App\Http\Controllers\employeeController@store');

            Route::post('/admin/table/removetable', 'App\Http\Controllers\tableController@delete');

            Route::get('/admin/menu/archived', 'App\Http\Controllers\menuArchived@archive');
            Route::post('/admin/menu/archived/{id}', 'App\Http\Controllers\menuArchived@restore');
            Route::post('/admin/menu/store', 'App\Http\Controllers\menuController@store');
            Route::post('/admin/menu/submenu', 'App\Http\Controllers\menuController@submenu');

            Route::post('/admin/category/store', 'App\Http\Controllers\categoryController@store');
            Route::get ('/admin/category/archived', 'App\Http\Controllers\categoryController@archived');
            Route::post('/admin/categ/restore/{id}', 'App\Http\Controllers\categoryController@restore');

            Route::get('/admin/bestseller', 'App\Http\Controllers\reportsController@backup');
            Route::get('/admin/sales', 'App\Http\Controllers\reportsController@sales');
            Route::get('/admin/menureports', 'App\Http\Controllers\reportsController@menu');
            Route::get('/admin/usersreports', 'App\Http\Controllers\reportsController@users');
            Route::get('/admin/bestsellerreports', 'App\Http\Controllers\reportsController@bestseller');

            Route::post('/admin/discount/stored', 'App\Http\Controllers\discountController@store');
            Route::get('/admin/discount/archived', 'App\Http\Controllers\discountController@archived');
            Route::post('/admin/discount/restore/{id}', 'App\Http\Controllers\discountController@restore');
            Route::get('/admin/discount/edit/{id}', 'App\Http\Controllers\discountController@update');

            Route::post('/admin/submenu/store', 'App\Http\Controllers\submenuController@store');
            Route::get('/admin/submenu/archived', 'App\Http\Controllers\submenuController@archived');
            Route::get('/admin/submenu/restore/{id}', 'App\Http\Controllers\submenuController@restore');





            Route::resource('/admin/category', 'App\Http\Controllers\categoryController');
            Route::resource('/admin/table', 'App\Http\Controllers\tableController');
            Route::resource('/admin/employee', 'App\Http\Controllers\employeeController');
            Route::resource('/admin/menu', 'App\Http\Controllers\menuController');
            Route::resource('/admin/discount', 'App\Http\Controllers\discountController');
            Route::resource('/admin/submenu', 'App\Http\Controllers\submenuController');
            Route::resource('/admin/system', 'App\Http\Controllers\systemsettingsController');
            Route::resource('/admin', 'App\Http\Controllers\adminController');
            Route::get('category/{id}',[menuController::class,'category']);

        });

//Cashier Routes
    Route::group(['middleware' => ['App\Http\Middleware\cashierMiddleware']], function() {
        Route::resource('/cashier', 'App\Http\Controllers\cashierController');
        //cashier disable enable menu
        Route::post('/cashier/disable/{id}', 'App\Http\Controllers\menuController@disablemenu');
        Route::post('/cashier/enable/{id}', 'App\Http\Controllers\menuController@enablemenu');

    });
//Waiter Routes
    Route::group(['middleware' => ['App\Http\Middleware\waiterMiddleware']], function() {
        Route::resource('/waiter', 'App\Http\Controllers\waiterController');
        Route::get('cartquanity/{id}',[WaiterController::class,'cartItem']);
        Route::get('waiter',[WaiterController::class,'index']);

    });
//Kitchen Routes
    Route::group(['middleware' => ['App\Http\Middleware\kitchenMiddleware']], function() {
        Route::resource('/kitchen', 'App\Http\Controllers\kitchenController');
        Route::post('/kitchen/disable/{id}', 'App\Http\Controllers\menuController@disablemenuk');
        Route::post('/kitchen/enable/{id}', 'App\Http\Controllers\menuController@enablemenuk');
    });
});
// Route::get('/home', [App\Http\Controllers\HomeController::class,

Route::get('cartquanity/{id}',[WaiterController::class,'cartItem']);
Route::post('cartcount/',[WaiterController::class,'cartcount']);

Route::get('cartquanity1/{id}',[WaiterController::class,'cartItem1']);
Route::get('cartEditQuantity/{ticket_id}{menu_id}',[WaiterController::class,'editCart']);
Route::get('cartgetMenu/',[WaiterController::class,'getMenuItem']);
Route::post('cancelMenu/',[WaiterController::class,'cancelMenu']);

Route::get('cartgetMenu1/',[WaiterController::class,'getMenuItemdelivery']);
Route::post('changeTOdelivered/',[WaiterController::class,'changeTOdelivered']);
Route::post('clearcart/',[WaiterController::class,'clearcart']);
Route::post('canselcartItem/',[WaiterController::class,'canselcartItem']);
Route::post('EditcartQuantity/',[WaiterController::class,'EditcartQuantity']);
Route::post('changeTOdeliveredKitchen/',[kitchenController::class,'changeTOdeliveredKitchen']);

Route::get('getCashierStatus/',[CashierController::class,'getCashierStatus']);
Route::get('timeEnding/',[CashierController::class,'timeEnding']);
Route::get('tableStatusIndicator/',[CashierController::class,'tableStatusIndicator']);
Route::post('EditCartCart/',[CashierController::class,'EditCartCart']);
Route::get('tableOrders/',[kitchenController::class,'tableOrders']);












