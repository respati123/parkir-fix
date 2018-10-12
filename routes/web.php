<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use App\User;
use App\Role;

Route::get('/login', function(){
   return view('login');
})->where('login', '[\/\w\.-]*')->name('login');

Route::get("checkSession", function(){

    $data = Session::get('is_login');
    return response()->json($data, 200);
});

Route::get("checkIsAdmin", "PermissionsController@checkIsAdmin");
Route::post("register", "Auth\RegisterController@register");

Route::get('/login/create', function(\Illuminate\Http\Request $request){
    $request->session()->put('is_login','login');
    return redirect("/");
})->name('login.create');

Route::get('/logout', function(\Illuminate\Http\Request $request){
    $request->session()->forget('is_login');
    return redirect('/login');
});

Route::get('/dashboard', function (){
   return view('welcome');
})->where('dashboard', '[\/\w\.-]*')->name('dashboard');

Route::get('/register/admin', function () {
    return view('register');
})->where('registeradmin', '[\/\w\.-]*')->name('registeradmin');


Route::group(['prefix' => '/','middleware' => ['isAdmin']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->where('admin', '[\/\w\.-]*')->name('admin');
    Route::group(['prefix'=>'roles', 'as' => 'roles.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('role', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('role-edit', '[\/\w\.-]*')->name('edit');
        Route::get('create', function(){
            return view('welcome');
        })->where('role-create', '[\/\w\.-]*')->name('create');
    });


    Route::group(['prefix'=>'permissions', 'as' => 'permissions.'], function(){
    Route::get('/', function(){
        return view('welcome');
    })->where('permission', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-permission', '[\/\w\.-]*')->name('edit');
    Route::get('/create', function(){
        return view('welcome');
    })->where('create-permission', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'listcustomer', 'as' => 'listcustomer.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-customers', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-list-customers', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-list-customers', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'loyalty', 'as' => 'loyalty.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-loyalty', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-list-loyalty', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-list-loyalty', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'location', 'as' => 'location.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-location', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-list-location', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-list-location', '[\/\w\.-]*')->name('create');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-categories', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-list-categories', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-list-categories', '[\/\w\.-]*')->name('create');
    });
    Route::group(['prefix' => 'classes', 'as' => 'classes.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-classes', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-list-classes', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-list-classes', '[\/\w\.-]*')->name('create');
    });
    Route::group(['prefix' => 'building', 'as' => 'building.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-building', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-list-building', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-list-building', '[\/\w\.-]*')->name('create');
    });
    Route::group(['prefix' => 'vehicletypes', 'as' => 'vehicletypes.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-vehicle-types', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-vehicle-types', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-vehicle-types', '[\/\w\.-]*')->name('create');
    });
    Route::group(['prefix' => 'vehiclebrands', 'as' => 'vehiclebrands.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-vehicle-brands', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-vehicle-brands', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-vehicle-brands', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'menus', 'as' => 'menus.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-menus', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-menus', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-menus', '[\/\w\.-]*')->name('create');
    });


    Route::group(['prefix' => 'tariff', 'as' => 'tariff.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-tariff', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-tariff', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-tariff', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-users', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-users', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-users', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'tariff', 'as' => 'tariff.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-tariff', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-tariff', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-tariff', '[\/\w\.-]*')->name('create');
    });

    Route::group(['prefix' => 'voucher', 'as' => 'voucher.'], function(){
        Route::get('/', function(){
            return view('welcome');
        })->where('list-voucher', '[\/\w\.-]*')->name('index');
        Route::get('/edit/{id}', function(){
            return view('welcome');
        })->where('edit-voucher', '[\/\w\.-]*')->name('edit');
        Route::get('/create', function(){
            return view('welcome');
        })->where('create-voucher', '[\/\w\.-]*')->name('create');
    });


});


Route::get('/delete', function(){

    $roles = \App\Role::find(20);

    $roles->permission()->detach([14]);
    return 'sukses';
});

