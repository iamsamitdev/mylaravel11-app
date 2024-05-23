<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// เรียกใช้งาน Controller ชื่อ HomeController ที่อยู่ในโฟลเดอร์ app/Http/Controllers

// Solution 1
// Route::get('/', 'App\Http\Controllers\HomeController@showprofile');

// Solution 2
Route::get('/', [HomeController::class, 'showprofile']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Basic Route
// Route::get('/', function() {
//     return 'Hello World';
// });

Route::get('about', function() {
    return 'My about page';
});

// Route with parameter
// http://localhost:8000/user/1
Route::get('user/{id}', function($id) {
    return 'User: ' . $id;
});

// http://localhost:8000/posts/1/comments/2
Route::get('posts/{post}/comments/{comment}', function ($postID, $commentID) {
    return 'Post:' . $postID . '<br>Comment:' . $commentID;
});

// Optional parameter
// http://localhost:8000/member/John
Route::get('member/{name?}', function ($name = null) {
    return 'Hello ' . $name;
});

// Regular Expression Constraints
// http://localhost:8000/group/123
Route::get('group/{id}',function($id){
    return $id;
})->where('id','[0-9]+');

// Named Routes
// http://localhost:8000/guest/showroom/data/John
Route::get('guest/showroom/data/{name?}',function($name=null){
    return'Hello '.$name;
})->name('guestprofile');

// Route post,put,delete
// http://localhost:8000/user/profile
// method: POST
Route::post('user/profile',function(){
    return 'POST';
});

// http://localhost:8000/user/profile
// method: PUT
Route::put('user/profile',function(){
    return 'PUT';
});

// http://localhost:8000/user/profile
// method: DELETE
Route::delete('user/profile',function(){
    return'DELETE';
});