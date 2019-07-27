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

Route::get('admin/','admin\loginController@getLogin')->middleware('checkLogoutAdmin')->name('getLogin');

Route::get('admin/getLogin','admin\loginController@getLogin')->middleware('checkLogoutAdmin')->name('getLogin');
Route::post('admin/postLogin','admin\loginController@postLogin')->name('postLogin');

Route::get('admin/getLogout','admin\loginController@getLogout')->name('getLogout');
//'middleware'=>'checkLoginAdmin'
Route::group(['prefix'=>'admin','middleware'=>'checkLoginAdmin'], function()
{
    // book manager


    Route::get('home','admin\showController@master')->name('getHome');
    Route::get('getBook','admin\showController@getBook')->name('getBook');


    Route::get('getAddBook','admin\addController@getAddBook')->name('getAddBook');
    Route::post('postAddBook','admin\addController@postAddBook')->name('postAddBook');

    Route::get('getEditBook/{id}','admin\editController@getEditBook')->name('getEditBook');
    Route::post('postEditBook/{id}','admin\editController@postEditBook')->name('postEditBook');

    Route::get('deleteBook/{id}','admin\deleteController@getDeleteBook')->name('getDeleteBook');

    // category

    Route::get('getCategory','admin\showController@getCategory')->name('getCategory');


    //dCategory
     Route::get('getAddDCategory','admin\showController@getAddDCategory');
    Route::post('postAddDCategory','admin\showController@postAddDCategory')->name('postAddDCategory');

    Route::get('getEditDCategory','admin\showController@getEditDCategory');
    Route::post('postEditDCategory','admin\showController@postEditDCategory')->name('postEditDCategory');

    Route::get('getDeleteDCategory','admin\showController@getDeleteDCategory');
    Route::post('postDeleteDCategory','admin\showController@postDeleteDCategory')->name('postDeleteDCategory');
    // bill manager
    Route::get('getBill','admin\showController@getBill')->name('getBill');

    //bill detail
    Route::get('getBillDetail/{id}','admin\showController@getBillDetail')->name('getBillDetail');
    // ajax
    Route::get('editShipperOnBill','admin\ajaxController@editShipperOnBill');
    Route::get('getEditCategory','admin\ajaxController@getEditCategory');
    //sale

    Route::get('getSale','admin\showController@getSale')->name('getSale');

    Route::post('postSale','admin\showController@postSale')->name('postSale');

    Route::get('getDeleteSale/{id}','admin\deleteController@getDeleteSale')->name('getDeleteSale');

    //home page
    Route::get('getHome','admin\showController@getHome')->name('getHome');

    // category
    Route::get('getDeleteCategory/{id}','admin\deleteController@getDeleteCategory')->name('getDeleteCategory');

    Route::post('postAddCategory','admin\addController@postAddCategory')->name('postAddCategory');

    Route::get('getCalendar','admin\showController@getCalendar')->name('getCalendar');

});
Route::get('/postLoginFrontend','frontend\homeController@postLoginFrontend')->name('postLoginFrontend');
Route::get('/getLogoutFrontend','frontend\homeController@getLogoutFrontend')->name('getLogoutFrontend');
Route::get('/','frontend\homeController@getHome')->name('Home');
Route::get('/getSearch','frontend\homeController@getSearch')->name('getSearch');
Route::get('/getSearchUrl/{search}','frontend\homeController@getSearchUrl')->name('getSearchUrl');
Route::get('/getDetail/{id}/{pageType}','frontend\detailController@getDetail')->name('getDetail');
Route::get('/download/{link}','frontend\downloadController@getDownload');
Route::get('/getAddCart/{id}','frontend\cartController@getAddCart');
Route::get('/getCart','frontend\cartController@getCart');
Route::post('/getSetBill','frontend\cartController@getSetBill')->name('getSetBill');
Route::get('/flash','frontend\cartController@flashCart');
Route::get('setUser','frontend\accountController@setUser');
Route::get('getAddressConfirm','frontend\cartController@getAddressConfirm')->name('getAddressConfirm');

Route::get('getPayment/{id}','frontend\cartController@getPayment')->name('getPayment');

Route::get('getAccountManager','frontend\accountController@getAccountManager');
Route::get('getBillManager','frontend\accountController@getBillManager');
Route::get('getBillDetailsManager/{id}','frontend\accountController@getBillDetailsManager');
Route::get('getAddressManager','frontend\accountController@getAddressManager')->name('getAddressManager');
Route::post('postAddAddressManager','frontend\accountController@postAddAddressManager')->name('postAddAddressManager');
Route::post('postEditAddressManager','frontend\accountController@postEditAddressManager')->name('postEditAddressManager');

use App\book;
Route::get('ajax/books','frontend\homeController@getBooks');

Route::get('ajax/subMenu','frontend\homeController@getSubMenu');




Route::get('/test', 'PaginationController@index');
Route::get('pagination/fetch_data', 'PaginationController@fetch_data');


/// delete

//Auth::routes();
//
Route::get('/home', 'HomeController@index')->name('home');

Route::get('ajax-pagination','PaginationController@ajaxPagination')->name('ajax.pagination');



//Route::get('/a', function () {
//    return view('welcome');
//});

Route::get('/autocomplete', 'frontend\homeController@index');
Route::post('/autocomplete/fetch', 'frontend\homeController@fetch')->name('autocomplete.fetch');
