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
// First Route method – Root URL will match this method
Route::get('/', function () {
    $first_name = "Selmi";
    $last_name = "Seif";
    //return view('welcome')->with('firstName', $first_name)->with('lastName', $last_name);
   /* return view('welcome')->with([
        'firstName' => $first_name,
        'lastName'=> $last_name

    ]);*/

    $is_weekend = date('N');
    $data = [
        'firstName' => $first_name,
        'lastName'=> $last_name,
        'isWeekend'=> $is_weekend

    ];

    //return view('welcome')->with($data);
    return view('welcome', $data);

    /*$view = View::make('welcome');
    $view->firstName =  $first_name;
    $view->lastName =  $last_name;
    return $view;*/

    /*$firstName = "Selmi";
    $lastName = "Seif";
    return view('welcome', compact('firstName', 'lastName'));*/

   // return view('welcome')->withFirstName($first_name)->withLastName($last_name);
});

Route::get('/about', function () {
  // return view('pages.about');
    return View::make('pages.about'); // make méthode static du facade
});

Route::get('salut', function(){
    return "Salut les amis";
});
Route::get('salut/{name}', function($name){
    return "Salut $name";
});

Route::get('/events', function(){

    $events = [
        'Learn Laravel 5',
        'Learn AngularJS',
        'Learn PHP5'

    ];

    // compact create array ['events' => $events]
    return view('events.index', compact('events'));
});


Route::get('article/{slug}-{id}', ['as' => 'article', function($slug, $id){
    return "Lien: ". route('article', ['slug'=> $slug, 'id'=> $id]);
    #return "Slug: $slug, - ID: $id";
}])->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');

// Regrouper des routes
//http://localhost:8000/admin/user/seif
/*Route::group(['prefix' => 'admin'], function(){
    Route::get('user/{name}', function($name){
        return "Salut $name";
    });
});*/

// middleware des fonctions agissent sur les requétes se place entre la route et le code à exécuter
/*Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('user/{name}', function($name){
        return "Salut $name";
    });
});*/

// Second Route method – Root URL with ID will match this method
Route::get('ID/{id}',function($id){
    echo 'ID: '.$id;
});

// Third Route method – Root URL with or without name will match this method
Route::get('/user/{name?}',function($name = 'Selmi Seif'){
    echo "Name: ".$name;
});

// Créer un middleware FiltreIpMiddleware
    Route::group(['prefix' => 'admin', 'middleware' => 'ip'], function(){
        Route::get('user/{name}', function($name){
            return "Salut $name";
        });
    });

// middleware and controller
    Route::get('role',[
        'middleware' => 'Role:editor',
        'uses' => 'TestController@index',
    ]);

    Route::get('terminate',[
        'middleware' => 'terminate',
        'uses' => 'TerminateController@index',
    ]);

// Controller Middleware
    Route::get('profile', [
        'middleware' => 'auth',
        'uses' => 'UserController@showProfile'
    ]);


    Route::get('/usercontroller/path',[
        'middleware' => 'First',
        'uses' => 'UserController@showPath'
    ]);

// Restful Resource Controllers
    Route::resource('my','MyController');

// Implicit Controllers
    //Route::controller('test','ImplicitController');


// Constructor Injection - Method Injection
    class MyClass{
        public $foo = 'bar';
    }
    Route::get('/myclass','ImplicitController@index');

// Retrieving the Request URI
    Route::get('/foo/bar','UriController@index');


// Retrieving Input
    Route::get('/register',function(){
        return view('forms.register');
    });
    //Route::post('/user/register',array('uses'=>'UserRegistration@postRegister'));
    Route::post('/user/register','UserRegistration@postRegister');

// Retrieving Cookie
    //Route::get('/cookie/set','CookieController@setCookie');
    //Route::get('/cookie/get','CookieController@getCookie');

    Route::get('/cookie/set',array('uses'=>'CookieController@setCookie'));
    Route::get('/cookie/get',array('uses'=>'CookieController@getCookie'));


// Laravel Response
    Route::get('/basic_response', function () {
        return 'Hello World';
    });

// Attaching Headers
    Route::get('/header',function(){
        return response("Hello", 200)->header('Content-Type', 'text/html');
    });


// Attaching Cookies
    Route::get('/cookie',function(){
        return response("Hello", 200)->header('Content-Type', 'text/html')
            ->withcookie('name','Selmi Seif', 1);
    });

// JSON Response
    Route::get('json',function(){
        return response()->json(['name' => 'Selmi Seif', 'state' => 'Developer']);
    });


// Laravel Views
    /*Route::get('/test', function(){
        //return view('tests.test');
       //Passing Data to Views
        return view('tests.test',['name'=>'Selmi Seif']);
    });*/

// Sharing Data with all Views
    Route::get('/test', function(){
        return view('tests.test');
    });
    Route::get('/test2', function(){
        return view('tests.test2');
    });


// Blade Templates
    Route::get('blade', function () {
        return view('page',array('name' => 'Selmi Seif'));
    });


// Redirecting to Named Routes
    Route::get('/test', ['as'=>'testing',function(){
        return view('tests.test');
    }]);

    Route::get('redirect',function(){
        return redirect()->route('testing');
    });


// Redirecting to Controller Actions
    Route::get('rr','RedirectController@index');
    Route::get('/redirectcontroller',function(){
        return redirect()->action('RedirectController@index');
    });

//Laravel Insert Records in Database MySQL
Route::get('insert','StudInsertController@insertform');
Route::post('create','StudInsertController@insert');

// Laravel Retrieve Records in Database MySQL
Route::get('view-records','StudViewController@index');

// Laravel Update Records in Database MySQL
Route::get('edit-records','StudUpdateController@index');
Route::get('edit/{id}','StudUpdateController@show');
Route::post('edit/{id}','StudUpdateController@edit');

// Laravel Delete Records in Database MySQL
Route::get('delete-records','StudDeleteController@index');
Route::get('delete/{id}','StudDeleteController@destroy');

// Laravel Forms
Route::get('/form',function(){
    return view('forms.form');
});

// Laravel Localization
Route::get('localization/{locale}','LocalizationController@index');

// Laravel Session
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');

// Laravel Validation
Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');

// Laravel File Uploading
Route::get('/uploadfile','UploadFileController@index');
Route::post('/uploadfile','UploadFileController@showUploadFile');

// Laravel Sending Email
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

// Laravel Ajax
Route::get('ajax',function(){
    return view('message');
});
Route::post('/getmsg','AjaxController@index');


// Laravel Error Handling
Route::get('/error',function(){
    abort(404);
});


// Laravel Event Handling
Route::get('event','CreateStudentController@insertform');
Route::post('addstudent','CreateStudentController@insert');


// Laravel Facades
Route::get('/facadeex', function(){
    return TestFacades::testingFacades();
});
