<?php

Auth::routes();

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
	// Artisan::call('view:clear');
	// Artisan::call('route:clear');
	// Artisan::call('clear-compiled');
	Artisan::call('config:cache');
	// Artisan::call('route:cache');
    return 'DONE'; //Return anything
});

/*Master*/
Route::group(['middleware' => ['auth']], function () {

	Route::get('/master/changePassword','MasterController@showChangePasswordForm');
	Route::post('/master/changePassword','MasterController@changePassword')->name('changePassword');
	Route::get('/master/profile','MasterController@profile');
	Route::post('/master/profile','MasterController@update_profile');
	Route::get('/master/role','MasterController@role');

	/*master admin*/
	Route::get('/master/register-admin','MasterController@register_admin');
	Route::post('/master/create-admin','MasterController@create_admin');
	Route::get('/master/data-admin','MasterController@data_admin');
	Route::get('/master/block/{id}', 'MasterController@block_admin');
  	Route::post('/master/block/{id}','MasterController@blockadmin');

	/*master register customer*/
	Route::get('/master/register-customer','MasterController@register_customer');
	Route::post('/master/create-customer','MasterController@create_customer');
	Route::get('/master/data-customer','MasterController@data_customer');
	Route::get('/master/blockcustomer/{id}', 'MasterController@block_customer');
	Route::post('/master/blockcustomer/{id}','MasterController@blockcustomer');

	/*master stock_main*/	
	Route::post('/master/stock-main/search','MasterController@search_stock_main');
	Route::get('/master/stock-main/search','MasterController@search_stock_main_get');
	Route::get('/master/stock-main/warehouse','StockMain\ProductsController@warehouse');
	Route::get('/master/stock-main/create-tyre','StockMain\ProductsController@create_tyre');
	Route::post('/master/stock-main/create-tyre','StockMain\ProductsController@createtyre');

	Route::get('/master/stock-main/tyre','StockMain\ProductsController@product_tyre')->name('home');
	Route::get('/master/stock-main/edit/{id}', 'StockMain\ProductsController@edit_tyre');
	Route::post('/master/stock-main/update-tyre','StockMain\ProductsController@update_tyre');
	Route::post('/master/stock-main/add-tyre','StockMain\ProductsController@add_tyre');
	Route::post('/master/stock-main/delete-tyre','StockMain\ProductsController@delete_tyre');
	Route::post('/master/stock-main/search-add-tyre','StockMain\ProductsController@search_add_tyre');
	Route::post('/master/stock-main/search-delete-tyre','StockMain\ProductsController@search_delete_tyre');
	Route::post('/master/stock-main/tyredelete/{id}', 'StockMain\ProductsController@posttyredelete');

	/*master khokkloi*/	
	Route::post('/master/khokkloi/search','MasterController@search_khokkloi');
	Route::get('/master/khokkloi/search','MasterController@search_khokkloi_get');
	Route::get('/master/khokkloi/warehouse','Khokkloi\ProductsController@warehouse');
	Route::get('/master/khokkloi/create-tyre','Khokkloi\ProductsController@create_tyre');
	Route::post('/master/khokkloi/create-tyre','Khokkloi\ProductsController@createtyre');

	Route::get('/master/khokkloi/tyre','Khokkloi\ProductsController@product_tyre');
	Route::get('/master/khokkloi/edit/{id}', 'Khokkloi\ProductsController@edit_tyre');
	Route::post('/master/khokkloi/update-tyre','Khokkloi\ProductsController@update_tyre');
	Route::post('/master/khokkloi/add-tyre','Khokkloi\ProductsController@add_tyre');
	Route::post('/master/khokkloi/delete-tyre','Khokkloi\ProductsController@delete_tyre');
	Route::post('/master/khokkloi/search-add-tyre','Khokkloi\ProductsController@search_add_tyre');
	Route::post('/master/khokkloi/search-delete-tyre','Khokkloi\ProductsController@search_delete_tyre');
	Route::post('/master/khokkloi/tyredelete/{id}', 'Khokkloi\ProductsController@posttyredelete');

	/*master bypart*/	
	Route::post('/master/bypart/search','MasterController@search_bypart');
	Route::get('/master/bypart/search','MasterController@search_bypart_get');
	Route::get('/master/bypart/warehouse','Bypart\ProductsController@warehouse');
	Route::get('/master/bypart/create-tyre','Bypart\ProductsController@create_tyre');
	Route::post('/master/bypart/create-tyre','Bypart\ProductsController@createtyre');

	Route::get('/master/bypart/tyre','Bypart\ProductsController@product_tyre');
	Route::get('/master/bypart/edit/{id}', 'Bypart\ProductsController@edit_tyre');
	Route::post('/master/bypart/update-tyre','Bypart\ProductsController@update_tyre');
	Route::post('/master/bypart/add-tyre','Bypart\ProductsController@add_tyre');
	Route::post('/master/bypart/delete-tyre','Bypart\ProductsController@delete_tyre');
	Route::post('/master/bypart/search-add-tyre','Bypart\ProductsController@search_add_tyre');
	Route::post('/master/bypart/search-delete-tyre','Bypart\ProductsController@search_delete_tyre');
	Route::post('/master/bypart/tyredelete/{id}', 'Bypart\ProductsController@posttyredelete');

	/*master thaiwatsadu*/	
	Route::post('/master/thaiwatsadu/search','MasterController@search_thaiwatsadu');
	Route::get('/master/thaiwatsadu/search','MasterController@search_thaiwatsadu_get');
	Route::get('/master/thaiwatsadu/warehouse','Thaiwatsadu\ProductsController@warehouse');
	Route::get('/master/thaiwatsadu/create-tyre','Thaiwatsadu\ProductsController@create_tyre');
	Route::post('/master/thaiwatsadu/create-tyre','Thaiwatsadu\ProductsController@createtyre');

	Route::get('/master/thaiwatsadu/tyre','Thaiwatsadu\ProductsController@product_tyre');
	Route::get('/master/thaiwatsadu/edit/{id}', 'Thaiwatsadu\ProductsController@edit_tyre');
	Route::post('/master/thaiwatsadu/update-tyre','Thaiwatsadu\ProductsController@update_tyre');
	Route::post('/master/thaiwatsadu/add-tyre','Thaiwatsadu\ProductsController@add_tyre');
	Route::post('/master/thaiwatsadu/delete-tyre','Thaiwatsadu\ProductsController@delete_tyre');
	Route::post('/master/thaiwatsadu/search-add-tyre','Thaiwatsadu\ProductsController@search_add_tyre');
	Route::post('/master/thaiwatsadu/search-delete-tyre','Thaiwatsadu\ProductsController@search_delete_tyre');
	Route::post('/master/thaiwatsadu/tyredelete/{id}', 'Thaiwatsadu\ProductsController@posttyredelete');

	/*master chaofa*/	
	Route::post('/master/chaofa/search','MasterController@search_chaofa');
	Route::get('/master/chaofa/search','MasterController@search_chaofa_get');
	Route::get('/master/chaofa/warehouse','Chaofa\ProductsController@warehouse');
	Route::get('/master/chaofa/create-tyre','Chaofa\ProductsController@create_tyre');
	Route::post('/master/chaofa/create-tyre','Chaofa\ProductsController@createtyre');

	Route::get('/master/chaofa/tyre','Chaofa\ProductsController@product_tyre');
	Route::get('/master/chaofa/edit/{id}', 'Chaofa\ProductsController@edit_tyre');
	Route::post('/master/chaofa/update-tyre','Chaofa\ProductsController@update_tyre');
	Route::post('/master/chaofa/add-tyre','Chaofa\ProductsController@add_tyre');
	Route::post('/master/chaofa/delete-tyre','Chaofa\ProductsController@delete_tyre');
	Route::post('/master/chaofa/search-add-tyre','Chaofa\ProductsController@search_add_tyre');
	Route::post('/master/chaofa/search-delete-tyre','Chaofa\ProductsController@search_delete_tyre');
	Route::post('/master/chaofa/tyredelete/{id}', 'Chaofa\ProductsController@posttyredelete');

	/*master thalang*/	
	Route::post('/master/thalang/search','MasterController@search_thalang');
	Route::get('/master/thalang/search','MasterController@search_thalang_get');
	Route::get('/master/thalang/warehouse','Thalang\ProductsController@warehouse');
	Route::get('/master/thalang/create-tyre','Thalang\ProductsController@create_tyre');
	Route::post('/master/thalang/create-tyre','Thalang\ProductsController@createtyre');

	Route::get('/master/thalang/tyre','Thalang\ProductsController@product_tyre');
	Route::get('/master/thalang/edit/{id}', 'Thalang\ProductsController@edit_tyre');
	Route::post('/master/thalang/update-tyre','Thalang\ProductsController@update_tyre');
	Route::post('/master/thalang/add-tyre','Thalang\ProductsController@add_tyre');
	Route::post('/master/thalang/delete-tyre','Thalang\ProductsController@delete_tyre');
	Route::post('/master/thalang/search-add-tyre','Thalang\ProductsController@search_add_tyre');
	Route::post('/master/thalang/search-delete-tyre','Thalang\ProductsController@search_delete_tyre');
	Route::post('/master/thalang/tyredelete/{id}', 'Thalang\ProductsController@posttyredelete');

	/*master Phangnga*/	
	Route::post('/master/phangnga/search','MasterController@search_phangnga');
	Route::get('/master/phangnga/search','MasterController@search_phangnga_get');
	Route::get('/master/phangnga/warehouse','Phangnga\ProductsController@warehouse');
	Route::get('/master/phangnga/create-tyre','Phangnga\ProductsController@create_tyre');
	Route::post('/master/phangnga/create-tyre','Phangnga\ProductsController@createtyre');

	Route::get('/master/phangnga/tyre','Phangnga\ProductsController@product_tyre');
	Route::get('/master/phangnga/edit/{id}', 'Phangnga\ProductsController@edit_tyre');
	Route::post('/master/phangnga/update-tyre','Phangnga\ProductsController@update_tyre');
	Route::post('/master/phangnga/add-tyre','Phangnga\ProductsController@add_tyre');
	Route::post('/master/phangnga/delete-tyre','Phangnga\ProductsController@delete_tyre');
	Route::post('/master/phangnga/search-add-tyre','Phangnga\ProductsController@search_add_tyre');
	Route::post('/master/phangnga/search-delete-tyre','Phangnga\ProductsController@search_delete_tyre');
	Route::post('/master/phangnga/tyredelete/{id}', 'Phangnga\ProductsController@posttyredelete');
});


/*Admin*/
Route::group(['prefix' => 'admin'], function(){

	Route::get('/','AdminController@index');
	Route::get('/login','AuthAdmin\LoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');    
  	Route::get('/changePassword','AdminController@showChangePasswordForm');
  	Route::post('/changePassword','AdminController@changePassword')->name('changePassword');
	Route::get('/profile','AdminController@profile');
	Route::post('/profile','AdminController@update_profile');
	Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');   

	/*admin stock_main*/	
	Route::post('/stock-main/search','AdminController@search_stock_main');
	Route::get('/stock-main/search','AdminController@search_stock_main_get');
	Route::get('/stock-main/warehouse','AdminStockMain\ProductsController@warehouse');
	Route::get('/stock-main/create-tyre','AdminStockMain\ProductsController@create_tyre');
	Route::post('/stock-main/create-tyre','AdminStockMain\ProductsController@createtyre');
	Route::get('/stock-main/tyre','AdminStockMain\ProductsController@product_tyre')->name('admin.home');
	Route::get('/stock-main/edit/{id}', 'AdminStockMain\ProductsController@edit_tyre');
	Route::post('/stock-main/update-tyre','AdminStockMain\ProductsController@update_tyre');
	Route::post('/stock-main/add-tyre','AdminStockMain\ProductsController@add_tyre');
	Route::post('/stock-main/delete-tyre','AdminStockMain\ProductsController@delete_tyre');
	Route::post('/stock-main/search-add-tyre','AdminStockMain\ProductsController@search_add_tyre');
	Route::post('/stock-main/search-delete-tyre','AdminStockMain\ProductsController@search_delete_tyre');

	/*admin khokkloi*/	
	Route::post('/khokkloi/search','AdminController@search_khokkloi');
	Route::get('/khokkloi/search','AdminController@search_khokkloi_get');
	Route::get('/khokkloi/warehouse','AdminKhokkloi\ProductsController@warehouse');
	Route::get('/khokkloi/create-tyre','AdminKhokkloi\ProductsController@create_tyre');
	Route::post('/khokkloi/create-tyre','AdminKhokkloi\ProductsController@createtyre');
	Route::get('/khokkloi/tyre','AdminKhokkloi\ProductsController@product_tyre');
	Route::get('/khokkloi/edit/{id}', 'AdminKhokkloi\ProductsController@edit_tyre');
	Route::post('/khokkloi/update-tyre','AdminKhokkloi\ProductsController@update_tyre');
	Route::post('/khokkloi/add-tyre','AdminKhokkloi\ProductsController@add_tyre');
	Route::post('/khokkloi/delete-tyre','AdminKhokkloi\ProductsController@delete_tyre');
	Route::post('/khokkloi/search-add-tyre','AdminKhokkloi\ProductsController@search_add_tyre');
	Route::post('/khokkloi/search-delete-tyre','AdminKhokkloi\ProductsController@search_delete_tyre');

	/*admin bypart*/
	Route::post('/bypart/search','AdminController@search_bypart');	
	Route::get('/bypart/search','AdminController@search_bypart_get');
	Route::get('/bypart/warehouse','AdminBypart\ProductsController@warehouse');
	Route::get('/bypart/create-tyre','AdminBypart\ProductsController@create_tyre');
	Route::post('/bypart/create-tyre','AdminBypart\ProductsController@createtyre');
	Route::get('/bypart/tyre','AdminBypart\ProductsController@product_tyre');
	Route::get('/bypart/edit/{id}', 'AdminBypart\ProductsController@edit_tyre');
	Route::post('/bypart/update-tyre','AdminBypart\ProductsController@update_tyre');
	Route::post('/bypart/add-tyre','AdminBypart\ProductsController@add_tyre');
	Route::post('/bypart/delete-tyre','AdminBypart\ProductsController@delete_tyre');
	Route::post('/bypart/search-add-tyre','AdminBypart\ProductsController@search_add_tyre');
	Route::post('/bypart/search-delete-tyre','AdminBypart\ProductsController@search_delete_tyre');

	/*admin thaiwatsadu*/
	Route::post('/thaiwatsadu/search','AdminController@search_thaiwatsadu');
	Route::get('/thaiwatsadu/search','AdminController@search_thaiwatsadu_get');	
	Route::get('/thaiwatsadu/warehouse','AdminThaiwatsadu\ProductsController@warehouse');
	Route::get('/thaiwatsadu/create-tyre','AdminThaiwatsadu\ProductsController@create_tyre');
	Route::post('/thaiwatsadu/create-tyre','AdminThaiwatsadu\ProductsController@createtyre');
	Route::get('/thaiwatsadu/tyre','AdminThaiwatsadu\ProductsController@product_tyre');
	Route::get('/thaiwatsadu/edit/{id}', 'AdminThaiwatsadu\ProductsController@edit_tyre');
	Route::post('/thaiwatsadu/update-tyre','AdminThaiwatsadu\ProductsController@update_tyre');
	Route::post('/thaiwatsadu/add-tyre','AdminThaiwatsadu\ProductsController@add_tyre');
	Route::post('/thaiwatsadu/delete-tyre','AdminThaiwatsadu\ProductsController@delete_tyre');
	Route::post('/thaiwatsadu/search-add-tyre','AdminThaiwatsadu\ProductsController@search_add_tyre');
	Route::post('/thaiwatsadu/search-delete-tyre','AdminThaiwatsadu\ProductsController@search_delete_tyre');

	/*admin chaofa*/
	Route::post('/chaofa/search','AdminController@search_chaofa');
	Route::get('/chaofa/search','AdminController@search_chaofa_get');	
	Route::get('/chaofa/warehouse','AdminChaofa\ProductsController@warehouse');
	Route::get('/chaofa/create-tyre','AdminChaofa\ProductsController@create_tyre');
	Route::post('/chaofa/create-tyre','AdminChaofa\ProductsController@createtyre');
	Route::get('/chaofa/tyre','AdminChaofa\ProductsController@product_tyre');
	Route::get('/chaofa/edit/{id}', 'AdminChaofa\ProductsController@edit_tyre');
	Route::post('/chaofa/update-tyre','AdminChaofa\ProductsController@update_tyre');
	Route::post('/chaofa/add-tyre','AdminChaofa\ProductsController@add_tyre');
	Route::post('/chaofa/delete-tyre','AdminChaofa\ProductsController@delete_tyre');
	Route::post('/chaofa/search-add-tyre','AdminChaofa\ProductsController@search_add_tyre');
	Route::post('/chaofa/search-delete-tyre','AdminChaofa\ProductsController@search_delete_tyre');

	/*admin thalang*/	
	Route::post('/thalang/search','AdminController@search_thalang');
	Route::get('/thalang/search','AdminController@search_thalang_get');
	Route::get('/thalang/warehouse','AdminThalang\ProductsController@warehouse');
	Route::get('/thalang/create-tyre','AdminThalang\ProductsController@create_tyre');
	Route::post('/thalang/create-tyre','AdminThalang\ProductsController@createtyre');
	Route::get('/thalang/tyre','AdminThalang\ProductsController@product_tyre');
	Route::get('/thalang/edit/{id}', 'AdminThalang\ProductsController@edit_tyre');
	Route::post('/thalang/update-tyre','AdminThalang\ProductsController@update_tyre');
	Route::post('/thalang/add-tyre','AdminThalang\ProductsController@add_tyre');
	Route::post('/thalang/delete-tyre','AdminThalang\ProductsController@delete_tyre');
	Route::post('/thalang/search-add-tyre','AdminThalang\ProductsController@search_add_tyre');
	Route::post('/thalang/search-delete-tyre','AdminThalang\ProductsController@search_delete_tyre');

	/*admin phangnga*/	
	Route::post('/phangnga/search','AdminController@search_phangnga');
	Route::get('/phangnga/search','AdminController@search_phangnga_get');
	Route::get('/phangnga/warehouse','AdminPhangnga\ProductsController@warehouse');
	Route::get('/phangnga/create-tyre','AdminPhangnga\ProductsController@create_tyre');
	Route::post('/phangnga/create-tyre','AdminPhangnga\ProductsController@createtyre');
	Route::get('/phangnga/tyre','AdminPhangnga\ProductsController@product_tyre');
	Route::get('/phangnga/edit/{id}', 'AdminPhangnga\ProductsController@edit_tyre');
	Route::post('/phangnga/update-tyre','AdminPhangnga\ProductsController@update_tyre');
	Route::post('/phangnga/add-tyre','AdminPhangnga\ProductsController@add_tyre');
	Route::post('/phangnga/delete-tyre','AdminPhangnga\ProductsController@delete_tyre');
	Route::post('/phangnga/search-add-tyre','AdminPhangnga\ProductsController@search_add_tyre');
	Route::post('/phangnga/search-delete-tyre','AdminPhangnga\ProductsController@search_delete_tyre');
});

/*Customer*/
Route::group(['prefix' => 'customer'], function(){

	Route::get('/','CustomerController@index')->name('customer.home');
	Route::get('/login','AuthCustomer\LoginController@ShowLoginForm')->name('customer.login');
    Route::post('/login','AuthCustomer\LoginController@login')->name('customer.login.submit');
	Route::post('/logout', 'AuthCustomer\LoginController@logout')->name('customer.logout');   
    Route::get('/changePassword','CustomerController@showChangePasswordForm');
  	Route::post('/changePassword','CustomerController@changePassword')->name('changePassword');
  	Route::get('/profile','CustomerController@profile');
	Route::post('/profile','CustomerController@update_profile');

	/*customer stock_main*/	
	Route::post('/stock-main/search','CustomerController@search_stock_main');
	Route::post('/stock-main/search-yokohama','CustomerController@search_yokohama_stock_main');
	Route::get('/stock-main/tyre','CustomerStockMain\ProductsController@product_tyre')->name('customer.home');

	/*customer khokkloi*/	
	Route::post('/khokkloi/search','CustomerController@search_khokkloi');
	Route::post('/khokkloi/search-yokohama','CustomerController@search_yokohama');
	Route::get('/khokkloi/tyre','CustomerKhokkloi\ProductsController@product_tyre')->name('customer.khokkloi');

	/*customer bypart*/	
	Route::post('/bypart/search','CustomerController@search_bypart');
	Route::get('/bypart/tyre','CustomerBypart\ProductsController@product_tyre');

	/*customer thaiwatsadu*/	
	Route::post('/thaiwatsadu/search','CustomerController@search_thaiwatsadu');
	Route::get('/thaiwatsadu/tyre','CustomerThaiwatsadu\ProductsController@product_tyre');

	/*customer chaofa*/	
	Route::post('/chaofa/search','CustomerController@search_chaofa');
	Route::get('/chaofa/tyre','CustomerChaofa\ProductsController@product_tyre');

	/*customer thalang*/	
	Route::post('/thalang/search','CustomerController@search_thalang');
	Route::get('/thalang/tyre','CustomerThalang\ProductsController@product_tyre');

	/*customer phangnga*/	
	Route::post('/phangnga/search','CustomerController@search_phangnga');
	Route::get('/phangnga/tyre','CustomerPhangnga\ProductsController@product_tyre');

	// Customer stock-amount
	Route::get('/stock-amount','CustomerController@stockAmount');
});