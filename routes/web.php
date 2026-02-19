<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Courses As CoursesFront;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\Admin\ContactUs;
use App\Http\Controllers\Admin\Cms;
use App\Http\Controllers\Admin\Banner;
use App\Http\Controllers\Admin\HomeContent;
use App\Http\Controllers\Admin\StoryContent;
use App\Http\Controllers\Admin\Products;
use App\Http\Controllers\Admin\Customers;
use App\Http\Controllers\Admin\CocktailClub;
use App\Http\Controllers\Admin\Cocktails;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Member;
use App\Http\Controllers\Test;

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

/* Route::get('/', function () {
    return view('home');
}); */
Route::get('/404', function () {
    return view('errors/404');
});
Route::get('new-checkout', [Shop::class,'new_checkout']);

Route::match(['get','post'], 'age-verify', [Home::class,'age_verify']);
Route::match(['get','post'], 'preorder-payment/{token}', [Shop::class,'preorder_payment']);
Route::post('create-paypal-order', [Shop::class,'createPaypalOrder']);
Route::post('capture-paypal-order', [Shop::class,'capturePaypalOrder']);
Route::get('payment-success', [Home::class,'payment_success']); // for thank you page

Route::middleware(['AgeVerify'])->group(function () {
    Route::get('/', [Home::class,'index']);
    Route::get('our-vodka', [Home::class,'our_vodka']);
    Route::get('our-vodka/{id}', [Home::class,'product_details']);
    Route::get('story', [Home::class,'story']);
    Route::get('cocktails', [Home::class,'cocktails']);
    Route::get('cocktails/{id}', [Home::class,'cocktails_details']);
    Route::match(['get','post'],'cocktail-creation', [Home::class,'cocktail_creation']);
    Route::get('cocktails-club', [Home::class,'cocktails_club']);
    Route::get('checkout', [Shop::class,'checkout']);
    Route::match(['get','post'],'update-cart-qty', [Shop::class,'updateQty']);
    Route::get('get-cart-amount', [Shop::class,'get_cart_amount']);

    Route::middleware(['MemberAuth'])->group(function () {
        //smart paypal
        Route::post('save-address', [Shop::class,'save_address']);
        Route::post('checkout', [Shop::class,'checkout']);
        
        // end
        // Route::get('product-payment-success', [Shop::class,'product_payment_success']); // for data update
        // Route::get('payment-cancel', [Home::class,'payment_cancel']);
        Route::get('member-dashboard', [Member::class,'dashboard']);
        Route::match(['get','post'], 'member-orders', [Member::class,'orders']);
        Route::match(['get','post'],'member-addresses', [Member::class,'addresses']);
        Route::match(['get','post'],'member-addresses/{id}', [Member::class,'addresses']);
        Route::match(['get','post'],'member-deladdress/{id}', [Member::class,'delete_address']);
        Route::match(['get','post'],'member-profile', [Member::class,'profile']);
        Route::match(['get','post'],'member-changepassword', [Member::class,'change_password']);

        Route::get('member-logout', [Member::class,'logout']);
    });

    Route::middleware(['AlreadyloggedMember'])->group(function () {
        Route::match(['get','post'],'member-login', [Member::class,'login']);
        Route::match(['get','post'],'member-register', [Member::class,'register']);
        Route::match(['get','post'],'forgot-password', [Member::class, 'forgot_password'])->name('forgot.password');
        Route::match(['get','post'],'reset-password/{token}', [Member::class, 'reset_password']);
    });
});
Route::get('faq', [Home::class,'faq']);
Route::get('contact', [Home::class,'contact']);
Route::match(['get','post'],'save_contact_us', [Home::class,'save_contact_us']);
Route::get('thank-you', [Home::class,'thank_you']);
Route::match(['get','post'],'add_to_cart', [Shop::class,'add_to_cart']);
Route::match(['get','post'],'remove-item/{id}', [Shop::class,'remove_item']);
Route::get('book48', [Test::class,'book48']);
/************************END OF DEVIL***************** */
// *************************Testing url********************************
// test1


Route::get('paypal_pay_pop', [Shop::class,'paypal_pay_pop']);
Route::get('/api/get-order', [Shop::class,'createOrder1']);
Route::post('/api/save-payment', [Shop::class, 'savePayment']);
Route::post('/api/set_cart', [Shop::class, 'set_cart']);

//test2
Route::get('card_checkout', [Shop::class,'card_checkout']);
Route::match(['get','post'], 'paypal-create-order', [Shop::class,'createOrder']);
Route::match(['get','post'], 'paypal-capture-order', [Shop::class,'captureOrder']);

//paypal testing
Route::get('paypal_pay', [Shop::class,'paypal_pay']);
Route::get('paypal-success', [Shop::class, 'paypal_success']);
Route::get('paypal-cancel', [Shop::class, 'paypal_cancel']);
Route::get('paypal-notify', [Shop::class, 'paypal_notify']);

Route::get('testcart', [Shop::class,'testcart1']);
Route::get('getcart', [Shop::class,'view_cart']);
Route::get('/pay', [Shop::class, 'pay']);
Route::post('/stripe-payment', [Shop::class, 'payment']);
Route::get('/stripe-success', [Shop::class, '_success']);
Route::get('/stripe-cancel', [Shop::class, 'cancel']);
//for testing
Route::get('/viewmail', [Home::class,'viewmail']);
Route::get('/testmail', [Home::class,'testmail']);

// *************************End Testing url********************************


Route::middleware(['Authcheck'])->group(function () {
    Route::get('admin/dashboard', [Dashboard::class,'index']);

    /*************************Settings Controllers********************* */
    Route::match(['get','post'], 'admin/settings', [Settings::class,'update_settings']);
    Route::match(['get','post'], 'admin/remove_image', [Settings::class,'remove_image']); //for all modules


    /*************************ContactUs Controllers********************* */
    // Route::match(['get','post'], 'admin/contact_us', [ContactUs::class,'index']);
    
    /*************************CMS Controllers******************************* */
    Route::match(['get','post'], 'admin/cms', [Cms::class,'index']);
    Route::match(['get','post'], 'admin/add_edit_cms', [Cms::class,'add_edit_cms']);
    Route::match(['get','post'], 'admin/add_edit_cms/{id}', [Cms::class,'add_edit_cms']);
    Route::match(['get','post'], 'admin/delete_cms/{id}', [Cms::class,'delete_cms']);
    /**************************Banner Controllers*********************** */
    Route::match(['get','post'], 'admin/banner', [Banner::class,'index']);
    Route::match(['get','post'], 'admin/add_edit_banner', [Banner::class,'add_edit_banner']);
    Route::match(['get','post'], 'admin/add_edit_banner/{id}', [Banner::class,'add_edit_banner']);
    Route::match(['get','post'], 'admin/delete_banner/{id}', [Banner::class,'delete_banner']);
   
    /******************************************HomeContent************************************ */
    Route::match(['get','post'], 'admin/homeContent', [HomeContent::class,'update_content']);
    /******************************************StoryContent************************************ */
    Route::match(['get','post'], 'admin/story-content', [StoryContent::class,'update_content']);
    /******************************************Products************************************ */
    // Route::match(['get','post'], 'admin/product_category', [Products::class,'product_category']);
    // Route::match(['get','post'], 'admin/product_category/{id}', [Products::class,'product_category']);
    // Route::match(['get','post'], 'admin/add_edit_pro_category', [Products::class,'add_edit_pro_category']);
    // Route::match(['get','post'], 'admin/delete_pro_category/{id}', [Products::class,'delete_pro_category']);

    Route::match(['get','post'], 'admin/products', [Products::class,'index']);
    Route::match(['get','post'], 'admin/add_edit_product', [Products::class,'add_edit_product']);
    Route::match(['get','post'], 'admin/add_edit_product/{id}', [Products::class,'add_edit_product']);
    // Route::match(['get','post'], 'admin/add_edit_product/{id}/{id2}', [Products::class,'add_edit_product']);
    Route::match(['get','post'], 'admin/delete_product/{id}', [Products::class,'delete_product']);
    // Route::match(['get','post'], 'admin/delete_attr/{id}/{id2}', [Products::class,'delete_attr']);

    Route::match(['get','post'], 'admin/cocktails', [Cocktails::class,'index']);
    Route::match(['get','post'], 'admin/add_edit_cocktail', [Cocktails::class,'add_edit_cocktail']);
    Route::match(['get','post'], 'admin/add_edit_cocktail/{id}', [Cocktails::class,'add_edit_cocktail']);
    Route::match(['get','post'], 'admin/delete_cocktail/{id}', [Cocktails::class,'delete_cocktail']);


    /******************************************Customers************************************ */
    Route::get('admin/customers', [Customers::class,'index']);
    Route::get('admin/customer_orders/{id}', [Customers::class,'customer_orders']);
    Route::get('admin/new_orders', [Customers::class,'new_orders']);
    Route::match(['get','post'],'admin/change_order_status', [Customers::class,'change_order_status']);
    Route::get('admin/all_orders', [Customers::class,'all_orders']);
    Route::get('admin/delete_pre_order/{id}', [Customers::class,'delete_pre_order']);

    /*******************************************Cocktail-club*************************************** */
    Route::match(['get', 'post'], 'admin/cocktail-club', [CocktailClub::class,'index']);
    Route::match(['get', 'post'], 'admin/cocktail-club/{id}', [CocktailClub::class,'index']);
    Route::get('admin/delete_cocktail_club/{id}', [CocktailClub::class,'delete_cocktail_club']);
    Route::match(['get', 'post'], 'admin/search_cock_club', [CocktailClub::class,'search_cock_club']);
    Route::get('admin/c_search_reset', [CocktailClub::class,'search_reset']);


    /*****************************************Auth Controllers****************************** */
    Route::get('admin/logout', [Auth::class,'logout']);
    Route::match(['get','post'], 'admin/profile', [Auth::class,'edit_profile']);

    /******************************************Pdf******************************************* */
    Route::get('/secure-pdf/{filename}', function ($filename) {

        $path = storage_path('app/pdf/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);

    })->name('secure.pdf');
});
Route::middleware(['Alreadyloggedcheck'])->group(function () {
    Route::match(['get','post'], '/'.ADMIN, [Auth::class,'login']);
});


Route::get('/{any}', [Home::class,'cms']);