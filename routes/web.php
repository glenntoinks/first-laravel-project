<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use OpenAI\Laravel\Facades\OpenAI;

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

    // get all users / get a specific user
    // $users = DB::select('select * from users');

    // insert new user
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', ['Shower','scolegado@gmail.com','password']);

    // update user
    // $user = DB::update('update users set email=? where name=?',['scolegado@gmail.com','Shower']);

    // delete user
    // $user = DB::delete('delete from users where id=?',[2]);

    // query builder get all users
    // $users = DB::table('users')->where('id', 1)->get();

    // query builder insert a user
    // $user = DB::table('users')->insert([
    //     'name'      => 'Shower',
    //     'email'     => 'scolegado@gmail.com',
    //     'password'  => 'password',
    // ]);
    
    // query builder update a user
    // $user = DB::table('users')
    //     ->where('id', 3)
    //     ->update(['name' => 'May']);

    // query builder delete a user
    // $user = DB::table('users')->where('id', 3)->delete();

    // https://laravel.com/docs/10.x/eloquent#retrieving-models
    // user model get
    // $user = User::where('id', 1)->first();

    // user model create
    // $user = User::create([
    //     'name'      => 'Shower',
    //     'email'     => 'scolegado3@gmail.com',
    //     'password'  => 'password',
    // ]);

    // user model update
    // $user = User::where('id', 4)->update(['name' => 'May']);

    // user model find
    // $user = User::find(6);
    
    // user model delete
    // $user = User::where('id', 4)->delete();

    // dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('avatar.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// $result = OpenAI::chat()->create([
//     'model' => 'gpt-3.5-turbo',
//     'messages' => [
//         ['role' => 'user', 'content' => 'Hello!'],
//     ],
// ]);

// echo $result->choices[0]->message->content;