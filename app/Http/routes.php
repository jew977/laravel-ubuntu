<?php

Route::resource('/','AdminController');
Route::resource('/user','UserController');
Route::resource('/team','TeamController');
Route::resource('/domain','DomainController');
Route::resource('/domainRegister','DomainregController');
Route::resource('/role', 'RoleController');
Route::resource('/permission', 'PermissionController');
//Route::post('/role_permission', 'RoleController@role_permission');
Route::get('/domain_use','DomainController@domain_use');
Route::get('/domain_zwuse','DomainController@domain_zwuse');
Route::get('/domain_beian','DomainController@domain_beian');
Route::get('/domain_deadtime','DomainController@domain_deadtime');
Route::post('/search','DomainController@postSearch');
Route::get('/control','DomainController@showHome');
Route::get('/login','UserController@getLogin');
Route::post('/login','UserController@postLogin');
Route::get('/loginout','UserController@Loginout');
//Route::get('/user/register','UserController@getRegsiter');
Route::post('/user/register','UserController@postRegister');

Route::get('/team/{id}/domainfo_use', 'TeamController@domainifo_use');
Route::get('/team/{id}/domainfo_nouse', 'TeamController@domainifo_nouse');
Route::get('/team/{id}/domainfo_beian', 'TeamController@domainfo_beian');
Route::get('/team/{id}/domainfo_deadline', 'TeamController@domainfo_deadline');
