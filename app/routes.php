<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 * The following routes are for the main functionality of the application
 */


/**
* Index
*/
Route::get('/', 'IndexController@getIndex');
/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );
/**
* Task (or what I call Item)
* (Explicit Routing)
*/
Route::get('/task', 'ItemController@getIndex');
Route::get('/task/edit', 'ItemController@getEdit');
Route::post('/task/edit', 'ItemController@postEdit');
Route::get('/task/create', 'ItemController@getCreate');
Route::post('/task/create', 'ItemController@postCreate');
Route::get('/task/delete', 'ItemController@getDelete');
Route::post('/task/delete', 'ItemController@postDelete');
/**
* Book
* (Explicit Routing)
*/
Route::get('/category', 'CategoryController@getIndex');
Route::get('/task/edit', 'CategoryController@getEdit');
Route::post('/task/edit', 'CategoryController@postEdit');
Route::get('/category/create', 'CategoryController@getCreate');
Route::post('/category/create', 'CategoryController@postCreate');
Route::get('/task/delete', 'CategoryController@getDelete');
Route::post('/task/delete', 'CategoryController@postDelete');

/*
 *  The below routes are sample debugging routes.  I will remove them later.
 *
 */

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('/practice', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');

    echo Pre::render($fruit,'Fruit');

});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});
Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

Route::get('/classes', function() {
    echo Paste\Pre::render(get_declared_classes(),'');
});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});