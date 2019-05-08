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

/**
 * Просто страницы
 */
Route::prefix('free_page')->group(function () {
    Route::get('page_1', ['uses'=>'MyFreeController@page_1','as'=>'free_page_1']);
});

Route::get('home', ['uses'=>'MyMainController@index','as'=>'home']);
Route::get('page_user_alert', ['uses'=>'RedirectController@page_user_alert','as'=>'page-user-alert']);
Route::get('page_gate_alert', ['uses'=>'RedirectController@page_gate_alert','as'=>'page-gate-alert']);


Route::get('/', ['uses'=>'Landing\LandingController@index', 'as'=>'Landing']);
Route::get('/about', ['uses'=>'Landing\LandingController@about', 'as'=>'landing-about']);
Route::get('/services', ['uses'=>'Landing\LandingController@services', 'as'=>'landing-services']);
Route::get('/contact', ['uses'=>'Landing\LandingController@contact', 'as'=>'landing-contact']);
Route::get('page', ['uses'=>'MyMainController@page','as'=>'page']);

Route::get('page_home', ['uses'=>'PRO\HomeController@page_home','as'=>'page-home']);
Route::get('page_language', ['uses'=>'PRO\HomeController@page_language','as'=>'page-language']);
Route::post('page_language_update', ['uses'=>'PRO\HomeController@page_language_update','as'=>'page-language-update']);
Route::get('page_profile', ['uses'=>'Page\PageController@page_profile','as'=>'page-profile']);

Route::get('page_firms', ['uses'=>'Page\PageController@page_firms','as'=>'page-firms']);
Route::get('view_type_update/{type}', ['uses'=>'Page\PageController@view_type_update','as'=>'view-type-update']);
Route::get('/downloadAll', ['uses'=>'Page\PageController@downloadAll', 'as'=>'downloadAll']);
Route::get('page_all_firms', ['uses'=>'Page\PageController@page_all_firms','as'=>'page-all-firms']);
Route::get('select_selected_firm', ['uses'=>'Page\PageController@select_selected_firm','as'=>'select-selected-firm']);
Route::post('selected_firms_update', ['uses'=>'Page\PageController@selected_firms_update','as'=>'selected-firms-update']);
Route::get('full_progress_map', ['uses'=>'Page\FullProgressMapController@full_progress_map','as'=>'full-progress-map']);
Route::get('full_progress_map_1', ['uses'=>'Page\FullProgressMapController@full_progress_map_1','as'=>'full-progress-map-1']);
Route::get('full_progress_map_2', ['uses'=>'Page\FullProgressMapController@full_progress_map_2','as'=>'full-progress-map-2']);
Route::get('full_progress_map_3', ['uses'=>'Page\FullProgressMapController@full_progress_map_3','as'=>'full-progress-map-3']);
Route::delete('full_progress_map_delete/{id}', ['uses'=>'Page\FullProgressMapController@full_progress_map_destroy','as'=>'full-progress-map-delete']);
Route::get('get_pro_statuss', ['uses'=>'Page\PageController@get_pro_statuss','as'=>'get-pro-statuss']);
Route::get('credit_card_form', ['uses'=>'Page\PageController@credit_card_form','as'=>'credit-card-form']);


Route::get('/page', ['uses'=>'Page\PageController@page_1','as'=>'page-1']);
Route::get('/page/{sub}', ['uses'=>'Page\PageController@page_1_1','as'=>'page-1-1']);

Route::get('/my_page/my_route', ['uses'=>'Page\PageController@my_route','as'=>'my_route']);

Route::get('page_main', ['uses'=>'Page\PageController@page_main','as'=>'page-main']);
Route::get('page_models', ['uses'=>'Page\PageController@page_models','as'=>'page-models']);
Route::get('page_models_cat/{cat}', ['uses'=>'Page\PageController@page_models_cat','as'=>'page-models-cat']);

Route::get('page_stratagems', ['uses'=>'Stratagems\StratagemsController@page_stratagems','as'=>'page-stratagems']);
Route::get('page_stratagems_list/{cat}', ['uses'=>'Stratagems\StratagemsController@page_stratagems_list','as'=>'page-stratagems-list']);
Route::get('page_stratagems_show/{id}', ['uses'=>'Stratagems\StratagemsController@page_stratagems_show','as'=>'page-stratagems-show']);
Route::get('page_theories', ['uses'=>'Theories\TheoriesController@page_theories','as'=>'page-theories']);
Route::get('page_theories_category/{cat}', ['uses'=>'Theories\TheoriesController@page_theories_category','as'=>'page-theories-category']);
Route::get('page_theories_show/{id}', ['uses'=>'Theories\TheoriesController@page_theories_show','as'=>'page-theories-show']);


Route::get('/createWord', ['as'=>'createWord','uses'=>'WordTestController@createWordDocx']);



/**
 * Это для Админки
 */
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('', ['uses'=>'AdminController@admin_console','as'=>'admin-console']);
    Route::post('admin_console_post', ['uses'=>'AdminController@admin_console_post','as'=>'admin-console-post']);


    Route::get('page_console', ['uses'=>'ConsoleController@page_console','as'=>'page-console']);
    Route::post('page_console_post', ['uses'=>'ConsoleController@page_console_post','as'=>'page-console-post']);
    Route::get('page_users', ['uses'=>'AdminController@page_users','as'=>'page-users']);

    Route::get('page_categories', ['uses'=>'AdminController@page_categories','as'=>'page-categories']);
    Route::get('page_categories_strategy_index', ['uses'=>'Admin\CategoriesController@index','as'=>'page-categories-strategy-index']);
    Route::get('page_categories_strategy_create', ['uses'=>'Admin\CategoriesController@create','as'=>'page-categories-strategy-create']);
    Route::post('page_categories_strategy_store', ['uses'=>'Admin\CategoriesController@store','as'=>'page-categories-strategy-store']);
    Route::get('page_categories_strategy_edit/{id}', ['uses'=>'Admin\CategoriesController@edit','as'=>'page-categories-strategy-edit']);
    Route::post('page_categories_strategy_update/{id}', ['uses'=>'Admin\CategoriesController@update','as'=>'page-categories-strategy-update']);
    Route::delete('page_categories_strategy_destroy/{id}',['uses'=>'Admin\CategoriesController@destroy','as'=>'page-categories-strategy-destroy']);

    Route::get('categories_strategy_sub/index/{id}', ['uses'=>'Admin\CategoriesSubController@index','as'=>'categories-strategy-sub-index']);
    Route::get('categories_strategy_sub/create/{cat}', ['uses'=>'Admin\CategoriesSubController@create','as'=>'categories-strategy-sub-create']);
    Route::post('categories_strategy_sub/store/{cat}', ['uses'=>'Admin\CategoriesSubController@store','as'=>'categories-strategy-sub-store']);
    Route::get('categories_strategy_sub/edit/{id}/{cat}', ['uses'=>'Admin\CategoriesSubController@edit','as'=>'categories-strategy-sub-edit']);
    Route::post('categories_strategy_sub/update/{id}/{cat}', ['uses'=>'Admin\CategoriesSubController@update','as'=>'categories-strategy-sub-update']);
    Route::delete('categories_strategy_sub/destroy/{id}/{cat}',['uses'=>'Admin\CategoriesSubController@destroy','as'=>'categories-strategy-sub-destroy']);

    Route::get('page_plans', ['uses'=>'AdminController@page_plans','as'=>'page-plans']);




    /*** STRATAGEMS ***/
    // 1.LIST
    Route::get('page_stratagems_list', ['uses'=>'Admin\Content\StratagemsController@page_stratagems_list','as'=>'page-stratagems-list']);
    // 1.SHOW
    Route::get('page_stratagems_show/{id}', ['uses'=>'Admin\Content\StratagemsController@page_stratagems_show','as'=>'page-stratagems-show']);
    // 3.EDIT
    Route::get('page_stratagems_edit/{id}', ['uses'=>'Admin\Content\StratagemsController@page_stratagems_edit','as'=>'page-stratagems-edit']);
    Route::post('page_stratagems_update/{id}', ['uses'=>'Admin\Content\StratagemsController@page_stratagems_update','as'=>'page-stratagems-update']);
    // 4.CREATE
    Route::get('page_stratagems_create', ['uses'=>'Admin\Content\StratagemsController@page_stratagems_create','as'=>'page-stratagems-create']);
    Route::post('page_stratagems_store', ['uses'=>'Admin\Content\StratagemsController@page_stratagems_store','as'=>'page-stratagems-store']);
    // 5.DELETE
    Route::delete('page_stratagems_destroy/{id}',['uses'=>'Admin\Content\StratagemsController@page_stratagems_destroy','as'=> 'page-stratagems-destroy']);


    /*** THEORIES ***/
    // 1.LIST
    Route::get('page_theories_list', ['uses'=>'Admin\Content\TheoriesController@page_theories_list','as'=>'page-theories-list']);
    // 1.SHOW
    Route::get('page_theories_show/{id}', ['uses'=>'Admin\Content\TheoriesController@page_theories_show','as'=>'page-theories-show']);
    // 3.EDIT
    Route::get('page_theories_edit/{id}', ['uses'=>'Admin\Content\TheoriesController@page_theories_edit','as'=>'page-theories-edit']);
    Route::post('page_theories_update/{id}', ['uses'=>'Admin\Content\TheoriesController@page_theories_update','as'=>'page-theories-update']);
    // 4.CREATE
    Route::get('page_theories_create', ['uses'=>'Admin\Content\TheoriesController@page_theories_create','as'=>'page-theories-create']);
    Route::post('page_theories_store', ['uses'=>'Admin\Content\TheoriesController@page_theories_store','as'=>'page-theories-store']);
    // 5.DELETE
    Route::delete('page_theories_destroy/{id}',['uses'=>'Admin\Content\TheoriesController@page_theories_destroy','as'=> 'page-theories-destroy']);

});


/**
 * Это для Canvas
 */
Route::prefix('page_canvas')->group(function () {
    // страница table
    Route::get('table', ['uses'=>'Page\PageController@page_canvas_table','as'=>'page-canvas-table']);
    // Редактирование блока
    Route::get('table_edit', ['uses'=>'Page\PageController@page_canvas_table_edit','as'=>'page-canvas-table-edit']);
    Route::get('table_crud_edit', ['uses'=>'Page\PageController@page_canvas_table_crud_edit','as'=>'page-canvas-table-crud-edit']);
    // Удаление эллемента
    Route::get('table_delete', ['uses'=>'Page\PageController@page_canvas_table_delete','as'=>'page-canvas-table-delete']);
    // Добавление эллемента
    Route::get('table_crud_create', ['uses'=>'Page\PageController@page_canvas_table_crud_create','as'=>'page-canvas-table-crud-create']);

    // CREATE
    Route::get('canvas_table_crud_create/{canvas_block}', ['uses'=>'Canvas\Table\CanvasController@canvas_table_crud_create','as'=>'canvas_table_crud_create']);
    Route::post('canvas_table_crud_store/{canvas_block}', ['uses'=>'Canvas\Table\CanvasController@canvas_table_crud_store','as'=>'canvas_table_crud_store']);
    // READ
    Route::get('canvas_table_list/', ['uses'=>'Canvas\Table\CanvasController@canvas_table_list','as'=>'canvas_table_list']);
    Route::get('canvas_table_edit/{canvas_block}', ['uses'=>'Canvas\Table\CanvasController@canvas_table_edit','as'=>'canvas_table_edit']);
    // UPDATE
    Route::get('canvas_table_crud_edit/{canvas_block}/{id}', ['uses'=>'Canvas\Table\CanvasController@canvas_table_crud_edit','as'=>'canvas_table_crud_edit']);
    Route::post('canvas_table_crud_update/{canvas_block}/{id}', ['uses'=>'Canvas\Table\CanvasController@canvas_table_crud_update','as'=>'canvas_table_crud_update']);
    // DELETE
    Route::delete('canvas_table_crud_destroy/{canvas_block}/{id}',['uses'=>'Canvas\Table\CanvasController@canvas_table_crud_destroy','as'=>'canvas_table_crud_destroy']);


    // CREATE
    Route::get('factors_create', ['uses'=>'Canvas\Strategy\FaktorsController@factors_create','as'=>'page-canvas-strategy-factors-create']);
    Route::post('factors_store', ['uses'=>'Canvas\Strategy\FaktorsController@factors_store','as'=>'page-canvas-strategy-factors-store']);
    // READ
    Route::get('factors', ['uses'=>'Canvas\Strategy\FaktorsController@factors','as'=>'page-canvas-strategy-factors']);
    Route::get('factors_show/{id}', ['uses'=>'Canvas\Strategy\FaktorsController@factors_show','as'=>'page-canvas-strategy-factors-show']);
    // UPDATE
    Route::get('factors_edit/{id}', ['uses'=>'Canvas\Strategy\FaktorsController@factors_edit','as'=>'page-canvas-strategy-factors-edit']);
    Route::post('factors_update/{id}', ['uses'=>'Canvas\Strategy\FaktorsController@factors_update','as'=>'page-canvas-strategy-factors-update']);
    // DELETE
    Route::delete('factors_destroy/{id}', ['uses'=>'Canvas\Strategy\FaktorsController@factors_destroy','as'=>'page-canvas-strategy-factors-destroy']);


    // CREATE
    Route::get('estimate_create', ['uses'=>'Canvas\Strategy\EstimateController@estimate_create','as'=>'page-canvas-strategy-estimate-create']);
    Route::post('estimate_store', ['uses'=>'Canvas\Strategy\EstimateController@estimate_store','as'=>'page-canvas-strategy-estimate-store']);
    // READ
    Route::get('estimate', ['uses'=>'Canvas\Strategy\EstimateController@estimate','as'=>'page-canvas-strategy-estimate']);
    Route::get('estimate_show/{id}', ['uses'=>'Canvas\Strategy\EstimateController@estimate_show','as'=>'page-canvas-strategy-estimate-show']);
    // UPDATE
    Route::get('estimate_edit/{id}', ['uses'=>'Canvas\Strategy\EstimateController@estimate_edit','as'=>'page-canvas-strategy-estimate-edit']);
    Route::post('estimate_update/{id}', ['uses'=>'Canvas\Strategy\EstimateController@estimate_update','as'=>'page-canvas-strategy-estimate-update']);
    // DELETE
    Route::delete('estimate_destroy/{id}', ['uses'=>'Canvas\Strategy\EstimateController@estimate_destroy','as'=>'page-canvas-strategy-estimate-destroy']);


    // CREATE
    Route::get('ocean_create', ['uses'=>'Canvas\Strategy\OceanController@ocean_create','as'=>'page-canvas-strategy-ocean-create']);
    Route::post('ocean_store', ['uses'=>'Canvas\Strategy\OceanController@ocean_store','as'=>'page-canvas-strategy-ocean-store']);
    // READ
    Route::get('ocean', ['uses'=>'Canvas\Strategy\OceanController@ocean','as'=>'page-canvas-strategy-ocean']);
    Route::get('ocean_show/{id}', ['uses'=>'Canvas\Strategy\OceanController@ocean_show','as'=>'page-canvas-strategy-ocean-show']);
    // UPDATE
    Route::get('ocean_edit/{id}', ['uses'=>'Canvas\Strategy\OceanController@ocean_edit','as'=>'page-canvas-strategy-ocean-edit']);
    Route::post('ocean_update/{id}', ['uses'=>'Canvas\Strategy\OceanController@ocean_update','as'=>'page-canvas-strategy-ocean-update']);
    // DELETE
    Route::delete('ocean_destroy/{id}', ['uses'=>'Canvas\Strategy\OceanController@ocean_destroy','as'=>'page-canvas-strategy-ocean-destroy']);


    // CREATE
    Route::get('multi_create', ['uses'=>'Canvas\Strategy\MultiController@multi_create','as'=>'page-canvas-strategy-multi-create']);
    Route::post('multi_store', ['uses'=>'Canvas\Strategy\MultiController@multi_store','as'=>'page-canvas-strategy-multi-store']);
    // READ
    Route::get('multi', ['uses'=>'Canvas\Strategy\MultiController@multi','as'=>'page-canvas-strategy-multi']);
    Route::get('multi_show/{id}', ['uses'=>'Canvas\Strategy\MultiController@multi_show','as'=>'page-canvas-strategy-multi-show']);
    // UPDATE
    Route::get('multi_edit/{id}', ['uses'=>'Canvas\Strategy\MultiController@multi_edit','as'=>'page-canvas-strategy-multi-edit']);
    Route::post('multi_update/{id}', ['uses'=>'Canvas\Strategy\MultiController@multi_update','as'=>'page-canvas-strategy-multi-update']);
    // DELETE
    Route::delete('multi_destroy/{id}', ['uses'=>'Canvas\Strategy\MultiController@multi_destroy','as'=>'page-canvas-strategy-multi-destroy']);
});


/**
 * Это для редактирования фирм
 */
Route::prefix('firms')->group(function () {
    // страница index
    Route::get('index', ['uses'=>'MyFirms\FirmsController@index','as'=>'firms_index']);
    // кнопки - show edit delete
    Route::get('show/{id}', ['uses'=>'MyFirms\FirmsController@show','as'=>'firms_show']);
    Route::get('edit/{id}', ['uses'=>'MyFirms\FirmsController@edit','as'=>'firms_edit']);
    Route::post('update/{id}', ['uses'=>'MyFirms\FirmsController@update','as'=>'firms_update']);
    Route::delete('delete/{id}',['uses'=>'MyFirms\FirmsController@destroy','as'=>'firms_destroy']);
    // кнопка - create
    Route::get('create', ['uses'=>'MyFirms\FirmsController@create','as'=>'firms_create']);
    Route::post('store/{user_id}', ['uses'=>'MyFirms\FirmsController@store','as'=>'firms_store']);
});




/*Route::prefix('categories')->group(function () {
    Route::get('index', ['uses'=>'CategoriesController@index','as'=>'categories_index']);
    //---
    Route::get('create', ['uses'=>'CategoriesController@create','as'=>'categories_create']);
    Route::post('store', ['uses'=>'CategoriesController@store','as'=>'categories_store']);
    //---
    Route::get('edit/{id}', ['uses'=>'CategoriesController@edit','as'=>'categories_edit']);
    Route::post('update/{id}', ['uses'=>'CategoriesController@update','as'=>'categories_update']);
    //---
    Route::delete('delete/{id}',['uses'=>'CategoriesController@destroy','as'=>'categories_destroy']);
});*/

/*Route::prefix('categories_sub')->group(function () {
    Route::get('index/{id}', ['uses'=>'CategoriesSubController@index','as'=>'categories_sub_index']);
    //---
    Route::get('create', ['uses'=>'CategoriesSubController@create','as'=>'categories_sub_create']);
    Route::post('store', ['uses'=>'CategoriesSubController@store','as'=>'categories_sub_store']);
    //---
    Route::get('edit/{id}', ['uses'=>'CategoriesSubController@edit','as'=>'categories_sub_edit']);
    Route::post('update/{id}', ['uses'=>'CategoriesSubController@update','as'=>'categories_sub_update']);
    //---
    Route::delete('delete/{id}',['uses'=>'CategoriesSubController@destroy','as'=>'categories_sub_destroy']);
});*/


/**
 * Мои разделы
 */
Route::prefix('my_page')->group(function () {
    /*** DESCRIPTIOM ***/
    // FIRST CREATE
    Route::get('page_description_first_create', ['uses'=>'PRO\Description\FirmController@page_description_first_create','as'=>'page-description-first-create']);
    Route::post('page_description_first_store', ['uses'=>'PRO\Description\FirmController@page_description_first_store','as'=>'page-description-first-store']);
    // LIST
    Route::get('firm_description_list', ['uses'=>'PRO\Description\FirmController@firm_description_list','as'=>'firm-description-list']);
    // EDIT
    Route::get('firm_description_crud_edit', ['uses'=>'PRO\Description\FirmController@firm_description_crud_edit','as'=>'firm-description-crud-edit']);
    Route::post('firm_description_crud_update', ['uses'=>'PRO\Description\FirmController@firm_description_crud_update','as'=>'firm-description-crud-update']);
    // Download
    Route::get('/downloadDescription', ['uses'=>'PRO\Description\FirmController@downloadDescription', 'as'=>'downloadDescription']);


    /*** CANVAS ***/
    // 1.LIST
    Route::get('page_canvas_list', ['uses'=>'PRO\Description\Canvas\ListController@page_canvas_list','as'=>'page-canvas-list']);
    Route::get('/downloadCanvas', ['uses'=>'PRO\Description\Canvas\WordController@downloadCanvas', 'as'=>'downloadCanvas']);
    // 2.MANAGE
    Route::get('page_canvas_manage/{category}', ['uses'=>'PRO\Description\Canvas\ManageController@page_canvas_manage','as'=>'page-canvas-manage']);
    Route::post('page_canvas_store/{svid_cat}', ['uses'=>'PRO\Description\Canvas\ManageController@page_canvas_store','as'=>'page-canvas-store']);
    Route::delete('page_canvas_destroy/{category}/{id}',['uses'=>'PRO\Description\Canvas\ManageController@page_canvas_destroy','as'=> 'page-canvas-destroy']);
    Route::get('page_canvas_theory/{category}', ['uses'=>'PRO\Description\Canvas\TheoryController@page_canvas_theory','as'=>'page-canvas-theory']);
    Route::get('page_canvas_example/{category}', ['uses'=>'PRO\Description\Canvas\ExampleController@page_canvas_example','as'=>'page-canvas-example']);
    // 3.EDIT
    Route::get('page_canvas_edit/{category}/{id}', ['uses'=>'PRO\Description\Canvas\EditController@page_canvas_edit','as'=>'page-canvas-edit']);
    Route::post('page_canvas_update/{id}', ['uses'=>'PRO\Description\Canvas\EditController@page_canvas_update','as'=>'page-canvas-update']);



    /*
     * PRO-External_environment
     */
    /*** PEST ***/
    // 1.LIST
    Route::get('page_pest_list', ['uses'=>'PRO\External_environment\Pest\ListController@page_pest_list','as'=>'page-pest-list']);
    Route::get('/downloadPest', ['uses'=>'PRO\External_environment\Pest\WordController@downloadPest', 'as'=>'downloadPest']);
    // 2.MANAGE
    Route::get('page_pest_manage/{category}', ['uses'=>'PRO\External_environment\Pest\ManageController@page_pest_manage','as'=>'page-pest-manage']);
    Route::post('page_pest_store/{svid_cat}', ['uses'=>'PRO\External_environment\Pest\ManageController@page_pest_store','as'=>'page-pest-store']);
    Route::delete('page_pest_destroy/{category}/{id}',['uses'=>'PRO\External_environment\Pest\ManageController@page_pest_destroy','as'=> 'page-pest-destroy']);
    // 3.EDIT
    Route::get('page_pest_edit/{category}/{id}', ['uses'=>'PRO\External_environment\Pest\EditController@page_pest_edit','as'=>'page-pest-edit']);
    Route::post('page_pest_update/{id}', ['uses'=>'PRO\External_environment\Pest\EditController@page_pest_update','as'=>'page-pest-update']);


    /*** CIRCLE ***/
    // READ / EDIT
    Route::get('page_circle_list/', ['uses'=>'PRO\External_environment\CircleController@page_circle_list','as'=>'page-circle-list']);
    Route::post('page_circle_update/', ['uses'=>'PRO\External_environment\CircleController@page_circle_update','as'=>'page-circle-update']);
    // DELETE
    Route::delete('page_circle_destroy/',['uses'=>'PRO\External_environment\CircleController@page_circle_destroy','as'=> 'page-circle-destroy']);
    // Download
    Route::get('/downloadCircle', ['uses'=>'PRO\External_environment\CircleController@downloadCircle', 'as'=>'downloadCircle']);


    /*** FORCES ***/
    // READ
    Route::get('page_forces_list/', ['uses'=>'PRO\External_environment\ForcesController@page_forces_list','as'=>'page-forces-list']);
    Route::get('/downloadForces', ['uses'=>'PRO\External_environment\Forces\WordController@downloadForces', 'as'=>'downloadForces']);
    // UPDATE
    Route::get('page_forces_crud_edit/{force_cat}/', ['uses'=>'PRO\External_environment\ForcesController@page_forces_crud_edit','as'=>'page-forces-crud-edit']);
    Route::post('page_forces_crud_update/{force_cat}/', ['uses'=>'PRO\External_environment\ForcesController@page_forces_crud_update','as'=>'page-forces-crud-update']);

    
    /*** BARRIERS ***/
    // READ
    Route::get('page_barriers_list/', ['uses'=>'PRO\External_environment\BarriersController@page_barriers_list','as'=>'page-barriers-list']);
    Route::post('page_barriers_update/', ['uses'=>'PRO\External_environment\BarriersController@page_barriers_update','as'=>'page-barriers-update']);
    // DELETE
    Route::delete('page_barriers_destroy/',['uses'=>'PRO\External_environment\BarriersController@page_barriers_destroy','as'=> 'page-barriers-destroy']);


    /*** SUCCESS ***/
    // 1.LIST
    Route::get('page_success_list', ['uses'=>'PRO\External_environment\Success\ListController@page_success_list','as'=>'page-success-list']);
    Route::get('/downloadSuccess', ['uses'=>'PRO\External_environment\Success\WordController@downloadSuccess', 'as'=>'downloadSuccess']);
    // 2.MANAGE
    Route::get('page_success_manage/{category}', ['uses'=>'PRO\External_environment\Success\ManageController@page_success_manage','as'=>'page-success-manage']);
    Route::post('page_success_store/{svid_cat}', ['uses'=>'PRO\External_environment\Success\ManageController@page_success_store','as'=>'page-success-store']);
    Route::delete('page_success_destroy/{category}/{id}',['uses'=>'PRO\External_environment\Success\ManageController@page_success_destroy','as'=> 'page-success-destroy']);
    Route::get('page_success_theory/{category}', ['uses'=>'PRO\External_environment\Success\TheoryController@page_success_theory','as'=>'page-success-theory']);
    Route::get('page_success_example/{category}', ['uses'=>'PRO\External_environment\Success\ExampleController@page_success_example','as'=>'page-success-example']);
    // 3.EDIT
    Route::get('page_success_edit/{category}/{id}', ['uses'=>'PRO\External_environment\Success\EditController@page_success_edit','as'=>'page-success-edit']);
    Route::post('page_success_update/{id}', ['uses'=>'PRO\External_environment\Success\EditController@page_success_update','as'=>'page-success-update']);



    /*** COMPETITORS ***/
    // FIRST CREATE
    Route::get('page_competitors_first_create', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_first_create','as'=>'page-competitors-first-create']);
    Route::post('page_competitors_first_store', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_first_store','as'=>'page-competitors-first-store']);
    // CREATE
    Route::get('page_competitors_crud_create', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_crud_create','as'=>'page-competitors-crud-create']);
    Route::post('page_competitors_crud_store', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_crud_store','as'=>'page-competitors-crud-store']);
    // READ
    Route::get('page_competitors_list', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_list','as'=>'page-competitors-list']);
    Route::get('page_competitors_edit', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_edit','as'=>'page-competitors-edit']);
    // UPDATE
    Route::get('page_competitors_crud_edit/{id}', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_crud_edit','as'=>'page-competitors-crud-dit']);
    Route::post('page_competitors_crud_update/{id}', ['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_crud_update','as'=>'page-competitors-crud-update']);
    // DELETE
    Route::delete('page_competitors_crud_destroy/{id}',['uses'=>'PRO\External_environment\CompetitorsController@page_competitors_crud_destroy','as'=> 'page-competitors-crud-destroy']);


    /*** CAPABILITIES ***/
    // 1.LIST
    Route::get('page_capabilities_list', ['uses'=>'PRO\External_environment\Capabilities\ListController@page_capabilities_list','as'=>'page-capabilities-list']);
    // 2.MANAGE
    Route::get('page_capabilities_manage/{category}', ['uses'=>'PRO\External_environment\Capabilities\ManageController@page_capabilities_manage','as'=>'page-capabilities-manage']);
    Route::post('page_capabilities_store/{svid_cat}', ['uses'=>'PRO\External_environment\Capabilities\ManageController@page_capabilities_store','as'=>'page-capabilities-store']);
    Route::delete('page_capabilities_destroy/{category}/{id}',['uses'=>'PRO\External_environment\Capabilities\ManageController@page_capabilities_destroy','as'=> 'page-capabilities-destroy']);
    Route::get('page_capabilities_theory/{category}', ['uses'=>'PRO\External_environment\Capabilities\TheoryController@page_capabilities_theory','as'=>'page-capabilities-theory']);
    Route::get('page_capabilities_example/{category}', ['uses'=>'PRO\External_environment\Capabilities\ExampleController@page_capabilities_example','as'=>'page-capabilities-example']);
    // 3.EDIT
    Route::get('page_capabilities_edit/{id}', ['uses'=>'PRO\External_environment\Capabilities\EditController@page_capabilities_edit','as'=>'page-capabilities-edit']);
    Route::post('page_capabilities_update/{id}', ['uses'=>'PRO\External_environment\Capabilities\EditController@page_capabilities_update','as'=>'page-capabilities-update']);



    /*
     * Internal Faktors
     */
    /*** RESOURCES ***/
    // 1.LIST
    Route::get('page_resources_list', ['uses'=>'PRO\Internal_environment\Resources\ListController@page_resources_list','as'=>'page-resources-list']);
    // 2.MANAGE
    Route::get('page_resources_manage/{category}', ['uses'=>'PRO\Internal_environment\Resources\ManageController@page_resources_manage','as'=>'page-resources-manage']);
    Route::post('page_resources_store/{svid_cat}', ['uses'=>'PRO\Internal_environment\Resources\ManageController@page_resources_store','as'=>'page-resources-store']);
    Route::delete('page_resources_destroy/{category}/{id}',['uses'=>'PRO\Internal_environment\resources\ManageController@page_resources_destroy','as'=> 'page-resources-destroy']);
    Route::get('page_resources_theory/{category}', ['uses'=>'PRO\Internal_environment\Resources\TheoryController@page_resources_theory','as'=>'page-resources-theory']);
    Route::get('page_resources_example/{category}', ['uses'=>'PRO\Internal_environment\Resources\ExampleController@page_resources_example','as'=>'page-resources-example']);
    // 3.EDIT
    Route::get('page_resources_edit/{id}', ['uses'=>'PRO\Internal_environment\Resources\EditController@page_resources_edit','as'=>'page-resources-edit']);
    Route::post('page_resources_update/{id}', ['uses'=>'PRO\Internal_environment\Resources\EditController@page_resources_update','as'=>'page-resources-update']);


    /*** ABILITIES ***/
    // 1.LIST
    Route::get('page_abilities_list', ['uses'=>'PRO\Internal_environment\Abilities\ListController@page_abilities_list','as'=>'page-abilities-list']);
    // 2.MANAGE
    Route::get('page_abilities_manage/{category}', ['uses'=>'PRO\Internal_environment\Abilities\ManageController@page_abilities_manage','as'=>'page-abilities-manage']);
    Route::post('page_abilities_store/{category}', ['uses'=>'PRO\Internal_environment\Abilities\ManageController@page_abilities_store','as'=>'page-abilities-store']);
    Route::delete('page_abilities_destroy/{category}/{id}',['uses'=>'PRO\Internal_environment\Abilities\ManageController@page_abilities_destroy','as'=> 'page-abilities-destroy']);
    Route::get('page_abilities_theory/{category}', ['uses'=>'PRO\Internal_environment\Abilities\TheoryController@page_abilities_theory','as'=>'page-abilities-theory']);
    Route::get('page_abilities_example/{category}', ['uses'=>'PRO\Internal_environment\Abilities\ExampleController@page_abilities_example','as'=>'page-abilities-example']);
    // 3.EDIT
    Route::get('page_abilities_edit/{category}/{id}', ['uses'=>'PRO\Internal_environment\Abilities\EditController@page_abilities_edit','as'=>'page-abilities-edit']);
    Route::post('page_abilities_update/{category}/{id}', ['uses'=>'PRO\Internal_environment\Abilities\EditController@page_abilities_update','as'=>'page-abilities-update']);


    /*** CONTRIBUTION ***/
    // 1.LIST
    Route::get('page_contribution_list', ['uses'=>'PRO\Internal_environment\Contribution\ListController@page_contribution_list','as'=>'page-contribution-list']);
    // 2.MANAGE
    Route::get('page_contribution_manage/{category}', ['uses'=>'PRO\Internal_environment\Contribution\ManageController@page_contribution_manage','as'=>'page-contribution-manage']);
    Route::post('page_contribution_store/{svid_cat}', ['uses'=>'PRO\Internal_environment\Contribution\ManageController@page_contribution_store','as'=>'page-contribution-store']);
    Route::delete('page_contribution_destroy/{category}/{id}',['uses'=>'PRO\Internal_environment\Contribution\ManageController@page_contribution_destroy','as'=> 'page-contribution-destroy']);
    Route::get('page_contribution_theory/{category}', ['uses'=>'PRO\Internal_environment\Contribution\TheoryController@page_contribution_theory','as'=>'page-contribution-theory']);
    Route::get('page_contribution_example/{category}', ['uses'=>'PRO\Internal_environment\Contribution\ExampleController@page_contribution_example','as'=>'page-contribution-example']);
    // 3.EDIT
    Route::get('page_contribution_edit/{id}', ['uses'=>'PRO\Internal_environment\Contribution\EditController@page_contribution_edit','as'=>'page-contribution-edit']);
    Route::post('page_contribution_update/{id}', ['uses'=>'PRO\Internal_environment\Contribution\EditController@page_contribution_update','as'=>'page-contribution-update']);


    /*** SUGGESTIONS ***/
    // 1.LIST
    Route::get('page_suggestions_list', ['uses'=>'PRO\Internal_environment\Suggestions\ListController@page_suggestions_list','as'=>'page-suggestions-list']);
    // 2.MANAGE
    Route::get('page_suggestions_manage/{category}', ['uses'=>'PRO\Internal_environment\Suggestions\ManageController@page_suggestions_manage','as'=>'page-suggestions-manage']);
    Route::post('page_suggestions_store/{svid_cat}', ['uses'=>'PRO\Internal_environment\Suggestions\ManageController@page_suggestions_store','as'=>'page-suggestions-store']);
    Route::delete('page_suggestions_destroy/{category}/{id}',['uses'=>'PRO\Internal_environment\Suggestions\ManageController@page_suggestions_destroy','as'=> 'page-suggestions-destroy']);
    Route::get('page_suggestions_theory/{category}', ['uses'=>'PRO\Internal_environment\Suggestions\TheoryController@page_suggestions_theory','as'=>'page-suggestions-theory']);
    Route::get('page_suggestions_example/{category}', ['uses'=>'PRO\Internal_environment\Suggestions\ExampleController@page_suggestions_example','as'=>'page-suggestions-example']);
    // 3.EDIT
    Route::get('page_suggestions_edit/{id}', ['uses'=>'PRO\Internal_environment\Suggestions\EditController@page_suggestions_edit','as'=>'page-suggestions-edit']);
    Route::post('page_suggestions_update/{id}', ['uses'=>'PRO\Internal_environment\Suggestions\EditController@page_suggestions_update','as'=>'page-suggestions-update']);




    /*
     * SWOT
     */
    /*** SVID - svid_iekseja ***/
    // 1. LIST
    Route::get('svid_iekseja_list', ['uses'=>'PRO\Svid\Iekseja\ListController@svid_iekseja_list','as'=>'svid_iekseja_list']);
    // 2. MANAGE
    Route::get('svid_iekseja_manage/{category}', ['uses'=>'PRO\Svid\Iekseja\ManageController@svid_iekseja_manage','as'=>'svid-iekseja-manage']);
    Route::post('svid_iekseja_store/{category}', ['uses'=>'PRO\Svid\Iekseja\ManageController@svid_iekseja_store','as'=>'svid-iekseja-store']);
    Route::delete('svid_iekseja_destroy/{category}/{id}',['uses'=>'PRO\Svid\Iekseja\ManageController@svid_iekseja_destroy','as'=>'svid-iekseja-destroy']);
    Route::get('svid_iekseja_theory/{category}', ['uses'=>'PRO\Svid\Iekseja\TheoryController@svid_iekseja_theory','as'=>'svid-iekseja-theory']);
    Route::get('svid_iekseja_example/{category}', ['uses'=>'PRO\Svid\Iekseja\ExampleController@svid_iekseja_example','as'=>'svid-iekseja-example']);
    // 3. EDIT
    Route::get('svid_iekseja_edit/{category}/{id}', ['uses'=>'PRO\Svid\Iekseja\EditController@svid_iekseja_edit','as'=>'svid-iekseja-edit']);
    Route::post('svid_iekseja_update/{category}/{id}', ['uses'=>'PRO\Svid\Iekseja\EditController@svid_iekseja_update','as'=>'svid-iekseja-update']);


    /*** SVID - svid_areja ***/
    // 1. LIST
    Route::get('svid_areja_list', ['uses'=>'PRO\Svid\Areja\ListController@svid_areja_list','as'=>'svid_areja_list']);
    // 2. MANAGE
    Route::get('svid_areja_manage/{category}', ['uses'=>'PRO\Svid\Areja\ManageController@svid_areja_manage','as'=>'svid-areja-manage']);
    Route::post('svid_areja_store/{category}', ['uses'=>'PRO\Svid\Areja\ManageController@svid_areja_store','as'=>'svid-areja-store']);
    Route::delete('svid_areja_destroy/{category}/{id}',['uses'=>'PRO\Svid\Areja\ManageController@svid_areja_destroy','as'=>'svid-areja-destroy']);
    Route::get('svid_areja_theory/{category}', ['uses'=>'PRO\Svid\Areja\TheoryController@svid_areja_theory','as'=>'svid-areja-theory']);
    Route::get('svid_areja_example/{category}', ['uses'=>'PRO\Svid\Areja\ExampleController@svid_areja_example','as'=>'svid-areja-example']);
    // 3. EDIT
    Route::get('svid_areja_edit/{category}/{id}', ['uses'=>'PRO\Svid\Areja\EditController@svid_areja_edit','as'=>'svid-areja-edit']);
    Route::post('svid_areja_update/{category}/{id}', ['uses'=>'PRO\Svid\Areja\EditController@svid_areja_update','as'=>'svid-areja-update']);


    /*** SVID - svid_tows ***/
    // 1. LIST
    Route::get('svid_tows_list', ['uses'=>'PRO\Svid\Tows\ListController@svid_tows_list','as'=>'svid_tows_list']);
    // 2. MANAGE
    Route::get('svid_tows_manage/{category}', ['uses'=>'PRO\Svid\Tows\ManageController@svid_tows_manage','as'=>'svid-tows-manage']);
    Route::post('svid_tows_store/{category}', ['uses'=>'PRO\Svid\Tows\ManageController@svid_tows_store','as'=>'svid-tows-store']);
    Route::delete('svid_tows_destroy/{category}/{id}',['uses'=>'PRO\Svid\Tows\ManageController@svid_tows_destroy','as'=>'svid-tows-destroy']);
    Route::get('svid_tows_theory/{category}', ['uses'=>'PRO\Svid\Tows\TheoryController@svid_tows_theory','as'=>'svid-tows-theory']);
    Route::get('svid_tows_example/{category}', ['uses'=>'PRO\Svid\Tows\ExampleController@svid_tows_example','as'=>'svid-tows-example']);
    // 3. EDIT
    Route::get('svid_tows_edit/{category}/{id}', ['uses'=>'PRO\Svid\Tows\EditController@svid_tows_edit','as'=>'svid-tows-edit']);
    Route::post('svid_tows_update/{category}/{id}', ['uses'=>'PRO\Svid\Tows\EditController@svid_tows_update','as'=>'svid-tows-update']);


    /*
    * PRO-IE matrix
    */
    /*** IFE ***/
    // 1.LIST
    Route::get('page_ife_list', ['uses'=>'PRO\Ie_matrix\Ife\ListController@page_ife_list','as'=>'page-ife-list']);
    Route::get('/downloadIfe', ['uses'=>'PRO\Ie_matrix\Ife\WordController@downloadIfe', 'as'=>'downloadIfe']);
    // 2.MANAGE
    Route::get('page_ife_manage/{category}', ['uses'=>'PRO\Ie_matrix\Ife\ManageController@page_ife_manage','as'=>'page-ife-manage']);
    Route::post('page_ife_store/{svid_cat}', ['uses'=>'PRO\Ie_matrix\Ife\ManageController@page_ife_store','as'=>'page-ife-store']);
    Route::delete('page_ife_destroy/{category}/{id}',['uses'=>'PRO\Ie_matrix\Ife\ManageController@page_ife_destroy','as'=> 'page-ife-destroy']);
    Route::get('page_ife_theory/{category}', ['uses'=>'PRO\Ie_matrix\Ife\TheoryController@page_ife_theory','as'=>'page-ife-theory']);
    Route::get('page_ife_example/{category}', ['uses'=>'PRO\Ie_matrix\Ife\ExampleController@page_ife_example','as'=>'page-ife-example']);
    // 3.EDIT
    Route::get('page_ife_edit/{category}/{id}', ['uses'=>'PRO\Ie_matrix\Ife\EditController@page_ife_edit','as'=>'page-ife-edit']);
    Route::post('page_ife_update_1/{category}', ['uses'=>'PRO\Ie_matrix\Ife\EditController@page_ife_update_1','as'=>'page-ife-update-1']);
    Route::post('page_ife_update_2/{id}', ['uses'=>'PRO\Ie_matrix\Ife\EditController@page_ife_update_2','as'=>'page-ife-update-2']);
    // COPY FROM SWOT
    Route::get('page_ife_copy_from_swot/{category}', ['uses'=>'PRO\Ie_matrix\Ife\CopyController@page_ife_copy','as'=>'page-ife-copy']);

    /*** EFE ***/
    // 1.LIST
    Route::get('page_efe_list', ['uses'=>'PRO\Ie_matrix\Efe\ListController@page_efe_list','as'=>'page-efe-list']);
    Route::get('/downloadEfe', ['uses'=>'PRO\Ie_matrix\Efe\WordController@downloadEfe', 'as'=>'downloadEfe']);
    // 2.MANAGE
    Route::get('page_efe_manage/{category}', ['uses'=>'PRO\Ie_matrix\Efe\ManageController@page_efe_manage','as'=>'page-efe-manage']);
    Route::post('page_efe_store/{svid_cat}', ['uses'=>'PRO\Ie_matrix\Efe\ManageController@page_efe_store','as'=>'page-efe-store']);
    Route::delete('page_efe_destroy/{category}/{id}',['uses'=>'PRO\Ie_matrix\Efe\ManageController@page_efe_destroy','as'=> 'page-efe-destroy']);
    Route::get('page_efe_theory/{category}', ['uses'=>'PRO\Ie_matrix\Efe\TheoryController@page_efe_theory','as'=>'page-efe-theory']);
    Route::get('page_efe_example/{category}', ['uses'=>'PRO\Ie_matrix\Efe\ExampleController@page_efe_example','as'=>'page-efe-example']);
    // 3.EDIT
    Route::get('page_efe_edit/{category}/{id}', ['uses'=>'PRO\Ie_matrix\Efe\EditController@page_efe_edit','as'=>'page-efe-edit']);
    Route::post('page_efe_update_1/{category}', ['uses'=>'PRO\Ie_matrix\Efe\EditController@page_efe_update_1','as'=>'page-efe-update-1']);
    Route::post('page_efe_update_2/{id}', ['uses'=>'PRO\Ie_matrix\Efe\EditController@page_efe_update_2','as'=>'page-efe-update-2']);
    // COPY FROM SWOT
    Route::get('page_efe_copy_from_swot/{category}', ['uses'=>'PRO\Ie_matrix\Efe\CopyController@page_efe_copy','as'=>'page-efe-copy']);



    /*** IE ***/
    // 1.LIST
    Route::get('page_ie_list', ['uses'=>'PRO\Ie_matrix\Ie\ListController@page_ie_list','as'=>'page-ie-list']);
    

    /*
     * Strategy
     */
    /*** Stratēģija - virziens ***/
    Route::get('strategija_virziens_list', ['uses'=>'PRO\Strategy\VirziensController@strategija_virziens_list','as'=>'strategija_virziens_list']);
    Route::post('strategija_virziens_update', ['uses'=>'PRO\Strategy\VirziensController@strategija_virziens_update','as'=>'strategija_virziens_update']);

    /*** Stratēģija - prieksrocibas ***/
    Route::get('strategija_prieksrocibas_list', ['uses'=>'PRO\Strategy\PrieksrocibasController@strategija_prieksrocibas_list','as'=>'strategija_prieksrocibas_list']);
    Route::post('strategija_prieksrocibas_store', ['uses'=>'PRO\Strategy\PrieksrocibasController@strategija_prieksrocibas_store','as'=>'strategija_prieksrocibas_store']);
    Route::post('strategija_prieksrocibas_update', ['uses'=>'PRO\Strategy\PrieksrocibasController@strategija_prieksrocibas_update','as'=>'strategija_prieksrocibas_update']);

    /*** Stratēģija - lidzekli ***/
    Route::get('strategija_lidzekli_list', ['uses'=>'PRO\Strategy\LidzekliController@strategija_lidzekli_list','as'=>'strategija-lidzekli-list']);
    Route::post('strategija_lidzekli_update', ['uses'=>'PRO\Strategy\LidzekliController@strategija_lidzekli_update','as'=>'strategija-lidzekli-update']);

    /*** Stratēģija - merki ***/
    // LIST
    Route::get('strategija_merki_list', ['uses'=>'PRO\Strategy\Merki\ListController@strategija_merki_list','as'=>'strategija-merki-list']);
    // MANAGE
    Route::get('strategija_merki_manage/{category}', ['uses'=>'PRO\Strategy\Merki\ManageController@strategija_merki_manage','as'=>'strategija-merki-manage']);
    Route::post('strategija_merki_store/{category}', ['uses'=>'PRO\Strategy\Merki\ManageController@strategija_merki_store','as'=>'strategija-merki-store']);
    Route::delete('strategija_merki_destroy/{category}/{id}',['uses'=>'PRO\Strategy\Merki\ManageController@strategija_merki_destroy','as'=>'strategija-merki-destroy']);
    Route::get('strategija_merki_theory/{category}', ['uses'=>'PRO\Strategy\Merki\TheoryController@strategija_merki_theory','as'=>'strategija-merki-theory']);
    Route::get('strategija_merki_example/{category}', ['uses'=>'PRO\Strategy\Merki\ExampleController@strategija_merki_example','as'=>'strategija-merki-example']);
    // EDIT
    Route::get('strategija_merki_edit/{category}/{id}', ['uses'=>'PRO\Strategy\Merki\EditController@strategija_merki_edit','as'=>'strategija-merki-edit']);
    Route::post('strategija_merki_update/{category}/{id}', ['uses'=>'PRO\Strategy\Merki\EditController@strategija_merki_update','as'=>'strategija-merki-update']);

    
    
    /*** SKOULZ ***/
    Route::get('page_skoulz_manage', ['uses'=>'PRO\Strategy_tests\Skoulz\SkoulzController@page_skoulz_manage','as'=>'page-skoulz-manage']);
    Route::post('page_skoulz_update', ['uses'=>'PRO\Strategy_tests\Skoulz\SkoulzController@page_skoulz_update','as'=>'page-skoulz-update']);

    /*** RUMELT ***/
    Route::get('page_rumelt_manage', ['uses'=>'PRO\Strategy_tests\Rumelt\RumeltController@page_rumelt_manage','as'=>'page-rumelt-manage']);
    Route::post('page_rumelt_update', ['uses'=>'PRO\Strategy_tests\Rumelt\RumeltController@page_rumelt_update','as'=>'page-rumelt-update']);


    /*** GRANT ***/
    Route::get('page_grant_manage/', ['uses'=>'PRO\Strategy_tests\Grant\GrantController@page_grant_manage','as'=>'page-grant-manage']);
    Route::post('page_grant_update/', ['uses'=>'PRO\Strategy_tests\Grant\GrantController@page_grant_update','as'=>'page-grant-update']);



        
});


/**
 * Это для Models
 */
Route::group(['prefix' => 'page_models'], function () {
    // страница table
    Route::get('table', ['uses'=>'Page\PageController@page_canvas_table','as'=>'page-canvas-table']);

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/you_are_registered', 'HomeController@you_are_registered')->name('/you-are-registered');
