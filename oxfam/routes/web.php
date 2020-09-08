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





Route::group(['middleware' => ['web']], function () {


    Route::get('/login',[
        'uses' => 'AdminController@getUserLogin',
        'as'  => 'user-login'
    ]);

    Route::post('/post-login',[
        'uses' => 'AdminController@getUserPostLogin',
        'as'  => 'user.post.login'
    ]);


    Route::post('/create-user',[
        'uses' => 'AdminController@getUserCreatePost',
        'as'  => 'user.create'
    ]);
});

Route::group(['middleware'=>'officer'],function () {
    Route::get('/',[
        'uses'=>'AdminController@getDashboard',
        'as' => 'dashboard',
    ]);
    Route::get('/report2',[
        'uses'=>'AdminController@get_view_two',
        'as' => 'view-two',
    ]);
    Route::get('/data_table_two',[
        'uses'=>'AdminController@getData_table_two',
    ]);
    Route::get('/beneficiary/info/{beneficiaryID}','AdminController@getBeneficiaryInfo');
    Route::post('/beneficiary/updateBeneficiaryInfo','AdminController@updateBeneficiaryInfo');
    Route::post('/beneficiary/storeBeneficiaryInfo','AdminController@storeBeneficiaryInfo');
    Route::get('/beneficiary/delete/{id}','AdminController@deleteBeneficiary');
    Route::get('/address/getAreas/{id}','AdminController@getAddressAreas');
    Route::get('/area/getSections/{id}','AdminController@getAreaSections');
    Route::get('logout',[
        'uses' => 'AdminController@getLogout',
        'as' => 'logout',
    ]);
});


Route::group(['middleware'=>'admin'],function (){


    Route::get('/data_table_one',[
        'uses'=>'AdminController@getData_table_one',
    ]);

Route::get('/vendor/areas/{vendorID}','AdminController@getVendorAreas');

Route::get('/allVendors',[
    'uses'=>'AdminController@getAllVendors',
]);

Route::get('/allOfficers',[
    'uses'=>'AdminController@getAllOfficers',
]);

Route::get('/allAddresses',[
    'uses'=>'AdminController@getAllAddresses',
]);

Route::get('/allAreas',[
    'uses'=>'AdminController@getAllAreas',
]);

Route::get('/allSections',[
    'uses'=>'AdminController@getAllSections',
]);


    Route::get('/edit_section/{id}/{section}',[
        'uses'=>'AdminController@getEditSection',
        'as' => 'sec.edit',
    ]);

    Route::post('/storeNewVendor',[
        'uses' => 'AdminController@storeNewVendor',
        'as' => 'storeNewVendor'
    ]);

    Route::post('/storeNewOfficer',[
        'uses' => 'AdminController@storeNewOfficer',
        'as' => 'storeNewOfficer'
    ]);

    Route::post('/storeNewAddress',[
        'uses' => 'AdminController@storeNewAddress',
        'as' => 'storeNewAddress'
    ]);

    Route::post('/storeNewArea',[
        'uses' => 'AdminController@storeNewArea',
        'as' => 'storeNewArea'
    ]);

    Route::post('/storeNewSection',[
        'uses' => 'AdminController@storeNewSection',
        'as' => 'storeNewSection'
    ]);

    Route::post('/section-update',[
        'uses'=>'AdminController@getPostSectionUpdate',
        'as' => 'sec.update',
    ]);


Route::post('/updateVendorInfo','AdminController@updateVendorInfo');
Route::post('/updateOfficerInfo','AdminController@updateOfficerInfo');
Route::post('/updateAddressInfo','AdminController@updateAddressInfo');
Route::post('/updateAreaInfo','AdminController@updateAreaInfo');
Route::post('/updateSectionInfo','AdminController@updateSectionInfo');
Route::get('/deleteVendor/{vendorID}','AdminController@deleteVendor');
Route::get('/deleteOfficer/{officerID}','AdminController@deleteOfficer');
Route::get('/deleteAddress/{addressID}','AdminController@deleteAddress');
Route::get('/deleteArea/{areaID}','AdminController@deleteArea');
Route::get('/deleteSection/{sectionID}','AdminController@deleteSection');

Route::get('/adoptionBeneficiary','AdminController@adoptionBeneficiary');

Route::get('/getAreaAddress/{areaID}','AdminController@getAreaAddress');
Route::get('/getSectionArea/{sectionID}','AdminController@getSectionArea');


Route::get('/data_table_three',[
    'uses'=>'AdminController@getData_table_three',
]);

Route::get('/report3',[
    'uses'=>'AdminController@get_view_three',
    'as' => 'view-three',
]);

Route::get('/vendors',[
    'uses'=>'AdminController@get_vendors_view',
    'as' => 'view-four',
]);

Route::get('/fieldOfficers',[
    'uses'=>'AdminController@get_officers_view',
    'as' => 'view-five',
]);

Route::get('/addresses',[
    'uses'=>'AdminController@get_addresses_view',
    'as' => 'view-six',
]);

Route::get('/areas',[
    'uses'=>'AdminController@get_areas_view',
    'as' => 'view-seven',
]);

Route::get('/sections',[
    'uses'=>'AdminController@get_sections_view',
    'as' => 'view-eight',
]);

Route::get('/cards',[
    'uses'=>'AdminController@get_cards_view',
    'as' => 'view-nine',
]);

Route::get('/image','AdminController@image');
Route::get('/cards/export','AdminController@exportCards');

//Route::get('/report4',[
//    'uses'=>'AdminController@get_view_four',
//    'as' => 'view-four',
//]);

});



