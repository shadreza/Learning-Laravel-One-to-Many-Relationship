<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------
|
*/


// inserting user [create]
Route::get('create-user/{name}', function ($name) {
    $user = new User(['name' => $name, 'email' => $name . '@gmail.com', 'password' => bcrypt('123412')]);
    return $user->save();
});


// inserting post [create]
Route::get('create-post/{user_id}/{post_name}', function ($user_id, $post_name) {
    $user = User::findOrFail($user_id);
    $user->posts()->save(new Post(['title' => $post_name, 'body' => $post_name . " many more to come"]));
});
