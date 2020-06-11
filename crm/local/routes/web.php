<?php
// User Registration and Login and Forget Password
Auth::routes();
Route::get('/','Auth\LoginController@showLoginForm');
Route::get('checkOtp','SmsController@ChkOtp');
Route::post('SendRegisterOtp','SmsController@SendRegisterOtp');
Route::get('SendRegisterOtp','SmsController@shRegisterOtp');
Route::get('CheckRegisterOtp','SmsController@ShowRegisterOtp');
Route::post('CheckRegisterOtp','SmsController@CheckRegisterOtp');
Route::get('PostRegister','SmsController@PostRegister');
Route::post('PostRegister','SmsController@CompleteRegister');
Route::post('checkOtp','SmsController@otp');
Route::get('lock','PagesController@lock');
// Control Panel
Route::get('cp','PagesController@cp');
Route::get('cp/mailbox','PagesController@mailbox');
Route::get('cp/sentbox','PagesController@sentbox');
Route::get('cp/sendmail','PagesController@sendmail');
Route::get('cp/readmail','PagesController@readmail');
Route::get('cp/drafts','PagesController@drafts');
Route::get('cp/trash','PagesController@trash');
Route::get('cp/calender','PagesController@calender');
// Users
Route::get('cp/users/all','UserController@index');
Route::get('cp/users/user/{user}','UserController@show');
Route::post('cp/users/add','UserController@store');
Route::post('cp/users/changepass','UserController@changePassword');
Route::get('cp/users/{user}/edit','UserController@edit');
Route::post('cp/users/update/{user}','UserController@update');
Route::get('cp/users/delete/{user}','UserController@destroy');
Route::post('cp/users/upload/avatar/{user}','UserController@avatarUpload');
// Roles
Route::get('cp/users/roles','RoleController@roles');
Route::post('cp/users/roles/add','RoleController@store');
Route::get('cp/users/roles/delete/{role}','RoleController@destroy');
Route::get('cp/users/roles/{role}/edit','RoleController@edit');
Route::post('cp/users/roles/update/{role}','RoleController@update');
// Permissions
Route::get('cp/users/permissions','PermissionController@permissions');
Route::post('cp/users/permissions/add','PermissionController@store');
Route::get('cp/users/permissions/delete/{permission}','PermissionController@destroy');
Route::post('cp/users/permissions/update/{permission}','PermissionController@update');
// Customers Scores
Route::get('cp/scores/off','OffController@index');
Route::get('cp/scores/pishnahad','OffController@pish');
Route::post('cp/scores/off/add','OffController@MakeOff');
Route::post('cp/scores/pishnahad/add','OffController@MakePish');
Route::post('cp/scores/off/{id}/edit','OffController@UpdateTakhfif');
Route::post('cp/scores/pishnahad/{id}/edit','OffController@UpdatePishnahad');
Route::post('cp/scores/off/delete/{id}','OffController@DeleteTakhfif');
Route::post('cp/scores/pishnahad/delete/{id}','OffController@DeletePishnahad');
Route::get('cp/users/permissions/delete/{permission}','PermissionController@destroy');
Route::post('cp/getSubCat','OffController@getSubCategory');
Route::get('cp/sales/','SaleController@index');
// Customers
Route::get('cp/customers/all','CustomerController@all');
Route::get('cp/customers/{id}','CustomerController@show');
Route::post('cp/customers/{id}/edit','CustomerController@update');
Route::post('cp/customers/{id}/delete','CustomerController@destroy');
Route::get('cp/customers/groups/all','CustomerController@allGroups')->name('allGroups');
Route::post('cp/customers/groups/add','CustomerController@addGroup')->name('addGroup');
Route::get('cp/customers/groups/delete/{id}','CustomerController@delGroup');
Route::get('cp/customers/scores','CustomerController@scores');
Route::get('cp/customers/addFromAPI','CustomerController@addFromAPI');
Route::get('cp/customers/settings','CustomerController@settings');
Route::get('cp/reports/sales','ReportController@sales');
Route::get('cp/sale/{facId}','ReportController@ShowFactor');
Route::get('cp/reports/nextcustomers','ReportController@nextCustomers');
Route::get('cp/reports/online','ReportController@online');
Route::get('cp/contacts/texts','ContactController@texts');
Route::post('cp/texts/sendToANumber','ContactController@sendToANumber');
Route::post('cp/texts/sendToACustomer','ContactController@sendToACustomer');
Route::post('cp/texts/sendToCustomersGroup','ContactController@sendToCustomersGroup');
Route::post('cp/texts/sendToAEmployeer','ContactController@sendToAEmployeer');
Route::post('cp/texts/sendToEmployeersGroup','ContactController@sendToEmployeersGroup');
Route::get('cp/contacts/faxs','ContactController@fax');
// Products
Route::get('cp/products/all','ProductController@all');
Route::get('cp/products/hp','ProductController@HyperProduct');
Route::get('cp/products','CRM\ProductController@products');
// Excel Routes
Route::get('export', 'ExcelController@export')->name('export');
Route::get('excel', 'ExcelController@importExportView');
Route::post('import', 'ExcelController@import')->name('import');
Route::get('p-export', 'ExcelController@productExport')->name('p-export');
Route::get('s-export', 'ExcelController@SaleExport')->name('s-export');
Route::post('p-import', 'ExcelController@productImport')->name('p-import');
Route::get('hp-export', 'ExcelController@HyperProductExport')->name('hp-export');
Route::get('customer-export', 'ExcelController@HyperProductExport')->name('customer-export');
Route::post('hp-import', 'ExcelController@HyperProductImport')->name('hp-import');
Route::post('customer-import', 'ExcelController@HyperProductImport')->name('customer-import');
// Cash
Route::get('cp/cash','CashController@index');
Route::post('cp/cash/search','CashController@search');
Route::post('cp/cash/add','CashController@add');
Route::get('cp/cash/all','CashController@all');
Route::post('cp/cash/customer/add','CashController@customerAdd');
