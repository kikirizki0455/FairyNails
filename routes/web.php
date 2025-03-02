<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\Admin\ProductControllerAdmin as AdminProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RedemptionsController as AdminRedemptionsController;
use App\Http\Controllers\User\RedemptionController;
use App\Http\Controllers\Admin\TrasnsactionsController as AdminTransactionsController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\UserValidationController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Redemption;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home')->middleware('guest');


// ADMIN
Route::prefix('admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    


    // Perbaikan nama route yang duplikat
    Route::get('/transactions-list', [AdminController::class, 'transactions'])->name('admin.transactions.list');
    Route::get('/redeem-list', [AdminController::class, 'redeem'])->name('admin.redeem.list');
    Route::get('/member-list', [AdminController::class, 'member'])->name('admin.member.list');
   
    
    Route::prefix('user-validation')->group(function(){
        Route::get('/', [UserValidationController::class, 'index'])->name('admin.user-validation.index');
        Route::post('/approve/{id}', [UserValidationController::class, 'approve'])->name('admin.user-validation.approve');
        Route::post('/reject/{id}', [UserValidationController::class, 'reject'])->name('admin.user-validation.reject');
    });

    // Grouping routes untuk product
    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'products'])->name('admin.product');
        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('admin.product.store');
        Route::get('/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/{id}', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
    });
    
    Route::prefix('redeem')->group(function(){
        Route::get('/', [AdminRedemptionsController::class, 'redeem'])->name('admin.redeem');
        Route::get('/create', [AdminRedemptionsController::class, 'create'])->name('admin.redemption.create');
        Route::post('/store', [AdminRedemptionsController::class, 'store'])->name('admin.redemption.store');
    });

    Route::prefix('member')->group(function(){
        Route::get('/', [AdminUserController::class, 'user'])->name('admin.member');
        
    });

    Route::prefix('transactions')->group(function(){
        Route::get('/', [AdminTransactionsController::class, 'transactions'])->name('admin.transactions');
        Route::get('/{transaction}', [AdminTransactionsController::class, 'show'])->name('admin.transactions.show');
        Route::post('/transactions/export', [AdminTransactionsController::class, 'exportExcel'])->name('transactions.export');
        Route::put('/{transaction}/update-status', [AdminTransactionsController::class, 'updateStatus'])->name('admin.transactions.update-status');
        Route::put('/{transaction}/update-total', [AdminTransactionsController::class, 'updateTotal'])->name('admin.transactions.update-total');
    });
});


// USER - Dipisahkan dengan prefix yang berbeda dari admin
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
    
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'products'])->name('user.product');
        Route::get('/latest', [ProductController::class, 'getLatest'])->name('products.getLatest');
        Route::get('/keranjang', [ProductController::class, 'showCart'])->name('user.cart');
        Route::post('/keranjang', [ProductController::class, 'addToCart'])->name('user.cart-add');
        Route::post('/update', [ProductController::class, 'updateCart'])->name('cart.update');
        Route::post('/keranjang/remove', [ProductController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/keranjang/apply-voucher', [ProductController::class, 'applyVoucher'])->name('cart.apply-voucher');
    });
        Route::get('/produk/filter', [ProductController::class, 'filter'])->name('produk.filter');
    
    Route::prefix('transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'transactions'])->name('user.transactions');
        // Route::get('/checkout', [TransactionController::class, 'checkout'])->name('user.checkoutquery'');
        Route::post('/checkout', [TransactionController::class, 'checkout'])->name('user.checkout');
        Route::get('/user/transaction/{id}', [TransactionController::class, 'detail'])->name('user.transaction.detail');
        Route::get('/user/transaction/pay/{id}', [TransactionController::class, 'pay'])->name('user.pay');
        Route::get('/transactions/latest', [TransactionController::class, 'getLatest'])->name('transactions.getLatest');
    });
    
    Route::prefix('redeem')->group(function(){
        Route::get('/', [RedemptionController::class, 'redeem'])->name('user.redeem');
        Route::get('/vouchers/latest', [RedemptionController::class, 'getLatest'])->name('vouchers.getLatest');
        Route::post('/collect-voucher', [RedemptionController::class, 'collection'])->name('user.collection-voucher');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';