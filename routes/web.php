<?php

Auth::routes();

/*Master*/
Route::group(['middleware' => ['auth']], function () {
	Route::post('/master/post','MasterController@post');

	Route::get('/master/changePassword','MasterController@showChangePasswordForm');
	Route::post('/master/changePassword','MasterController@changePassword')->name('changePassword');
	Route::get('/master/profile','MasterController@profile');
	Route::post('/master/profile','MasterController@update_profile');

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

	/*master khokkloi*/	
	Route::post('/master/khokkloi/search','MasterController@search_khokkloi');
	Route::get('/master/khokkloi/warehouse','Khokkloi\ProductsController@warehouse');
	Route::get('/master/khokkloi/create-tyre','Khokkloi\ProductsController@create_tyre');
	Route::post('/master/khokkloi/create-tyre','Khokkloi\ProductsController@createtyre');
	Route::get('/master/khokkloi/create-max','Khokkloi\ProductsController@create_max');
	Route::get('/master/khokkloi/create-oil','Khokkloi\ProductsController@create_oil');
	Route::get('/master/khokkloi/create-battery','Khokkloi\ProductsController@create_battery');
	Route::get('/master/khokkloi/create-brake','Khokkloi\ProductsController@create_brake');
	Route::get('/master/khokkloi/create-shock','Khokkloi\ProductsController@create_shock');
	Route::get('/master/khokkloi/create-accessory','Khokkloi\ProductsController@create_accessory');

	Route::get('/master/khokkloi/tyre','Khokkloi\ProductsController@product_tyre')->name('home');
	Route::get('/master/khokkloi/edit/{id}', 'Khokkloi\ProductsController@edit_tyre');
	Route::post('/master/khokkloi/update-tyre','Khokkloi\ProductsController@update_tyre');
	Route::get('/master/khokkloi/max','Khokkloi\ProductsController@product_max');
	Route::get('/master/khokkloi/oil','Khokkloi\ProductsController@product_oil');
	Route::get('/master/khokkloi/battery','Khokkloi\ProductsController@product_battery');
	Route::get('/master/khokkloi/brake','Khokkloi\ProductsController@product_brake');
	Route::get('/master/khokkloi/shock','Khokkloi\ProductsController@product_shock');
	Route::get('/master/khokkloi/accessory','Khokkloi\ProductsController@product_accessory');

	/*master bypart*/	
	Route::post('/master/bypart/search','MasterController@search_bypart');
	Route::get('/master/bypart/warehouse','Bypart\ProductsController@warehouse');
	Route::get('/master/bypart/create-tyre','Bypart\ProductsController@create_tyre');
	Route::post('/master/bypart/create-tyre','Bypart\ProductsController@createtyre');
	Route::get('/master/bypart/create-max','Bypart\ProductsController@create_max');
	Route::get('/master/bypart/create-oil','Bypart\ProductsController@create_oil');
	Route::get('/master/bypart/create-battery','Bypart\ProductsController@create_battery');
	Route::get('/master/bypart/create-brake','Bypart\ProductsController@create_brake');
	Route::get('/master/bypart/create-shock','Bypart\ProductsController@create_shock');
	Route::get('/master/bypart/create-accessory','Bypart\ProductsController@create_accessory');

	Route::get('/master/bypart/tyre','Bypart\ProductsController@product_tyre');
	Route::get('/master/bypart/edit/{id}', 'Bypart\ProductsController@edit_tyre');
	Route::post('/master/bypart/update-tyre','Bypart\ProductsController@update_tyre');
	Route::get('/master/bypart/max','Bypart\ProductsController@product_max');
	Route::get('/master/bypart/oil','Bypart\ProductsController@product_oil');
	Route::get('/master/bypart/battery','Bypart\ProductsController@product_battery');
	Route::get('/master/bypart/brake','Bypart\ProductsController@product_brake');
	Route::get('/master/bypart/shock','Bypart\ProductsController@product_shock');
	Route::get('/master/bypart/accessory','Bypart\ProductsController@product_accessory');

	/*master thaiwatsadu*/	
	Route::post('/master/thaiwatsadu/search','MasterController@search_thaiwatsadu');
	Route::get('/master/thaiwatsadu/warehouse','Thaiwatsadu\ProductsController@warehouse');
	Route::get('/master/thaiwatsadu/create-tyre','Thaiwatsadu\ProductsController@create_tyre');
	Route::post('/master/thaiwatsadu/create-tyre','Thaiwatsadu\ProductsController@createtyre');
	Route::get('/master/thaiwatsadu/create-max','Thaiwatsadu\ProductsController@create_max');
	Route::get('/master/thaiwatsadu/create-oil','Thaiwatsadu\ProductsController@create_oil');
	Route::get('/master/thaiwatsadu/create-battery','Thaiwatsadu\ProductsController@create_battery');
	Route::get('/master/thaiwatsadu/create-brake','Thaiwatsadu\ProductsController@create_brake');
	Route::get('/master/thaiwatsadu/create-shock','Thaiwatsadu\ProductsController@create_shock');
	Route::get('/master/thaiwatsadu/create-accessory','Thaiwatsadu\ProductsController@create_accessory');

	Route::get('/master/thaiwatsadu/tyre','Thaiwatsadu\ProductsController@product_tyre');
	Route::get('/master/thaiwatsadu/edit/{id}', 'Thaiwatsadu\ProductsController@edit_tyre');
	Route::post('/master/thaiwatsadu/update-tyre','Thaiwatsadu\ProductsController@update_tyre');
	Route::get('/master/thaiwatsadu/max','Thaiwatsadu\ProductsController@product_max');
	Route::get('/master/thaiwatsadu/oil','Thaiwatsadu\ProductsController@product_oil');
	Route::get('/master/thaiwatsadu/battery','Thaiwatsadu\ProductsController@product_battery');
	Route::get('/master/thaiwatsadu/brake','Thaiwatsadu\ProductsController@product_brake');
	Route::get('/master/thaiwatsadu/shock','Thaiwatsadu\ProductsController@product_shock');
	Route::get('/master/thaiwatsadu/accessory','Thaiwatsadu\ProductsController@product_accessory');

	/*master chaofa*/	
	Route::post('/master/chaofa/search','MasterController@search_chaofa');
	Route::get('/master/chaofa/warehouse','Chaofa\ProductsController@warehouse');
	Route::get('/master/chaofa/create-tyre','Chaofa\ProductsController@create_tyre');
	Route::post('/master/chaofa/create-tyre','Chaofa\ProductsController@createtyre');
	Route::get('/master/chaofa/create-max','Chaofa\ProductsController@create_max');
	Route::get('/master/chaofa/create-oil','Chaofa\ProductsController@create_oil');
	Route::get('/master/chaofa/create-battery','Chaofa\ProductsController@create_battery');
	Route::get('/master/chaofa/create-brake','Chaofa\ProductsController@create_brake');
	Route::get('/master/chaofa/create-shock','Chaofa\ProductsController@create_shock');
	Route::get('/master/chaofa/create-accessory','Chaofa\ProductsController@create_accessory');

	Route::get('/master/chaofa/tyre','Chaofa\ProductsController@product_tyre');
	Route::get('/master/chaofa/edit/{id}', 'Chaofa\ProductsController@edit_tyre');
	Route::post('/master/chaofa/update-tyre','Chaofa\ProductsController@update_tyre');
	Route::get('/master/chaofa/max','Chaofa\ProductsController@product_max');
	Route::get('/master/chaofa/oil','Chaofa\ProductsController@product_oil');
	Route::get('/master/chaofa/battery','Chaofa\ProductsController@product_battery');
	Route::get('/master/chaofa/brake','Chaofa\ProductsController@product_brake');
	Route::get('/master/chaofa/shock','Chaofa\ProductsController@product_shock');
	Route::get('/master/chaofa/accessory','Chaofa\ProductsController@product_accessory');

	/*master thalang*/	
	Route::post('/master/thalang/search','MasterController@search_thalang');
	Route::get('/master/thalang/warehouse','Thalang\ProductsController@warehouse');
	Route::get('/master/thalang/create-tyre','Thalang\ProductsController@create_tyre');
	Route::post('/master/thalang/create-tyre','Thalang\ProductsController@createtyre');
	Route::get('/master/thalang/create-max','Thalang\ProductsController@create_max');
	Route::get('/master/thalang/create-oil','Thalang\ProductsController@create_oil');
	Route::get('/master/thalang/create-battery','Thalang\ProductsController@create_battery');
	Route::get('/master/thalang/create-brake','Thalang\ProductsController@create_brake');
	Route::get('/master/thalang/create-shock','Thalang\ProductsController@create_shock');
	Route::get('/master/thalang/create-accessory','Thalang\ProductsController@create_accessory');

	Route::get('/master/thalang/tyre','Thalang\ProductsController@product_tyre');
	Route::get('/master/thalang/edit/{id}', 'Thalang\ProductsController@edit_tyre');
	Route::post('/master/thalang/update-tyre','Thalang\ProductsController@update_tyre');
	Route::get('/master/thalang/max','Thalang\ProductsController@product_max');
	Route::get('/master/thalang/oil','Thalang\ProductsController@product_oil');
	Route::get('/master/thalang/battery','Thalang\ProductsController@product_battery');
	Route::get('/master/thalang/brake','Thalang\ProductsController@product_brake');
	Route::get('/master/thalang/shock','Thalang\ProductsController@product_shock');
	Route::get('/master/thalang/accessory','Thalang\ProductsController@product_accessory');

});


/*Admin*/
Route::group(['prefix' => 'admin'], function(){

	Route::get('/','AdminController@index')->name('admin.home');
	Route::get('/login','AuthAdmin\LoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');    
  	Route::get('/changePassword','AdminController@showChangePasswordForm');
  	Route::post('/changePassword','AdminController@changePassword')->name('changePassword');
	Route::get('/profile','AdminController@profile');
	Route::post('/profile','AdminController@update_profile');
	Route::post('/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');   

	/*admin khokkloi*/	
	Route::post('/khokkloi/search','AdminController@search_khokkloi');
	Route::get('/khokkloi/warehouse','AdminKhokkloi\ProductsController@warehouse');
	Route::get('/khokkloi/tyre','AdminKhokkloi\ProductsController@product_tyre')->name('home');
	Route::get('/khokkloi/edit/{id}', 'AdminKhokkloi\ProductsController@edit_tyre');
	Route::post('/khokkloi/update-tyre','AdminKhokkloi\ProductsController@update_tyre');
	Route::get('/khokkloi/max','AdminKhokkloi\ProductsController@product_max');
	Route::get('/khokkloi/oil','AdminKhokkloi\ProductsController@product_oil');
	Route::get('/khokkloi/battery','AdminKhokkloi\ProductsController@product_battery');
	Route::get('/khokkloi/brake','AdminKhokkloi\ProductsController@product_brake');
	Route::get('/khokkloi/shock','AdminKhokkloi\ProductsController@product_shock');
	Route::get('/khokkloi/accessory','AdminKhokkloi\ProductsController@product_accessory');

	/*admin bypart*/
	Route::post('/bypart/search','AdminController@search_bypart');	
	Route::get('/bypart/warehouse','AdminBypart\ProductsController@warehouse');
	Route::get('/bypart/tyre','AdminBypart\ProductsController@product_tyre');
	Route::get('/bypart/edit/{id}', 'AdminBypart\ProductsController@edit_tyre');
	Route::post('/bypart/update-tyre','AdminBypart\ProductsController@update_tyre');
	Route::get('/bypart/max','AdminBypart\ProductsController@product_max');
	Route::get('/bypart/oil','AdminBypart\ProductsController@product_oil');
	Route::get('/bypart/battery','AdminBypart\ProductsController@product_battery');
	Route::get('/bypart/brake','AdminBypart\ProductsController@product_brake');
	Route::get('/bypart/shock','AdminBypart\ProductsController@product_shock');
	Route::get('/bypart/accessory','AdminBypart\ProductsController@product_accessory');

	/*admin thaiwatsadu*/
	Route::post('/thaiwatsadu/search','AdminController@search_thaiwatsadu');	
	Route::get('/thaiwatsadu/warehouse','AdminThaiwatsadu\ProductsController@warehouse');
	Route::get('/thaiwatsadu/tyre','AdminThaiwatsadu\ProductsController@product_tyre');
	Route::get('/thaiwatsadu/edit/{id}', 'AdminThaiwatsadu\ProductsController@edit_tyre');
	Route::post('/thaiwatsadu/update-tyre','AdminThaiwatsadu\ProductsController@update_tyre');
	Route::get('/thaiwatsadu/max','AdminThaiwatsadu\ProductsController@product_max');
	Route::get('/thaiwatsadu/oil','AdminThaiwatsadu\ProductsController@product_oil');
	Route::get('/thaiwatsadu/battery','AdminThaiwatsadu\ProductsController@product_battery');
	Route::get('/thaiwatsadu/brake','AdminThaiwatsadu\ProductsController@product_brake');
	Route::get('/thaiwatsadu/shock','AdminThaiwatsadu\ProductsController@product_shock');
	Route::get('/thaiwatsadu/accessory','AdminThaiwatsadu\ProductsController@product_accessory');

	/*admin chaofa*/
	Route::post('/chaofa/search','AdminController@search_chaofa');	
	Route::get('/chaofa/warehouse','AdminChaofa\ProductsController@warehouse');
	Route::get('/chaofa/tyre','AdminChaofa\ProductsController@product_tyre');
	Route::get('/chaofa/edit/{id}', 'AdminChaofa\ProductsController@edit_tyre');
	Route::post('/chaofa/update-tyre','AdminChaofa\ProductsController@update_tyre');
	Route::get('/chaofa/max','AdminChaofa\ProductsController@product_max');
	Route::get('/chaofa/oil','AdminChaofa\ProductsController@product_oil');
	Route::get('/chaofa/battery','AdminChaofa\ProductsController@product_battery');
	Route::get('/chaofa/brake','AdminChaofa\ProductsController@product_brake');
	Route::get('/chaofa/shock','AdminChaofa\ProductsController@product_shock');
	Route::get('/chaofa/accessory','AdminChaofa\ProductsController@product_accessory');

	/*admin thalang*/	
	Route::post('/thalang/search','AdminController@search_thalang');
	Route::get('/thalang/warehouse','AdminThalang\ProductsController@warehouse');
	Route::get('/thalang/tyre','AdminThalang\ProductsController@product_tyre');
	Route::get('/thalang/edit/{id}', 'AdminThalang\ProductsController@edit_tyre');
	Route::post('/thalang/update-tyre','AdminThalang\ProductsController@update_tyre');
	Route::get('/thalang/max','AdminThalang\ProductsController@product_max');
	Route::get('/thalang/oil','AdminThalang\ProductsController@product_oil');
	Route::get('/thalang/battery','AdminThalang\ProductsController@product_battery');
	Route::get('/thalang/brake','AdminThalang\ProductsController@product_brake');
	Route::get('/thalang/shock','AdminThalang\ProductsController@product_shock');
	Route::get('/thalang/accessory','AdminThalang\ProductsController@product_accessory');
		
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

	/*customer khokkloi*/	
	Route::post('/khokkloi/search','CustomerController@search_khokkloi');
	Route::get('/khokkloi/tyre','CustomerKhokkloi\ProductsController@product_tyre')->name('home');

	/*customer bypart*/	
	Route::post('/bypart/search','CustomerController@search_bypart');
	Route::get('/bypart/tyre','CustomerBypart\ProductsController@product_tyre')->name('home');

	/*customer thaiwatsadu*/	
	Route::post('/thaiwatsadu/search','CustomerController@search_thaiwatsadu');
	Route::get('/thaiwatsadu/tyre','CustomerThaiwatsadu\ProductsController@product_tyre')->name('home');

	/*customer chaofa*/	
	Route::post('/chaofa/search','CustomerController@search_chaofa');
	Route::get('/chaofa/tyre','CustomerChaofa\ProductsController@product_tyre')->name('home');

	/*customer thalang*/	
	Route::post('/thalang/search','CustomerController@search_thalang');
	Route::get('/thalang/tyre','CustomerThalang\ProductsController@product_tyre')->name('home');
});