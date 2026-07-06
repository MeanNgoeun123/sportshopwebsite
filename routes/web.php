<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CategoryController as FrontCategoryController;
use App\Http\Controllers\Frontend\BrandController as FrontBrandController;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Session;
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop/category/{id}', [ShopController::class, 'category'])->name('shop.category');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/category/{id}', [FrontCategoryController::class, 'show'])->name('category.show');
Route::get('/brand/{id}', [FrontBrandController::class, 'show'])->name('brand.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | CART
    |--------------------------------------------------------------------------
    */

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    /*
    |--------------------------------------------------------------------------
    | WISHLIST
    |--------------------------------------------------------------------------
    */

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    /*
    |--------------------------------------------------------------------------
    | CHECKOUT FLOW (FIXED)
    |--------------------------------------------------------------------------
    */

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout');

    Route::get('/checkout/shipping', [CheckoutController::class, 'shipping'])
        ->name('checkout.shipping');

    Route::post('/checkout/shipping', [CheckoutController::class, 'storeShipping'])
        ->name('checkout.shipping.store');

    Route::get('/checkout/payment', [CheckoutController::class, 'payment'])
        ->name('checkout.payment');

    Route::post('/checkout/payment', [CheckoutController::class, 'processPayment'])
        ->name('checkout.payment.process');

    Route::get('/checkout/success', [CheckoutController::class, 'success'])
        ->name('checkout.success');

    /*
    |--------------------------------------------------------------------------
    | ORDERS
    |--------------------------------------------------------------------------
    */

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /*
    |--------------------------------------------------------------------------
    | REVIEWS
    |--------------------------------------------------------------------------
    */

    Route::post('/reviews/{product}', [ReviewController::class, 'store'])
        ->name('reviews.store');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('categories', AdminCategoryController::class);
        Route::resource('brands', AdminBrandController::class);
        Route::resource('products', AdminProductController::class);
        Route::resource('orders', AdminOrderController::class);
<<<<<<< HEAD
        Route::post('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])
    ->name('admin.orders.status');
=======
>>>>>>> 05db09b21274c2c101a3a70efef01a1844115506
        Route::resource('users', AdminUserController::class);
        Route::resource('coupons', AdminCouponController::class);
        Route::resource('payments', AdminPaymentController::class);
        Route::resource('sliders', AdminSliderController::class);

        Route::get('/settings', [AdminSettingController::class, 'index'])
            ->name('settings.index');

        Route::post('/settings/update', [AdminSettingController::class, 'update'])
            ->name('settings.update');
    });