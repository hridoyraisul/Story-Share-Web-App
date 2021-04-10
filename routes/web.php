<?php

use Illuminate\Support\Facades\Route;

//-------------------------------------//
//--------------CLIENT PANEL------------//

Route::get('/', function () {
    return view('client.index');
});
Route::get('/register', function () {
    return view('client.reg');
});
Route::post('/register', [\App\Http\Controllers\ClientController::class,'regClient']);
Route::get('/settings-page', function (){
    return view('client.profileUpdate');
});
Route::post('/settings-page',[\App\Http\Controllers\ClientController::class,'updateClient']);
Route::get('/login', function (){
    return view('client.login');
});
Route::get('/logout',function (){
    session()->forget([
        'client_id',
        'client_name',
        'client_dp'
    ]);
    return redirect()->to('/');
});
Route::post('/',[\App\Http\Controllers\ClientController::class,'loginClient']);
Route::get('/my-story', function (){
    return view('client.myStory');
});
Route::get('/create-story', function (){
    return view('client.createStory');
});
Route::post('/create-story', [\App\Http\Controllers\StoryController::class,'createStory']);
Route::get('/profile', function (){
    return view('client.profileView');
});
Route::get('/view-story/{story_id}', function ($story_id){
    $story = \App\Models\Story::where('id',$story_id)->first();
    $comments = \App\Models\Comment::where('story_id',$story_id)->orderBy('id', 'ASC')->get();
    return view('client.storyView',compact('story','comments'));
});
Route::post('/view-story/{story_id}', [\App\Http\Controllers\StoryController::class,'addReaction']);
Route::post('/add-comment',[\App\Http\Controllers\StoryController::class,'addComment']);

//-------------------------------------//
//--------------ADMIN PANEL------------//
Route::get('/admin', function (){
    return view('admin.index');
});
Route::get('/admin/home', function (){
    if (session('admin_id')){
        return view('admin.home');
    }
    else{
        return redirect()->to('/admin');
    }
});
Route::post('/admin', [\App\Http\Controllers\AdminController::class,'loginAdmin']);
Route::get('/admin/logout',function (){
    session()->forget([
        'admin_id',
        'admin_name',
        'admin_email',
    ]);
    return redirect()->to('/admin');
});
Route::get('/admin/client-list', function (){
    return view('admin.clientTable');
});
Route::get('/admin/all-stories', function (){
    return view('admin.storyTable');
});
Route::delete('/admin/remove-client/{client_id}', function ($client_id){
    \App\Models\Client::where('id',$client_id)->delete();
    return redirect()->back()->with('success_delete','Removed Successfully');
});
Route::get('/admin/block-client/{client_id}', function ($client_id){
    \App\Models\Client::where('id',$client_id)->update(['status'=>'deactive']);
    return redirect()->back()->with('success_block','Blocked Successfully');
});
Route::get('/admin/active-client/{client_id}', function ($client_id){
    \App\Models\Client::where('id',$client_id)->update(['status'=>'active']);
    return redirect()->back()->with('success_active','Activated Successfully');
});
Route::get('/admin/block-story/{story_id}', function ($story_id){
    \App\Models\Story::where('id',$story_id)->update(['status'=>'block']);
    return redirect()->back()->with('success_block','Story Blocked Successfully');
});
Route::get('/admin/active-story/{story_id}', function ($story_id){
    \App\Models\Story::where('id',$story_id)->update(['status'=>'active']);
    return redirect()->back()->with('success_active','Story Activated Successfully');
});

