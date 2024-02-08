<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\basic;
use App\Http\Controllers\memberController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\resource_controller;
use App\Http\Controllers\RegisterController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/',function(){
//     return view('layout.home');
// });

// Route::get('/about',function(){
//     return view('layout.about');
// });

// Route::get('/{name?}',function($name=null){
//     // echo "Welcome to " .$name.'<br>';
//     // echo $id;
//      $title = "<h2>Laravel</h2>";
//     $data = compact('name','title');
//     return view('demo')->with($data);
// });

Route::middleware(['guard'])->group(function(){
//call route using controller
 Route::get('/',[basic::class,'homePage']);
// Route::get('/about',SingleActionController::class);
// Route::resource('/resource',resource_controller::class);

//crud opration
Route::get('/customer',[RegisterController::class,'view']);
Route::get('/customer/delete/{id}',[RegisterController::class,'delete'] )->name('customer.delete');
Route::get('/customer/force_delete/{id}',[RegisterController::class,'force_delete'] )->name('customer.force_delete');
Route::get('/customer/edit/{id}',[RegisterController::class,'edit'])->name('customer.edit');
Route::get('/customer/register',[RegisterController::class,'index'])->name('customer.register');
Route::post('/customer/register',[RegisterController::class,'register']);
Route::get('/customer/restore/{id}',[RegisterController::class,'restore'])->name('customer.restore');
Route::get('/customer/trash_customer',[RegisterController::class,'trash']);
Route::post('/customer/update/{id}',[RegisterController::class,'update'])->name('customer.update');
});
//handle session
Route::get('get_session',function(){
    $data = session()->all();
    print_data($data);
});

Route::get('set_session',function(Request $request){
     $request->session()->put('first_name','kalu');
     $request->session()->put('last_name','magan');
     //$request->session()->flash('last_name','magan');
     return redirect('get_session');
});

Route::get('/login',function(){
   session()->put('user_id','1');
   echo 'logged in ';
});

Route::get('/log-out',function(){
    session()->forget('user_id');
    echo 'logged out';
});

Route::get('/no-access',function(){
    echo 'no-access';
});


Route::get('distroy_session',function(){
    session()->flush();
    return redirect('get_session');
});

//localization(change language)
Route::get('/{lang?}',function($lang=null){
    App::setlocale($lang);
    return view('layout.home');
});


//one to one relationship
Route::get('customer/data/{id}',[memberController::class,'group2']);