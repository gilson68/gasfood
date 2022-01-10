<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

            /**
             * ROUTE PÁGINA INICIAL
             */
            Route::get('/', 'PlanController@index')->name('admin.index');

            /**
             * ROUTES PLANS
             */
            Route::any   ('plans/search',    'PlanController@search') ->name('plans.search');
            Route::get   ('plans',           'PlanController@index')  ->name('plans.index');
            Route::get   ('plans/create',    'PlanController@create') ->name('plans.create');
            Route::get   ('plans/{url}',     'PlanController@show')   ->name('plans.show');
            Route::get   ('plans/{url}/edit','PlanController@edit')   ->name('plans.edit');
            Route::put   ('plans/{url}',     'PlanController@update') ->name('plans.update');
            Route::post  ('plans/store',     'PlanController@store')  ->name('plans.store');
            Route::delete('plans/{url}',     'PlanController@destroy')->name('plans.destroy');

            /**
             * ROUTES DETAILPLANS
             */
            Route::get   ('plans/{url}/details',                 'DetailPlanController@index')  ->name('details.plan.index');
            Route::get   ('plans/{url}/details/create',          'DetailPlanController@create') ->name('details.plan.create');
            Route::get   ('plans/{url}/details/{idDetail}',      'DetailPlanController@show')   ->name('details.plan.show');
            Route::get   ('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')   ->name('details.plan.edit');
            Route::put   ('plans/{url}/details/{idDetail}',      'DetailPlanController@update') ->name('details.plan.update');
            Route::post  ('plans/{url}/details',                 'DetailPlanController@store')  ->name('details.plan.store');
            Route::delete('plans/{url}/details/{idDetail}',      'DetailPlanController@destroy')->name('details.plan.destroy');

            /**
             * ROUTES PERMISSIONS
             */
            Route::any   ('permissions/search',    'ACL\PermissionController@search') ->name('permissions.search');
            Route::get   ('permissions',           'ACL\PermissionController@index')  ->name('permissions.index');
            Route::get   ('permissions/create',    'ACL\PermissionController@create') ->name('permissions.create');
            Route::get   ('permissions/{id}',      'ACL\PermissionController@show')   ->name('permissions.show');
            Route::get   ('permissions/{id}/edit', 'ACL\PermissionController@edit')   ->name('permissions.edit');
            Route::put   ('permissions/{id}',      'ACL\PermissionController@update') ->name('permissions.update');
            Route::post  ('permissions',           'ACL\PermissionController@store')  ->name('permissions.store');
            Route::delete('permissions/{id}',      'ACL\PermissionController@destroy')->name('permissions.destroy');

            /**
             * ROUTES PROFILES
             */
            Route::any   ('profiles/search',   'ACL\ProfileController@search') ->name('profiles.search');
            Route::get   ('profiles',          'ACL\ProfileController@index')  ->name('profiles.index');
            Route::get   ('profiles/create',   'ACL\ProfileController@create') ->name('profiles.create');
            Route::get   ('profiles/{id}',     'ACL\ProfileController@show')   ->name('profiles.show');
            Route::get   ('profiles/{id}/edit','ACL\ProfileController@edit')   ->name('profiles.edit');
            Route::put   ('profiles/{id}',     'ACL\ProfileController@update') ->name('profiles.update');
            Route::post  ('profiles',          'ACL\ProfileController@store')  ->name('profiles.store');
            Route::delete('profiles/{id}',     'ACL\ProfileController@destroy')->name('profiles.destroy');

            /**
             * ROUTES PLANS x PROFILES
             */
            Route::any ('plans/{id}/profiles',                    'ACL\PlanProfileController@profilesAvailable') ->name('plans.profiles.available');
            Route::get ('profiles/{id}/plans',                    'ACL\PlanProfileController@plans')             ->name('profiles.plans');
            Route::get ('plans/{id}/profile',                     'ACL\PlanProfileController@profiles')          ->name('plans.profiles');
            Route::get ('plans/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilesPlan')->name('plans.profiles.detach');
            Route::post('plans/{id}/profiles',                    'ACL\PlanProfileController@attachProfilesPlan')->name('plans.profiles.attach');

            /**
             * ROUTES PERMISSIONS x PROFILES
             */
            Route::any ('profiles/{id}/permissions/create',                'ACL\PermissionProfileController@permissionsAvailable')    ->name('profiles.permissions.available');
            Route::get ('permissions/{id}/profiles',                       'ACL\PermissionProfileController@profiles')                ->name('permissions.profiles');
            Route::get ('profiles/{id}/permissions',                       'ACL\PermissionProfileController@permissions')             ->name('profiles.permissions');
            Route::get ('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
            Route::post('profiles/{id}/permissions',                       'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        });

Route::get('/', function () {
    return view('welcome');
});
