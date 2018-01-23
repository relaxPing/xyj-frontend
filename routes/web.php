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

Route::get('/', function () {
    return view('welcome');
});

//运单管理 6个不同tab对应的状态
//留：后面整合时候弄成group
Route::any('yundanManagementS1',['uses'=>'YundanController@yundanManagementS1']);
Route::any('yundanManagementS2',['uses'=>'YundanController@yundanManagementS2']);
Route::any('yundanManagementS3',['uses'=>'YundanController@yundanManagementS3']);
Route::any('yundanManagementS4',['uses'=>'YundanController@yundanManagementS4']);
Route::any('yundanManagementS5',['uses'=>'YundanController@yundanManagementS5']);
Route::any('yundanManagementS6',['uses'=>'YundanController@yundanManagementS6']);
//创建运单
Route::any('createYundan',['uses'=>'YundanController@createYundan']);
//充值记录
Route::any('recordMoneyIn',['uses'=>'RecordsController@recordMoneyIn']);
//选择地址（下单时的导入）
Route::any('addressSelect',['uses'=>'AddressController@addressSelect']);
//地址簿
Route::any('addressManagement',['uses'=>'AddressController@addressManagement']);
//地址修改
Route::any('addressEdit/{addid}',['uses'=>'AddressController@addressEdit']);
//地址删除
Route::any('addressDelete/{addid}',['uses'=>'AddressController@addressDelete']);
//会员资料
Route::any('memberDetail',['uses'=>'MemberController@memberDetail']);
