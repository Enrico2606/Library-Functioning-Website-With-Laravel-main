<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;
use App\Models\Buku;
use App\Models\Review;
use App\Models\Category;
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

Route::get('/', function () {
    $cate = Category::all();
    $buku = Buku::paginate(8);

    if(Auth::check()){
        return view('members.index', ['cate' => $cate, 'bukus' => $buku]);
    }
    return view('guests.index', ['cate' => $cate, 'bukus' => $buku]);
});

Route::get('/home', function () {
    $cate = Category::all();
    $buku = Buku::paginate(8);
    if(Auth::check()){
        return view('members.index', ['cate' => $cate, 'bukus' => $buku]);
    }
    return view('guests.index', ['cate' => $cate, 'bukus' => $buku]);
});

Route::get('/home/{category}', function ($category) {
    $cate = Category::all();
    $matchThese = ['category_id' => $category];
    $buku = Buku::where($matchThese)->paginate(4);
    if(Auth::check()){
        return view('members.indexcat', ['cate' => $cate, 'bukus' => $buku, 'category' => $category]);
    }
    return view('guests.indexcat', ['cate' => $cate, 'bukus' => $buku, 'category' => $category]);
});

Route::get('/dashboard', function () {
    $cate = Category::all();
    
    if(Auth::user()->role_id === 1){
        $datas = Buku::paginate(10);
        return view('admins.buku', ['datas' => $datas]);
    }
    $datas = Buku::paginate(8);
    return view('members.index', ['bukus' => $datas, 'cate' => $cate]);
})->middleware(['auth']);

Route::get('/admin', function () {
    if(Auth::user()->role_id === 1){
        $datas = Buku::paginate(10);
        return view('admins.buku', ['datas' => $datas]);
    }
    return abort(404);
})->middleware(['auth']);

Route::get('/showbuku/{id}', function ($id) {
    $data = Buku::findOrFail($id);
    if(Auth::check()){
        $matchThese = ['user_id' => Auth::user()->id, 'buku_id' => $id];
        $count = Review::where($matchThese)->get()->count(); 
        return view('members.showbuku', ['data' => $data, 'count' => $count]);
    }
    return view('guests.showbuku', ['data' => $data]);
});

Route::get('/search', function(Request $request){
    $buku = Buku::where('judul', 'LIKE', '%' . $request->search . '%')->orWhere('author', 'LIKE', '%' . $request->search . '%')->orWhere('isi', 'LIKE', '%' . $request->search . '%')->paginate(4);
    $count = Buku::where('judul', 'LIKE', '%' . $request->search . '%')->orWhere('author', 'LIKE', '%' . $request->search . '%')->orWhere('isi', 'LIKE', '%' . $request->search . '%')->get()->count();
    $cate = Category::all();
    if(Auth::check()){
        return view('members.indexser', ['cate' => $cate, 'bukus' => $buku, 'count' => $count]);
    }
    return view('guests.indexser', ['cate' => $cate, 'bukus' => $buku, 'count' => $count]);
});



Route::get('/members/hapus/{id}', [MemberController::class, 'hapus'])->middleware(['auth']);
Route::get('/members/unblock/{id}', [MemberController::class, 'unblock'])->middleware(['auth']);
Route::get('/admins/delete/{id}', [AdminController::class, 'deletee'])->middleware(['auth']);
Route::get('/reviews/delete/{id}', [ReviewController::class, 'delete'])->middleware(['auth']);
Route::get('/profile/{id}', [MemberController::class, 'profile'])->middleware(['auth']);

Route::resource('bukus', BukuController::class)->middleware(['auth']);
Route::resource('categories', CategoryController::class)->middleware(['auth']);
Route::resource('reviews', ReviewController::class)->middleware(['auth']);
Route::resource('members', MemberController::class)->middleware(['auth']);
Route::resource('admins', AdminController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
