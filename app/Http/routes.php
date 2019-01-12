<?php

use App\Role;
use App\user;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('create', function(){

  $user = User::find(1);

  $role = new Role(['name'=>'adminstrator']);

  $user->roles()->save($role);

});



Route::get('read', function(){

   $user = User::find(1);

   foreach ($user->roles as $role) {
   	
   	echo $role->name;
   }

});




Route::get('update',function(){


	$user = User::find(1);
    
    
     if ($user->has('roles')) {

   	  foreach ($user->roles as $role) {
       
        if ($role->name ="admin") {
       	     	
	       $role->name = "adminstrator";

	       $role->save();
        }

     }

   }

});





Route::get('delete', function(){

	$user = User::find(1);

    foreach ($user->roles as $role) {
    	

    	$role->where('id','=',1)->delete();

    }

});









