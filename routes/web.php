<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HsCodeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\InvestFieldController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
})->name('logout');

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/project/{id}', [FrontController::class, 'showproject'])->name('front.project');
Route::get('/machine/{id}', [FrontController::class, 'showmachine'])->name('front.machine');
Route::get('/material/{id}', [FrontController::class, 'showmaterial'])->name('front.material');
Route::get('/category/{id}', [FrontController::class, 'showcategory'])->name('front.category');
Route::get('/vendor/{id}', [FrontController::class, 'showcategory'])->name('front.vendor');
Route::get('/search/basic', [SearchController::class, 'basic_search'])->name('front.search.basic');
Route::get('/search/basic/results', [SearchController::class, 'basic_results'])->name('front.results.basic');
Route::get('/search', [SearchController::class, 'search'])->name('front.search');
Route::get('/search/results', [SearchController::class, 'results'])->name('front.results');
Route::get('/register/user/', [RegisterController::class, 'userForm'])->name('register.user.form');
Route::get('/register/vendor', [RegisterController::class, 'vendorForm'])->name('register.vendor.form');
Route::post('/user/register', [RegisterController::class, 'createUser'])->name('register.user');
Route::post('/vendor/register', [RegisterController::class, 'createVendor'])->name('register.vendor');


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('medo/permission')->group(function () {
        Route::get('/index', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('/create', [PermissionController::class, 'store'])->name('permissions.store');
    });
    /* Materials Route */
    /* Start Roles Route */
    Route::prefix('roles')->group(function () {
        Route::get('/index', [RoleController::class, 'index'])->name('roles.index');
        Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::get('/show/{id}', [RoleController::class, 'show'])->name('roles.show');
        Route::PATCH('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::any('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });
    /* End Roles Route */
    /* Start Users Route */
    Route::prefix('users')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('users.index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    /* End Users Route */

    /* Start Users Route */
    Route::prefix('hscodes')->group(function () {
        Route::get('/index', [HsCodeController::class, 'index'])->name('hscodes.index');
        Route::get('/show/{id}', [HsCodeController::class, 'show'])->name('hscodes.show');
        Route::get('/create', [HsCodeController::class, 'create'])->name('hscodes.create');
        Route::post('/store', [HsCodeController::class, 'store'])->name('hscodes.store');
        Route::get('/edit/{id}', [HsCodeController::class, 'edit'])->name('hscodes.edit');
        Route::post('/update/{id}', [HsCodeController::class, 'update'])->name('hscodes.update');
        Route::get('/delete/{id}', [HsCodeController::class, 'destroy'])->name('hscodes.destroy');
    });
    /* End Users Route */
    /* Start Categories Route */
    Route::prefix('categories')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    /* End Categories Route */

    /* Start Vendors Route */
    Route::prefix('vendors')->group(function () {
        Route::get('/index', [VendorController::class, 'index'])->name('vendors.index');
        Route::get('/create', [VendorController::class, 'create'])->name('vendors.create');
        Route::post('/store', [VendorController::class, 'store'])->name('vendors.store');
        Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('vendors.edit');
        Route::get('/show/{id}', [VendorController::class, 'show'])->name('vendors.show');
        Route::post('/update/{id}', [VendorController::class, 'update'])->name('vendors.update');
        Route::get('/delete/{id}', [VendorController::class, 'destroy'])->name('vendors.destroy');
    });
    /* End Vendors Route */

    /* Start Machines Route */
    Route::prefix('machines')->group(function () {
        Route::get('/index', [MachineController::class, 'index'])->name('machines.index');
        Route::get('/create', [MachineController::class, 'create'])->name('machines.create');
        Route::post('/store', [MachineController::class, 'store'])->name('machines.store');
        Route::get('/edit/{id}', [MachineController::class, 'edit'])->name('machines.edit');
        Route::get('/show/{id}', [MachineController::class, 'show'])->name('machines.show');
        Route::post('/update/{id}', [MachineController::class, 'update'])->name('machines.update');
        Route::get('/delete/{id}', [MachineController::class, 'destroy'])->name('machines.destroy');
    });
    /* End Machines Route */

    /* Start Technologies Route */
    Route::prefix('technologies')->group(function () {
        Route::get('/index', [TechnologyController::class, 'index'])->name('technologies.index');
        Route::get('/create', [TechnologyController::class, 'create'])->name('technologies.create');
        Route::post('/store', [TechnologyController::class, 'store'])->name('technologies.store');
        Route::get('/edit/{id}', [TechnologyController::class, 'edit'])->name('technologies.edit');
        Route::get('/show/{id}', [TechnologyController::class, 'show'])->name('technologies.show');
        Route::post('/update/{id}', [TechnologyController::class, 'update'])->name('technologies.update');
        Route::get('/delete/{id}', [TechnologyController::class, 'destroy'])->name('technologies.destroy');
    });
    /* End Technologies Route */

    /* Start Idea Route */
    Route::prefix('ideas')->group(function () {
        Route::get('/index', [IdeaController::class, 'index'])->name('ideas.index');
        Route::get('/create', [IdeaController::class, 'create'])->name('ideas.create');
        Route::post('/store', [IdeaController::class, 'store'])->name('ideas.store');
        Route::get('/edit/{id}', [IdeaController::class, 'edit'])->name('ideas.edit');
        Route::get('/show/{id}', [IdeaController::class, 'show'])->name('ideas.show');
        Route::post('/update/{id}', [IdeaController::class, 'update'])->name('ideas.update');
        Route::get('/delete/{id}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
    });
    /* End Idea Route */

    /* Start Materials Route */
    Route::prefix('materials')->group(function () {
        Route::get('/index', [MaterialController::class, 'index'])->name('materials.index');
        Route::get('/create', [MaterialController::class, 'create'])->name('materials.create');
        Route::post('/store', [MaterialController::class, 'store'])->name('materials.store');
        Route::get('/show/{id}', [MaterialController::class, 'show'])->name('materials.show');
        Route::get('/edit/{id}', [MaterialController::class, 'edit'])->name('materials.edit');
        Route::post('/update/{id}', [MaterialController::class, 'update'])->name('materials.update');
        Route::get('/delete/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');
    });
    /* End Materials Route */

    /* Start investfields Route */
    Route::prefix('investfields')->group(function () {
        Route::get('/index', [InvestFieldController::class, 'index'])->name('investfields.index');
        Route::get('/create', [InvestFieldController::class, 'create'])->name('investfields.create');
        Route::post('/store', [InvestFieldController::class, 'store'])->name('investfields.store');
        Route::get('/show/{id}', [InvestFieldController::class, 'show'])->name('investfields.show');
        Route::get('/edit/{id}', [InvestFieldController::class, 'edit'])->name('investfields.edit');
        Route::post('/update/{id}', [InvestFieldController::class, 'update'])->name('investfields.update');
        Route::get('/delete/{id}', [InvestFieldController::class, 'destroy'])->name('investfields.destroy');
    });
    /* End Investfields Route */

    /* Start Projects Route */
    Route::prefix('projects')->group(function () {
        Route::get('/index', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/show/{id}', [ProjectController::class, 'show'])->name('projects.show');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('projects.update');
        Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });
    /* End Projects Route */
});
