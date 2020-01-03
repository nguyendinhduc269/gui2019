 <?php

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

//nav to /page
Route::get('/', 'PageController@index')->name('home');


//利用者の画像をアップロード
Route::get('/profile/','ProfileController@index')->name('profile');
Route::post('/profile/update','ProfileController@updateProfile')->name('profile.update');


Route::post('app','Moshikomi@getmoshikomi')->name('app');
Route::post('cancel','ProfileController@cancelmoshikomi')->name('cancel');


//管理者のページ
Route::middleware(['admin'])->prefix('admin')->group(function(){
	Route::get('/', function(){
		return view('admin.index');
	})->name('adminIndex');
	Route::resource('infor', 'InforController')->except('show');
	Route::resource('student', 'StudentController')->except('show');
	Route::resource('sermina', 'SerminaController')->except('show');
	Route::resource('book', 'BookController');
	Route::post('destroy','BookController@destroy')->name('destroy');
	
});

Route::get('postsearch','SearchController@searchName')->name('postsearch');
Route::get('search','SearchController@searchName')->name('search');

//登録、ログインの部分
//Route::post('/login','Auth\LoginController@credentials');
Auth::routes();
