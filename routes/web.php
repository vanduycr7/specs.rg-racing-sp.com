<?php

use Illuminate\Support\Str;

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

//Route::view('/privacy', 'homepage.privacy')->name('privacy');
Route::get('/privacy', function() {
	return view('homepage.privacy');
})->name('privacy');
Route::get('/prices', function() {
	return view('homepage.kainos');
})->name('kainos');
Route::get('/services', function() {
	return view('homepage.paslaugos');
})->name('paslaugos');
Route::get('/powerchip', function() {
	return view('homepage.powerchip');
})->name('powerchip');
Route::get('/evtun', function() {
	return view('homepage.evtun');
})->name('evtun');
Route::get('/charger', function() {
	return view('homepage.kroviklis');
})->name('kroviklis');
Route::get('/contact', function() {
	return view('homepage.kontaktai');
})->name('kontaktai');
Route::get('/duk', function() {
	return view('homepage.duk');
})->name('duk');
Route::get('/services/chiptuning', function() {
	return view('homepage.service_chiptuning');
})->name('service_chiptuning');
Route::get('/services/dpf', function() {
	return view('homepage.service_dpf');
})->name('service_dpf');
Route::get('/services/dpf-clean', function() {
	return view('homepage.service_dpf_clean');
})->name('service_dpf_clean');
Route::get('/services/egr', function() {
	return view('homepage.service_egr');
})->name('service_egr');
Route::get('/services/dyno', function() {
	return view('homepage.service_dyno');
})->name('service_dyno');
Route::get('/services/other-services', function() {
	return view('homepage.service_other');
})->name('service_other');

Route::get('/kainos', function() {
	return view('homepage.kainos');
})->name('kainos');
Route::get('/paslaugos', function() {
	return view('homepage.paslaugos');
})->name('paslaugos');
Route::get('/powerchip', function() {
	return view('homepage.powerchip');
})->name('powerchip');
Route::get('/evtun', function() {
	return view('homepage.evtun');
})->name('evtun');
Route::get('/type1-mobilus-kroviklis', function() {
	return view('homepage.kroviklis');
})->name('kroviklis');
Route::get('/faq', function() {
	return view('homepage.duk');
})->name('faq');
Route::get('/kontaktai', function() {
	return view('homepage.kontaktai');
})->name('kontaktai');
Route::get('/paslaugos/chiptuning', function() {
	return view('homepage.service_chiptuning');
})->name('service_chiptuning');
Route::get('/paslaugos/dpf', function() {
	return view('homepage.service_dpf');
})->name('service_dpf');
Route::get('/paslaugos/dpf-valymas', function() {
	return view('homepage.service_dpf_clean');
})->name('service_dpf_clean');
Route::get('/paslaugos/egr', function() {
	return view('homepage.service_egr');
})->name('service_egr');
Route::get('/paslaugos/dyno', function() {
	return view('homepage.service_dyno');
})->name('service_dyno');
Route::get('/paslaugos/kitos-paslaugos', function() {
	return view('homepage.service_other');
})->name('service_other');
Route::get('/partneryste', function() {
	return view('homepage.partneryste');
})->name('partneryste');

Route::get('/chiptuning', ['as' => 'chiptuning', 'uses' => 'BaseController@chiptuningView']);

Route::post('/send', ['as' => 'contact', 'uses' => 'BaseController@contactForm']);
Route::post('/partnership/send', ['as' => 'contact.partnership', 'uses' => 'BaseController@partnershipForm']);

Route::get('/', function() {
 try {
	$cache = new Instagram\Storage\CacheManager(storage_path('app/instagram/'));
	$api   = new Instagram\Api($cache);
	$api->setUserName('remapas_chip_tuning');
	$feed = $api->getFeed()->medias;
 } catch (Exception $e) {
	 $feed = [];
 }
	
	return view('homepage.namai', compact('feed'));
})->name('namai');

//search
Route::get('/search', function() {
	try {
	   $cache = new Instagram\Storage\CacheManager(storage_path('app/instagram/'));
	   $api   = new Instagram\Api($cache);
	   $api->setUserName('remapas_chip_tuning');
	   $feed = $api->getFeed()->medias;
	} catch (Exception $e) {
		$feed = [];
	}
	   
	   return view('homepage.search', compact('feed'));
})->name('search');

Route::get('/search-detail', function() {
	try {
	   $cache = new Instagram\Storage\CacheManager(storage_path('app/instagram/'));
	   $api   = new Instagram\Api($cache);
	   $api->setUserName('remapas_chip_tuning');
	   $feed = $api->getFeed()->medias;
	} catch (Exception $e) {
		$feed = [];
	}	
	   
	   return view('homepage.search-detail', compact('feed'));
})->name('search-detail');

Route::post('/ajax/meta', ['as' => 'ajax.meta', 'uses' => 'Ajax\AjaxController@fetchMeta']);

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);


Route::post('/ajax/data', ['as' => 'ajax.data', 'uses' => 'Ajax\AjaxController@fetchData']);
