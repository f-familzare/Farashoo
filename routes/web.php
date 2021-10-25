<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Site\SiteController@index')->name('site');
Route::group(['prefix' => 'farasho', 'namespace' => 'Panel', 'middleware' => 'auth'], function () {
    // Panel Routes
    Route::get('/', 'PanelController@index')->name('panel');

    // Account Routes
    Route::group(['prefix' => '/Account'], function () {
        Route::get('/', 'AccountController@index');
//        Route::get('/list', 'AccountController@list');
        Route::any('/store', 'AccountController@store');
        Route::get('/edit/{id}', 'AccountController@edit');
        Route::post('/update/{id}', 'AccountController@update');
        Route::get('/delete/{id}', 'AccountController@delete');
        Route::get('/accountStatus', 'AccountController@accountStatus');
    });

    // Rezume Routes
    Route::group(['prefix' => '/AddRezume'], function () {
        Route::get('/', 'RezumeController@index');
//        Route::get('/list', 'RezumeController@list');
        Route::any('/store', 'RezumeController@store');
        Route::get('/edit/{id}', 'RezumeController@edit');
        Route::post('/update/{id}', 'RezumeController@update');
        Route::get('/delete/{id}', 'RezumeController@delete');
        Route::get('/rezumeStatus', 'RezumeController@rezumeStatus');

    });
    // Skill Routes
    Route::group(['prefix' => '/Skill'], function () {
        Route::get('/', 'SkillController@index');
//        Route::get('/list', 'SkillController@list');
        Route::any('/store', 'SkillController@store');
        Route::get('/edit/{id}', 'SkillController@edit');
        Route::post('/update/{id}', 'SkillController@update');
        Route::delete('/delete/{id}', 'SkillController@delete');
    });

    // Academy Routes
    Route::group(['prefix' => '/Academy'], function () {
        Route::get('/', 'AcademyController@index');
//        Route::get('/list', 'AcademyController@list');
        Route::any('/store', 'AcademyController@store');
        Route::get('/edit/{id}', 'AcademyController@edit');
        Route::any('/update/{id}', 'AcademyController@update');
        Route::delete('/delete/{id}', 'AcademyController@delete');
    });

    // Language Routes
    Route::group(['prefix' => '/Language'], function () {
        Route::get('/', 'LanguageController@index');
//        Route::get('/list', 'LanguageController@list');
        Route::any('/store', 'LanguageController@store');
        Route::get('/edit/{id}', 'LanguageController@edit');
        Route::any('/update/{id}', 'LanguageController@update');
        Route::delete('/delete/{id}', 'LanguageController@delete');
    });

    // Software Routes
    Route::group(['prefix' => '/Software'], function () {
        Route::get('/', 'SoftwareController@index');
//        Route::get('/list', 'SoftwareController@list');
        Route::any('/store', 'SoftwareController@store');
        Route::get('/edit/{id}', 'SoftwareController@edit');
        Route::any('/update/{id}', 'SoftwareController@update');
        Route::delete('/delete/{id}', 'SoftwareController@delete');
    });
    // Job Routes
    Route::group(['prefix' => '/AddJob'], function () {
        Route::get('/', 'JobController@index');
//        Route::get('/list', 'JobController@list');
        Route::any('/store', 'JobController@store');
        Route::get('/edit/{id}', 'JobController@edit');
        Route::any('/update/{id}', 'JobController@update');
        Route::delete('/delete/{id}', 'JobController@delete');
    });

    // Business Routes
    Route::group(['prefix' => '/AddBusiness'], function () {
        Route::get('', 'BusinessController@index');
        Route::get('/list', 'BusinessController@list');
        Route::any('/store', 'BusinessController@store');
        Route::get('/edit/{id}', 'BusinessController@edit');
        Route::any('/update/{id}', 'BusinessController@update');
        Route::get('/destroy/{id}', 'BusinessController@destroy');
        Route::get('/BusinessStatus', 'BusinessController@BusinessStatus');
        Route::get('/acceptBusiness/', 'BusinessController@acceptBusiness');


    });


    // Academy Routes
    Route::group(['prefix' => '/Academy'], function () {
        Route::get('/', 'AcademyController@index');
//        Route::get('/list', 'AcademyController@list');
        Route::any('/store', 'AcademyController@store');
        Route::get('/edit/{id}', 'AcademyController@edit');
        Route::any('/update/{id}', 'AcademyController@update');
        Route::delete('/delete/{id}', 'AcademyController@delete');
    });


    // Option Routes
    Route::group(['prefix' => '/Option'], function () {
        Route::get('state', 'OptionController@state');
        Route::get('city/{state_id}', 'OptionController@city');
        Route::get('region/{city_id}', 'OptionController@region');
        Route::get('part/{region_id}', 'OptionController@part');
        Route::get('village/{part_id}', 'OptionController@village');
        Route::get('rural/{village_id}', 'OptionController@rural');
        Route::get('activity', 'OptionController@activity');
        Route::get('activityTime', 'OptionController@activityTime');
        Route::get('cooperation', 'OptionController@cooperation');
        Route::get('degreeOfEducation', 'OptionController@degreeOfEducation');
        Route::get('salary', 'OptionController@salary');
        Route::get('related', 'OptionController@related');
        Route::get('major', 'OptionController@major');
        Route::get('users', 'OptionController@users');
        Route::get('roles', 'OptionController@roles');
        Route::get('permission', 'OptionController@permission');
    });

    // Roles Route
    Route::group(['prefix' => '/Roles'], function () {
        Route::get('/list', 'RoleController@list');
        Route::any('/store', 'RoleController@store');
        Route::any('/storeRoleUser', 'RoleController@storeRoleUser');
        Route::get('/edit/{role}', 'RoleController@edit');
        Route::any('/update/{role}', 'RoleController@update');
        Route::get('/destroy/{role}', 'RoleController@destroy');
        Route::any('/changeRole/{id}', 'RoleController@changeRole');
    });

    // permission

    Route::group(['prefix' => '/Permission'], function () {
        Route::get('/list', 'PermissionController@list');
        Route::any('/store', 'PermissionController@store');
        Route::get('/edit/{permission}', 'PermissionController@edit');
        Route::any('/update/{permission}', 'PermissionController@update');
        Route::get('/destroy/{permission}', 'PermissionController@destroy');
    });

    // Slider

    Route::group(['prefix' => '/Slider'], function () {
        Route::get('/list', 'SliderController@list');
        Route::any('/store', 'SliderController@store');
        Route::get('/destroy/{id}', 'SliderController@destroy');
    });

    // Setting

    Route::group(['prefix' => '/Setting'], function () {
        Route::get('/list', 'SettingController@list');
        Route::get('/logo', 'SettingController@logo');
        Route::get('/edit/{id}', 'SettingController@edit');
        Route::any('/update/{id}', 'SettingController@logoUpdate');
    });


    Route::get('/AddRezume', 'JobController@index');
    Route::get('/AddJob', 'JobController@index');
    Route::get('/BusinessRequest', 'BusinessController@index');
    Route::get('/RequestResult', 'BusinessController@index');
    Route::get('/DefineRole', 'BusinessController@index');


});

Route::group(['namespace' => 'Site', 'prefix' => 'farasho'], function () {
    Route::get('/SingleRezume/{id}', 'SiteController@SingleRezume');
    Route::get('/RezumeList', 'SiteController@RezumeList');
    Route::get('/SingleBusiness/{id}', 'SiteController@SingleBusiness');
    Route::get('/BusinessList', 'SiteController@BusinessList');
    Route::get('/Support', 'SiteController@Support');
    Route::get('/Extra', 'SiteController@Extra');

});

Route::group(['prefix' => 'farasho', 'namespace' => 'Panel'], function () {

    Route::get('/Account/list', 'AccountController@list');
    Route::get('/AddRezume/list', 'RezumeController@list');
    Route::get('/AddBusiness/acceptedList', 'BusinessController@acceptedList');
    Route::get('/Skill/list', 'SkillController@list');
    Route::get('/Software/list', 'SoftwareController@list');
    Route::get('/Language/list', 'LanguageController@list');
    Route::get('/Academy/list', 'AcademyController@list');
    Route::get('/AddJob/list', 'JobController@list');
//    Route::get('/AddJob/list/{id}', 'JobController@list');

    // Contact Form Routes
    Route::group(['prefix' => '/Contact'], function () {
        Route::get('/', 'ContactFormController@index');
        Route::get('/list', 'ContactFormController@list');
        Route::any('/store', 'ContactFormController@store');
        Route::get('/show/{id}', 'ContactFormController@show');
//        Route::delete('/delete/{id}', 'ContactFormController@delete');
    });


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

