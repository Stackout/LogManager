<?php

/*
|--------------------------------------------------------------------------
| Stackout LogManager Routes
|--------------------------------------------------------------------------
|
*/


Route::group([
        'namespace'=> 'Stackout\LogManager',
        'prefix'=>'admin/logs',
        'middleware' => ['web', 'admin']
        
    ], function(){

        Route::get('/', 'LogController@index');
        Route::get('/preview/{file_name}', 'LogController@preview');
        Route::get('/download/{file_name}', 'LogController@download');
        Route::get('/delete/{file_name}', 'LogController@delete');

});


?>