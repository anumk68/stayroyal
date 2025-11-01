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
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\admin\BulkDeleteController;
use App\Http\Controllers\admin\FAQController;
use App\Http\Controllers\admin\RoomCategoryController;

////////////////      website routes    /////////////////////

Route::get('/optimize-clear', function() {
    Artisan::call('optimize:clear');
    return "<h3 style='color:green;'>✅ All caches cleared successfully!</h3>";
});

Route::get('/landing', function () {
    return view('website.landing'); // resources/views/about.blade.php
});
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/blogs', [UserController::class, 'view_blogs'])->name('blogs');
Route::get('/blogs/{slug}', [BlogsController::class, 'blog_details'])->name('blog.details');
Route::get('/contact-us', [UserController::class, 'view_contact_detail'])->name('contacts');
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

Route::get('/user-login', [Indexcontroller::class, 'frontlogin'])->name('user.login');
Route::get('/user-register', [Indexcontroller::class, 'frontregister'])->name('user.register');



Route::middleware('auth')->group(function () {

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

//=====================================Room Category========================================//
Route::get('/room-cateogry', [RoomCategoryController::class, 'room_category'])->name('room-cateogry');
Route::post('/submitRoomCategory', [RoomCategoryController::class, 'room_category_save'])->name('room_category.store');
Route::get('/roomCategory/delete/{id}', [RoomCategoryController::class, 'roomCategory_delete'])->name('roomCategory.delete');
Route::post('/room-category/bulk-delete', [RoomCategoryController::class, 'roomCategoryBulkDelete'])->name('roomCategory.bulkDelete');

///////////////////////////      Room Type   ////////////////////
Route::get('/adminroomtype', [RoomsController::class, 'view_room_type'])->name('adminroomtype');
Route::post('admin/roomtype/update', [RoomsController::class, 'roopmtypeupdate'])->name('room_type.update');

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

Route::get('/blog/create', [BlogsController::class, 'blogcreate'])->name('blogs.create');
Route::post('/blogs', [BlogsController::class, 'blogstore'])->name('blogs.store');
Route::get('/blogedit/{id}', [BlogsController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogsController::class, 'blogupdate'])->name('blogs.update');
Route::get('/blogdelete/{id}', [BlogsController::class, 'blogdestroy'])->name('blogs.destroy');

//////////////////////////   Enquery ////////////////////////////
Route::get('/adminenquery', [EnquiryController::class, 'customer_enquery'])->name('adminenquery');
Route::get('/enquirydelete/{id}', [EnquiryController::class, 'enquiry_delete'])->name('enquirydelete');


//////////////////////      Review Section  /////////////////////
Route::get('/adminreview', [UsersController::class, 'customer_review'])->name('adminreview');

/////////////////////        Payment Section  //////////////////////
Route::get('/adminpayment', [UsersController::class, 'customer_payment'])->name('adminpayment');
Route::get('/paymentdelete/{id}', [UsersController::class, 'payment_delete'])->name('paymentdelete');
Route::post('/admin-logout', [Indexcontroller::class, 'logout'])->name('admin.logout');

// bulk delete
Route::post('/room/bulk-delete', [BulkDeleteController::class, 'roombulkDelete'])->name('room.bulkDelete');
Route::post('/room-type/bulk-delete', [BulkDeleteController::class, 'roomtype_bulkDelete'])->name('roomtype.bulkDelete');
Route::post('/room-booking/bulk-delete', [BulkDeleteController::class, 'roombooking_bulkDelete'])->name('roombooking.bulkDelete');
Route::post('/room-offer/bulk-delete', [BulkDeleteController::class, 'offer_bulkDelete'])->name('offer.bulkDelete');
Route::post('/blogcategory-bulkDelete', [BulkDeleteController::class, 'blogcategory_bulkDelete'])->name('blogcategory.bulkDelete');
Route::post('/blog-bulkDelete', [BulkDeleteController::class, 'blog_bulkDelete'])->name('blog.bulkDelete');
Route::post('/customer-enquiry-bulkDelete', [BulkDeleteController::class, 'customer_inquery_bulkDelete'])->name('customer_inquery.bulkDelete');
Route::post('/meta-tag-bulkDelete', [BulkDeleteController::class, 'metatag_bulkDelete'])->name('metatag.bulkDelete');
Route::post('/payment-history-bulkDelete', [BulkDeleteController::class, 'payment_history_bulkDelete'])->name('payment_history.bulkDelete');
Route::post('/review-bulkDelete', [BulkDeleteController::class, 'review_bulkDelete'])->name('review.bulkDelete');

   Route::resource('faq', FAQController::class);
//end bulk delete
 });

 Route::get('/admin-login', [AuthController::class, 'login'])->name('login');
Route::post('/admin-login-submit', [AuthController::class, 'login_submit'])->name('login.submit');
Route::get('/admin-login-otp-verify', [AuthController::class, 'admin_login_otp_verify_page'])->name('admin.login.otp.verify.page');
Route::post('/admin-login-otp-verify', [AuthController::class, 'admin_login_otp_verify'])->name('admin.login.otp.verify');

Route::get('/admin-register', [AuthController::class, 'register'])->name('admin.register');
Route::post('/admin-register-store', [AuthController::class, 'register_store'])->name('register.store');
Route::get('/admin-verify-otp', [AuthController::class, 'showOtpForm'])->name('admin.verify.otp.page');
Route::post('/admin-verify-otp', [AuthController::class, 'verifyOtp'])->name('admin.verify.otp.submit');

Route::get('/admin-reset-password', [AuthController::class, 'resetsendotpform'])->name('password.reset');
Route::post('/admin-password-email', [AuthController::class, 'sendResetOtp'])->name('password.email.submit');
Route::get('/admin-password-otp', [AuthController::class, 'reset_showOtpForm'])->name('password.otp.verify.page');
Route::post('/admin-password-otp', [AuthController::class, 'verifyResetOtp'])->name('password.otp.verify');
Route::get('/admin-password-reset', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/admin-password-reset-submit', [AuthController::class, 'submitReset'])->name('password.reset.submit');
Route::get('/{slug}/{offer_id?}', [RoomController::class, 'room_detail'])->name('roomdetails');


Route::get('/room/2bhk-luxury-villa-ground-floor/8', function () {
    return redirect('ground-floor-2bhk', 301);
});
Route::get('/room/4bhk-luxury-villa-complete-villa/7', function () {
    return redirect('complete-villa-4bhk', 301);
});
Route::get('/room/4bhk-luxury-villa-complete-villa/4', function () {
    return redirect('complete-villa-4bhk', 301);
});
Route::get('/room/2bhk-luxury-villa-1st-floor/9', function () {
    return redirect('first-floor-2bhk', 301);
});
Route::get('/room/2bhk-luxury-villa-ground-floor/5', function () {
    return redirect('ground-floor-2bhk', 301);
});
Route::get('/room/2bhk-luxury-villa-1st-floor/3', function () {
    return redirect('first-floor-2bhk', 301);
});
Route::get('/room/This slug of blog is form testing purpose/3', function () {
    return redirect('blogs', 301);
});
Route::get('/room/2bhk-luxury-villa-1st-floor/6', function () {
    return redirect('first-floor-2bhk', 301);
});
Route::get('/room/4bhk-luxury-villa-complete-villa/10', function () {
    return redirect('complete-villa-4bhk', 301);
});
Route::get('/room/2bhk-luxury-villa-ground-floor/2', function () {
    return redirect('ground-floor-2bhk', 301);
});
Route::get('/contact.html', function () {
    return redirect('contact-us', 301);
});

Route::get('/landing-4.html', function () {
    return redirect('', 301);
});
Route::get('/landing-6.html', function () {
    return redirect('', 301);
});
Route::get('/landing-5.html', function () {
    return redirect('', 301);
});
Route::get('/service.html', function () {
    return redirect('', 301);
});
Route::get('/room-details', function () {
    return redirect('rooms', 301);
});
Route::get('/find-room.html', function () {
    return redirect('/', 301);
});
Route::get('/index-5.html', function () {
    return redirect('/', 301);
});
Route::get('/landing.html', function () {
    return redirect('/', 301);
});
Route::get('/landing-3.html', function () {
    return redirect('/', 301);
});
Route::get('/team.html', function () {
    return redirect('/', 301);
});
Route::get('/rtl.html', function () {
    return redirect('/', 301);
});
Route::get('/blog-details.html', function () {
    return redirect('/', 301);
});
Route::get('/index-3.html', function () {
    return redirect('/', 301);
});
Route::get('/index-2.html', function () {
    return redirect('/', 301);
});
Route::get('/services-details.html', function () {
    return redirect('/', 301);
});
Route::get('/services-details.html', function () {
    return redirect('/', 301);
});
Route::get('/index-4.html', function () {
    return redirect('/', 301);
});
Route::get('/pricing.html', function () {
    return redirect('/', 301);
});
Route::get('/blog-details', function () {
    return redirect('blogs', 301);
});
Route::get('/pricing.html', function () {
    return redirect('/', 301);
});
Route::get('/room-details.html', function () {
    return redirect('/', 301);
});
Route::get('/roomdetails/2', function () {
    return redirect('rooms', 301);
});
Route::get('/roomdetails/1', function () {
    return redirect('rooms', 301);
});
Route::get('/contacts', function () {
    return redirect('contact-us', 301);
});
Route::get('/about', function () {
    return redirect('about-us', 301);
});
Route::get('/family-suite-room.html', function () {
    return redirect('rooms', 301);
});
Route::get('/family-suite-room.html', function () {
    return redirect('rooms', 301);
});
Route::get('/delux-rooms.html', function () {
    return redirect('rooms', 301);
});
Route::get('/refund-policy.html', function () {
    return redirect('policy', 301);
});
Route::get('/double-suite-rooms.html', function () {
    return redirect('rooms', 301);
});
Route::get('/blog.html', function () {
    return redirect('blogs', 301);
});
Route::get('/junior-suite-rooms.html', function () {
    return redirect('rooms', 301);
});
Route::get('/room.html', function () {
    return redirect('rooms', 301);
});
Route::get('/roomdetails/12', function () {
    return redirect('rooms', 301);
});
Route::get('/index.html', function () {
    return redirect('/', 301);
});
Route::get('/landing-2.html', function () {
    return redirect('/', 301);
});
Route::get('/luxury-villa.html', function () {
    return redirect('/', 301);
});
Route::get('/index-6.html', function () {
    return redirect('/', 301);
});
Route::get('/2bhk-luxury-villa-1st-floor', function () {
    return redirect('first-floor-2bhk', 301);
});
Route::get('/2bhk-luxury-villa-ground-floor', function () {
    return redirect('ground-floor-2bhk', 301);
});
Route::get('/4bhk-luxury-villa-complete-villa', function () {
    return redirect('complete-villa-4bhk', 301);
});
Route::get('/roomdetails/3', function () {
    return redirect('rooms', 301);
});
Route::get('/roomdetails/14', function () {
    return redirect('rooms', 301);
});
Route::get('/roomdetails/15', function () {
    return redirect('rooms', 301);
});