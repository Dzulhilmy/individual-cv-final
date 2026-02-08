<?php

use App\Http\Controllers\CvExportController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ObjectiveController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('example')->name('example.')->group(function () {
        Route::get('/', [ExampleController::class, 'index'])->name('index');
        Route::get('/create', [ExampleController::class, 'create'])->name('create');
        Route::post('/store', [ExampleController::class, 'store'])->name('store');
        Route::get('/{example}/show', [ExampleController::class, 'show'])->name('show');
        Route::get('/{example}/edit', [ExampleController::class, 'edit'])->name('edit');
        Route::put('/{example}/update', [ExampleController::class, 'update'])->name('update');
        Route::delete('/{example}/destroy', [ExampleController::class,
            'destroy'])->name('destroy');
    });
});

// This makes the page accessible at your-domain.com/personals
Route::get('/', [PersonalController::class, 'publicIndex'])->name('personal.public');

Route::middleware(['auth'])->group(function () {
    Route::prefix('personal')->name('personal.')->group(function () {
        Route::get('/', [PersonalController::class, 'index'])->name('index');
        Route::get('/create', [PersonalController::class, 'create'])->name('create');
        Route::post('/store', [PersonalController::class, 'store'])->name('store'); // Removed /store from URL for cleaner REST
        Route::get('/{personal}', [PersonalController::class, 'show'])->name('show');
        Route::get('/{personal}/edit', [PersonalController::class, 'edit'])->name('edit');
        Route::put('/{personal}', [PersonalController::class, 'update'])->name('update'); // Standardizing the PUT
        Route::delete('/{personal}', [PersonalController::class, 'destroy'])->name('destroy');

        // --- 2. YOUR PRINT ROUTE (Must be BEFORE resource) ---
        // Note the ->name('personal.print') at the end. That is what fixes your error.
        Route::get('/personal/{id}/print', [PersonalController::class, 'printCV'])
            ->name('print');

        // --- 3. YOUR RESOURCE ROUTES ---
        Route::resource('personal', PersonalController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('objective')->name('objective.')->group(function () {
        Route::get('/', [ObjectiveController::class, 'index'])->name('index');
        Route::get('/create', [ObjectiveController::class, 'create'])->name('create');
        Route::post('/store', [ObjectiveController::class, 'store'])->name('store');
        Route::get('/{objective}/show', [ObjectiveController::class, 'show'])->name('show');
        Route::get('/{objective}/edit', [ObjectiveController::class, 'edit'])->name('edit');
        Route::put('/{objective}/update', [ObjectiveController::class, 'update'])->name('update');
        Route::delete('/{objective}/destroy', [ObjectiveController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('education')->name('education.')->group(function () {
        Route::get('/', [EducationController::class, 'index'])->name('index');
        Route::get('/create', [EducationController::class, 'create'])->name('create');
        Route::post('/store', [EducationController::class, 'store'])->name('store');
        Route::get('/{education}/show', [EducationController::class, 'show'])->name('show');
        Route::get('/{education}/edit', [EducationController::class, 'edit'])->name('edit');
        Route::put('/{education}/update', [EducationController::class, 'update'])->name('update');
        Route::delete('/{education}/destroy', [EducationController::class, 'destroy'])->name('destroy');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('work')->name('work.')->group(function () {
        Route::get('/', [WorkController::class, 'index'])->name('index');
        Route::get('/create', [WorkController::class, 'create'])->name('create');
        Route::post('/store', [WorkController::class, 'store'])->name('store');
        Route::get('/{work}/show', [WorkController::class, 'show'])->name('show');
        Route::get('/{work}/edit', [WorkController::class, 'edit'])->name('edit');
        Route::put('/{work}/update', [WorkController::class, 'update'])->name('update');
        Route::delete('/{work}/destroy', [WorkController::class, 'destroy'])->name('destroy');
    });
});

// User Management Routes
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{user}/show', [UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}/update', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('destroy');
});
// Role Management Routes
Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('/create', [RoleController::class, 'create'])->name('create');
    Route::post('/store', [RoleController::class, 'store'])->name('store');
    Route::get('/{role}/show', [RoleController::class, 'show'])->name('show');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
    Route::put('/{role}/update', [RoleController::class, 'update'])->name('update');
    Route::delete('/{role}/destroy', [RoleController::class, 'destroy'])->name('destroy');
});

// Product Management Routes
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}/show', [ProductController::class, 'show'])->name('show');
    Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}/update', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}/destroy', [ProductController::class,
        'destroy'])->name('destroy');

});

// View the CV in browser
Route::get('/cv', [CvExportController::class, 'show'])->name('cv.show');

// Export Routes
Route::get('/cv/download-pdf', [CvExportController::class, 'downloadPdf'])->name('cv.pdf');
Route::get('/cv/download-image', [CvExportController::class, 'downloadImage'])->name('cv.image');

require __DIR__.'/auth.php';
