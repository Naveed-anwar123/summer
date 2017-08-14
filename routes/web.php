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

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('routelist',function(){
});


Route::get('/', function () {
    // route('link'); // return http://summer.co/link
    return view('welcome');
});
Route::get('/link' , function(){
    return "Links";
})->name('link');

Route::resource('posts','PostController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/find',function() {

    //$post = Post::all()->first();
    //echo count($post);

    $post = Post::all();
    foreach($post as $single)
    {
        echo $single->id."<br>";
    }

});


Route::get('/findpost',function(){
    $post = Post::where('id',1)->get();
    foreach($post as $single)
    {
        echo $single->body."<br>";
    }
});


Route::get('/findorfail',function(){
    $post = Post::findOrFail(1);
    return $post;
});


Route::get('/insert',function(){
    $post = new Post();
    $post->title = "Wow";
    $post->body = "Content copy rights";
    $post->save();
});


Route::get('/update/{id}',function($id){
    $post = Post::find($id);
    $post->title = "Wow";
    $post->body = "Content copy rights";
    $post->save();
});


Route::get('/mass',function(){
    Post::create(['title'=>'MassAssignment','body'=>'MassAssignemt']);
});
Route::get('/massupdate',function(){

    Post::where('id',2)->update(['title'=>'I have added a new title']);
});


Route::get('/delete',function(){

    Post::where('id',1)->delete();
});


Route::get('/destroy',function(){

    Post::destroy([10,11]);
});
//Soft delete need use softDelete(), proteced $dates , add column to migrations ,


Route::get('/softdelete/{id}',function($id){
    $post = Post::find($id);
    if($post!=null){
        $post->delete();
        return "deleted";
    }
    else{
        return "Already soft deleted";
    }
    return $post;
});
Route::get('/withtrashed',function(){
    $post = Post::withTrashed()->where('id',2)->get();
    foreach($post as $single)
    {
        return $single->id;
    }
});

Route::get('/restore/{id}',function($id){
    $post = Post::onlyTrashed()->get();
    foreach($post as $single)
    {
        if($single->id == $id )
        {
            $single->restore();
            echo "Restored";
        }
    }
});
Route::get('/force/{id}',function($id){
    $post = Post::onlyTrashed()->get();
    foreach($post as $single)
    {
        if($single->id == $id )
        {
            $single->forceDelete();
            echo "Force Deleted";
        }
    }
});

//-------------------------------------Eloquent Models------------------------------------------
//For one to many realation ship we need hasMany() and belongsTo
Route::get('/user/{id}/post',function($id){
    return User::find($id)->post;
});

Route::get('/post/{id}/user',function($id){

    return Post::find($id)->user->name;

});


//OneToMany Relationship Example

Route::get('/insertPost/{id}',function($id){

  $user = User::find($id);
    $post = new \App\Bpost(['title'=>'Title Added using Relationship']);
    $user->bpost()->save($post);

});

//Reading is easy
Route::get('/readPost/{id}',function($id){
    $user = User::find($id);
    foreach( $user->bpost as $post)
    {
        echo $post->title;
        echo "<br>";
    }

});


Route::get('middleware',['middleware'=>'auth', function(){
    return "Middle Ware";
}]);

Route::get('role',['middleware'=>'role', function(){

    return "Ok";
}]);

Route::resource('picture','PictureController');
Route::resource('test','AjaxTestingController');
Route::resource('validate','ValidateController');
Route::resource('blogs','BlogController');
Route::resource('sendEmail','EmailController');


Route::get('facade',function(){
	
		return "Facades";
});

Route::get('mail',function(Request $request , Mailer $mailer){

	$user = Auth::user();
    $mailer->to('naveedanwar152@gmail.com')->send(new \App\Mail	\MyMail($user));
    //$data=['title'=>'Laravel'];

});













Route::get('markdown',function(){

    Mail::to("naveedanwar152@gmail.com")->send(new \App\Mail\MarkDownEmails());
    return redirect()->route('home');

});

Route::get('slack',function(){
    $user = Auth::user();
    $user->notify(new \App\Notifications\AccountCreated());
});












Route::get('req',function(Request $request){
   // echo  redirect($request->fullUrl())->withCookie(cookie()->forever('check', $request->query('ref')));
    //print_r( $request->getClientIps());

});

// 1- First of all got slack and youteam/apps search for incomming
// 2- php artisan make:notification abc
// 3- via['slack']
// 4- toslcack method return( new SlackMessage)->success()->content();
// 5- insinde User model write public function RouteNotificaionForSlack returns that hook
// 6- $user->notify(new abc());
// 7- and thats it




Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::resource('forums','ForumController');
Route::resource('reply','ReplyControler');

