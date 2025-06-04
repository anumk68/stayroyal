<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\BlogController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\RoomController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\UserController;

use App\Http\Controllers\admin\Indexcontroller;
use App\Http\Controllers\admin\Roomscontroller;
use App\Http\Controllers\admin\Blogscontroller;

////////////////      website routes    /////////////////////
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/about', [AboutController::class, 'index'])->name('about');


//////////////////      rooms booking   //////////////////
Route::get('/online/booking', [RoomController::class, 'show'])->name('online.booking');
Route::get('/roomdetails/{id}', [RoomController::class, 'room_detail'])->name('roomdetails');

////////////////////     About Us section  //////////////
Route::get('/policy', [AboutController::class, 'show_privacy_policy'])->name('policy');
Route::get('/refund', [AboutController::class, 'show_refund_policy'])->name('refund');


/////////////////////        User section     ///////////////////////
Route::post('/user-enquery', [UserController::class, 'user_enquery'])->name('user.enquery');







///////////////        Admin routes   /////////////////////////
Route::get('/dashboard', [Indexcontroller::class, 'index'])->name('dashboard');
Route::get('/setting', [Indexcontroller::class, 'meta_setting'])->name('setting');
Route::post('/submit-metatag', [Indexcontroller::class, 'metatag_store'])->name('metatag.store');

////////////////////////////   Room booking and room section    //////////////////////////
Route::get('/bookinglist', [Roomscontroller::class, 'view_booking_list'])->name('bookinglist');
Route::get('/bookingdelete/{id}', [Roomscontroller::class, 'booking_delete'])->name('bookingdelete');
Route::get('/adminroom', [Roomscontroller::class, 'view_rooms'])->name('adminroom');
Route::get('/roomdelete/{id}', [Roomscontroller::class, 'room_delete'])->name('roomdelete');
Route::post('/submit-room', [RoomsController::class, 'store'])->name('room.store');
Route::get('/roomedit/{id}', [RoomsController::class, 'edit'])->name('roomedit');
Route::post('/room/update', [RoomsController::class, 'room_edit'])->name('room.update');
// Route::get('/rooms/add', [Roomscontroller::class, 'add_rooms'])->name('rooms.add');

///////////////////      Blogs and blog category section   ///////////////////////
Route::get('/adminblogs', [Blogscontroller::class, 'view_blogs'])->name('adminblogs');
Route::post('/submit-blog', [Blogscontroller::class, 'Blog_store'])->name('blog.store');
Route::get('/blogdelete/{id}', [Blogscontroller::class, 'blog_delete'])->name('blogdelete');
Route::get('/blogscategory', [Blogscontroller::class, 'view_category'])->name('blogscategory');
Route::get('/category/delete/{id}', [Blogscontroller::class, 'category_delete'])->name('category.delete');
Route::post('/submit-category', [Blogscontroller::class, 'category_store'])->name('blog_category.store');
Route::get('/blogedit/{id}', [Blogscontroller::class, 'blog_edit'])->name('blogedit');
Route::post('/blog/update', [Blogscontroller::class, 'blog_update'])->name('blog.update');



//////////////////////////   Enquery ////////////////////////////
Route::get('/adminenquery', [Indexcontroller::class, 'customer_enquery'])->name('adminenquery');



