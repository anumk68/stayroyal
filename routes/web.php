<?php

use App\Http\Middleware\AdminAuthenticate;
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
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\UsersController;


////////////////      website routes    /////////////////////
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/about', [AboutController::class, 'index'])->name('about');


//////////////////      rooms booking   //////////////////
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/online/booking', [RoomController::class, 'show'])->name('online.booking');
Route::get('/roomdetails/{id}', [RoomController::class, 'room_detail'])->name('roomdetails');
Route::post('/booking/review', [RoomController::class, 'booking_review'])->name('booking.review');
Route::post('/user/details', [RoomController::class, 'user_details'])->name('user.details');
Route::get('/user/form/{id}', [RoomController::class, 'show_user_form'])->name('user.form');
Route::post('/user/register', [RoomController::class, 'user_register'])->name('user.register');
Route::post('/user/login', [RoomController::class, 'user_login'])->name('user.login');
Route::get('/payment', [RoomController::class, 'payment'])->name('payment');
Route::post('/booking', [RoomController::class, 'booking'])->name('booking');

////////////////////     About Us section  //////////////
Route::get('/policy', [AboutController::class, 'show_privacy_policy'])->name('policy');
Route::get('/refund', [AboutController::class, 'show_refund_policy'])->name('refund');


/////////////////////        User section     ///////////////////////
Route::post('/user-enquery', [UserController::class, 'user_enquery'])->name('user.enquery');
Route::post('/user-subscribe', [UserController::class, 'user_subscribe'])->name('user.subscribe');






///////////////        Admin routes   /////////////////////////
Route::get('/login', [Indexcontroller::class, 'login'])->name('login');
Route::get('/admin/login', [Indexcontroller::class, 'login'])->name('admin.login');
Route::post('/login/submit', [Indexcontroller::class, 'login_submit'])->name('login.submit');
Route::post('/admin/logout', [Indexcontroller::class, 'logout'])->name('admin.logout');


Route::middleware('auth:admin')->group(function () {

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


///////////////////////////      Room Type   ////////////////////
Route::get('/adminroomtype', [Roomscontroller::class, 'view_room_type'])->name('adminroomtype');
Route::post('/submit-roomtype', [Roomscontroller::class, 'room_type'])->name('room_type.store');
Route::get('/roomtype/delete/{id}', [Roomscontroller::class, 'roomtype_delete'])->name('roomtype.delete');




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
Route::get('/adminenquery', [EnquiryController::class, 'customer_enquery'])->name('adminenquery');
Route::get('/enquirydelete/{id}', [EnquiryController::class, 'enquiry_delete'])->name('enquirydelete');


//////////////////////      Review Section  /////////////////////
Route::get('/adminreview', [UsersController::class, 'customer_review'])->name('adminreview');

/////////////////////        Payment Section  //////////////////////
Route::get('/adminpayment', [UsersController::class, 'customer_payment'])->name('adminpayment');
Route::get('/paymentdelete/{id}', [UsersController::class, 'payment_delete'])->name('paymentdelete');

 });