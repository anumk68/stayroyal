<?php

use App\Http\Middleware\AdminAuthenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\RoomController;
use App\Http\Controllers\website\UserController;
use App\Http\Controllers\admin\Indexcontroller;
use App\Http\Controllers\admin\RoomsController;
use App\Http\Controllers\admin\BlogsController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\OfferController;

////////////////      website routes    /////////////////////

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/blogs', [UserController::class, 'view_blogs'])->name('blogs');
Route::get('/contacts-us', [UserController::class, 'view_contact_detail'])->name('contacts');
Route::get('/about-us', [UserController::class, 'view_about_us'])->name('about');
Route::get('/terms-conditions', [UserController::class, 'termsconditions'])->name('termsconditions');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::post('/account/update', [UserController::class, 'accountupdate'])->name('account.update');
Route::get('/404-error', [UserController::class, 'errrorpage'])->name('errrorpage');

//////////////////      rooms booking   //////////////////

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/online-booking', [RoomController::class, 'show'])->name('online.booking');

Route::post('/booking-review', [RoomController::class, 'booking_review'])->name('booking.review');
Route::post('/user/details/{room}', [RoomController::class, 'user_details'])->name('user.details');

Route::get('/user-form/{id}', [RoomController::class, 'show_user_form'])->name('user.form');
Route::post('/register', [RoomController::class, 'user_register'])->name('frontuser.register');
Route::post('/user-login', [RoomController::class, 'user_login'])->name('user.login');
Route::get('/payment', [RoomController::class, 'payment'])->name('payment');
Route::post('/booking', [RoomController::class, 'booking'])->name('booking');

Route::post('/payment/response', [RoomController::class, 'paymentResponse'])->name('payment.response');
Route::post('/ccavenue/response', [RoomController::class, 'ccavenueResponse'])->name('ccavenue.response');



////////////////////   About Us section  //////////////
Route::get('/policy', [UserController::class, 'show_privacy_policy'])->name('policy');
Route::get('/refund', [UserController::class, 'show_refund_policy'])->name('refund');


/////////////////////   User section     ///////////////////////
Route::post('/enquiry', [UsersController::class, 'enquery'])->name('user.enquery');
Route::post('/subscribe', [UsersController::class, 'subscribe'])->name('user.subscribe');


////////////////////             User Profile      //////////////////
Route::middleware('auth')->group(function () {
    Route::get('/user-booking', [UserController::class, 'user_booking'])->name('user.booking');
    Route::get('/booking-download/{id}', [UserController::class, 'download_booking_details'])->name('booking.download');
    Route::get('/user-profile', [UserController::class, 'user_profile'])->name('user.profile');
    Route::post('/update-profile', [UserController::class, 'update_profile'])->name('update.user.profile');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Route::post('/payment', [UserController::class, 'initiatePayment'])->name('payment.initiate');
// Route::post('/payment/response', [UserController::class, 'paymentResponse'])->name('payment.response');

});


///////////////        Admin routes   /////////////////////////
Route::get('/login', [Indexcontroller::class, 'login'])->name('login');
Route::get('/admin/login', [Indexcontroller::class, 'login'])->name('admin.login');
Route::post('/login-submit', [Indexcontroller::class, 'login_submit'])->name('login.submit');
Route::get('/user-login', [Indexcontroller::class, 'frontlogin'])->name('user.login');
Route::get('/user-register', [Indexcontroller::class, 'frontregister'])->name('user.register');



// Route::middleware('auth:admin')->group(function () {

Route::get('/dashboard', [Indexcontroller::class, 'adminindex'])->name('dashboard');
Route::get('/setting', [Indexcontroller::class, 'meta_setting'])->name('setting');
Route::post('/submit-metatag', [Indexcontroller::class, 'metatag_store'])->name('metatag.store');
Route::get('/metatag-edit/{id}', [Indexcontroller::class, 'metatag_edit'])->name('metatag.edit');
Route::post('/metatag-update/{id}', [Indexcontroller::class, 'metatag_update'])->name('metatag.update');
Route::delete('/metatag/{id}', [Indexcontroller::class, 'metadestroy'])->name('metatag.destroy');


////////////////////////////   Room booking and room section    //////////////////////////
Route::get('/bookinglist', [RoomsController::class, 'view_booking_list'])->name('bookinglist');
Route::get('/bookingdelete/{id}', [RoomsController::class, 'booking_delete'])->name('bookingdelete');
Route::get('/room_booking_search', [RoomsController::class, 'room_booking_search'])->name('room_booking_search');


Route::get('/adminroom', [RoomsController::class, 'view_rooms'])->name('adminroom');
Route::get('/roomdelete/{id}', [RoomsController::class, 'room_delete'])->name('roomdelete');
Route::post('/submit-room', [RoomsController::class, 'store'])->name('room.store');
Route::get('/roomedit/{id}', [RoomsController::class, 'edit'])->name('roomedit');
Route::post('/room-update', [RoomsController::class, 'room_edit'])->name('room.update');
Route::get('/room_search', [RoomsController::class, 'room_search'])->name('room_search');

// Route::get('/rooms/add', [RoomsController::class, 'add_rooms'])->name('rooms.add');


///////////////////////////      Room Type   ////////////////////
Route::get('/adminroomtype', [RoomsController::class, 'view_room_type'])->name('adminroomtype');
Route::post('/submit-roomtype', [RoomsController::class, 'room_type'])->name('room_type.store');
Route::get('/roomtype/delete/{id}', [RoomsController::class, 'roomtype_delete'])->name('roomtype.delete');

//offers routes
Route::get('offers', [OfferController::class, 'index'])->name('admin.offers.index');
Route::get('offers/create', [OfferController::class, 'create'])->name('admin.offers.create');
Route::post('offers/store', [OfferController::class, 'store'])->name('admin.offers.store');
Route::get('/offers/edit/{id}', [OfferController::class, 'edit'])->name('admin.offers.edit');
Route::post('/offers/update/{id}', [OfferController::class, 'update'])->name('admin.offers.update');
Route::get('offers/delete/{id}', [OfferController::class, 'destroy'])->name('admin.offers.delete');


///////////////////      Blogs and blog category section   ///////////////////////
Route::get('/adminblogs', [BlogsController::class, 'view_blogs'])->name('blogs.index');

Route::get('/blogscategory', [BlogsController::class, 'view_category'])->name('blogscategory');
Route::get('/category-delete/{id}', [BlogsController::class, 'category_delete'])->name('category.delete');
Route::post('/submit-category', [BlogsController::class, 'category_store'])->name('blog_category.store');



Route::get('/blogs/create', [BlogsController::class, 'blogcreate'])->name('blogs.create');
Route::post('/blogs', [BlogsController::class, 'blogstore'])->name('blogs.store');
Route::get('/blogedit/{id}', [BlogsController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogsController::class, 'blogupdate'])->name('blogs.update');
Route::get('/blogdelete/{id}', [BlogsController::class, 'blogdestroy'])->name('blogs.destroy');
Route::get('/blog-details/{slug}', [BlogsController::class, 'blog_details'])->name('blog.details');

//////////////////////////   Enquery ////////////////////////////
Route::get('/adminenquery', [EnquiryController::class, 'customer_enquery'])->name('adminenquery');
Route::get('/enquirydelete/{id}', [EnquiryController::class, 'enquiry_delete'])->name('enquirydelete');


//////////////////////      Review Section  /////////////////////
Route::get('/adminreview', [UsersController::class, 'customer_review'])->name('adminreview');

/////////////////////        Payment Section  //////////////////////
Route::get('/adminpayment', [UsersController::class, 'customer_payment'])->name('adminpayment');
Route::get('/paymentdelete/{id}', [UsersController::class, 'payment_delete'])->name('paymentdelete');



Route::post('/admin-logout', [Indexcontroller::class, 'logout'])->name('admin.logout');
//  });
Route::get('/{slug}/{offer_id?}', [RoomController::class, 'room_detail'])->name('roomdetails');
