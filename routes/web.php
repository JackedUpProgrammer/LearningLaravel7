<?php

use App\tag;
use App\Post;
use App\User;
use App\Photo;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::resource('posts', 'PostsController');


// Route::get('/contact1', '\App\Http\Controllers\PostsController@contact');


// Route::get('/post_name/{postname}', '\App\Http\Controllers\PostsController@post_name');


// Route::get('/post_content/{id}/{name}/{password}', '\App\Http\Controllers\PostsController@content');


// Route::get('/post/{id}/{name}', function ($id,$name) { 
//     return "this is post " . $id . "." . " And your name is $name";
// });


// Route::get('admin/posts/example',array('as'=> 'admin/home' , function () {
//     $url= route('admin/home');
//     return "this url is ". $url;
// }));












/*
|--------------------------------------------------------------------------
|ELOQUENT 
|--------------------------------------------------------------------------
*/

// //read all posts
// Route::get('/read', function(){
//     $posts =Post::all();
//         foreach($posts as $post)
//             {
//                 return $post -> title;
//             }
// });

// //read one post
// Route::get('/find', function(){
//     $post =Post::find(4);
//             return $post->title;
// });

// //read with constraints
// Route::get('/findwhere', function(){
//     $posts = Post::where('id',4)->orderBy('id', 'desc')->take(2)->get();
//         return $posts;
// });

// //more ways to read
// Route::get('/findmore', function(){

//     // $posts = Post::findOrFail(4);
//     //     return $posts;

//     //$posts = Post::where('users_count', '<', '50')->firstOrFail();
//     //     return $posts;

// });

// //save a new post
// Route::get('/basicinsert', function(){
//     $post = new Post;
//     $post->title = 'new ORM title66';
//     $post->body = 'wow eloquent is cool66';
//     $post->save();
// });

// //update a current post
// Route::get('/basicupdate', function(){
//     $post = Post::find(4);
//     $post->title = 'new ORM title3';
//     $post->body = 'wow eloquent is cool3';
//     $post->save();
// });

// //create a post //needed to be made safe in model // configuring mass assignment
// Route::get('/create', function(){
// Post::create(['title'=>'hi all', 'body'=>'how are you']);
// });


// //update a post
// Route::get('/update', function(){
//    Post::where('id', 7)->where('is_admin',0)->update(['title'=>'new update title', 'body'=>'new update body']);
// });

// //delete a post
// Route::get('/delete', function(){
// $post = Post::find(10);
// $post ->delete();
// });

// //delete a post
// Route::get('/delete2', function(){
//     Post::destroy([4]);
// });


// //delete multiple posts
// Route::get('/deletemultiple', function(){
//     // Post::destroy([4,5,6,7]);
//     // //or
//     // Post::where('is_admin',)->delete();
// });


// //softdeletes
// Route::get('/softdelete', function(){
//     Post::find(11)->delete();
// });

// //read the softdeletes
// Route::get('/readsoftdelete', function(){ 
//    $post = Post::withTrashed()->where('id',11)->get();
//    return $post;
//     //onlyTrashed can also be used here

// });


// //read multiple the softdeletes
// Route::get('/readsoftdelete2', function(){ 
//     $post = Post::onlyTrashed()->where('is_admin',0)->get();
//     return $post;
//     //or
//     // Route::get('/readsoftdelete', function(){ 
//     //     $post = Post::withTrashed()->where('is_admin',0)->get();
//     //     return $post;
//  });



// //restore the soft delete
// Route::get('/restoresoftdeletes', function(){
//     Post::withTrashed()->where('is_admin',0)->restore();
// });


// //if we delete now it gets softdeleted , we need to make it normal delete again
// Route::get('/forcedelete', function(){
//     Post::onlyTrashed()->where('is_admin',0)->forceDelete();
// });











/*
|--------------------------------------------------------------------------
|Eloquent Relationshiops
|--------------------------------------------------------------------------
*/

// //one to one relationship (get post that belongs to this user)
// Route::get('/post/{id}/user', function($id){
// return User::find($id)->post;
// // return User::find($id)->post->title;
// // return User::find($id)->post->content;
// });

// //inverse relationship (get user that belongs to this post)
// Route::get('/user/{id}/post', function($id){
// return Post::find($id)->user->name; 
// });

// //One to many relationship (get all posts that belong to this user)
// Route::get('/posts', function(){
// $user = User::find(1);
// foreach ($user->posts as $post){
//     echo $post->title . "<br>";
//     //echo coz cant return more than one things
// }
// });

// //many to many relationships
// Route::get('/user/{id}/role', function($id){
//     $user =User::find($id);
//     foreach($user->roles as $role){
//         return $role->name;
//     }
// });

// //many to many relationships
// Route::get('/user/{id}/role2', function($id){
//     $user =User::find($id)->roles()->orderBy('id', 'desc')->get();
//     return $user;
// });


// //accesing the intermediate table which is the pivot tavle
// Route::get('/user/pivot', function(){
// $user = User::find(1);
// foreach ($user->roles as $role){
//     echo $role->pivot->created_at;
// }
// });

// //has many through realationship
// Route::get('/user/country', function(){
//     $country = Country::find(2);
//     foreach ($country->posts as $post){
//         echo $post->title;
//     }
// });


// //plymorphic relationship//users
// Route::get('/user/photos', function(){
// $user = User::find(1);
// foreach ($user->photos as $photo){
//     return $photo->path;
// }
// });

// //plymorphic relationship//posts
// Route::get('/post/photos', function(){
//     $post = Post::find(2);
//     foreach ($post->photos as $photo){
//         return $photo->path;
//     }
//     });


// //inverse polymorphic relationship //getting the owner post/user of the photo
// Route::get('/photo/{id}/postoruser', function($id){
//   $photo=Photo::findOrFail($id);
//   return $photo->imageable;
// });


// //plymorphic many to many relationship
// Route::get('/post/tag', function(){
//     $post = Post::findOrFail(1);
//     foreach($post->tags as $tag){
//         echo $tag->name;
//     }
// });



// //inverse polymorphic many to many relationship //getting the owner post/video of the tag
// Route::get('/tag/post', function(){
//     $tag=tag::find(1);
    
//     foreach($tag->posts as $post){
//     echo $post->title;
//     }
//   });

 







/*
|--------------------------------------------------------------------------
|DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){
//   $inserted =  DB::insert('INSERT INTO posts(title, body) VALUES(?, ?)', ['PHP with Laravel', 'Laravel is the best']);
//   return $inserted;
// });



// Route::get('/read', function(){
// $results =DB::select('SELECT * FROM posts where id = ?', [1]);
//     foreach($results as $post)
//     {
//         return $post->title;
//     }
// });


// Route::get('/update', function(){
//  $updated =  DB::update('UPDATE posts SET title = ? WHERE id = ?',["new title", 1]);
//  return $updated;
// });


// Route::get('/delete', function(){
//   $deleted =  DB::delete('DELETE from posts WHERE id = ?',[3]);
//   return $deleted;
// });





/*
|--------------------------------------------------------------------------
|Forms and Validation- small CRUD application
|--------------------------------------------------------------------------
*/

Route::resource('/posts','PostsController');


