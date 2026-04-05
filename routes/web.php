<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/services', 'services');
Route::view('/showcases', 'showcases');
Route::view('/blog', 'blog');

Route::get('/formtest', function(){
    $emails = session('emails', []);
    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){
    request() ->validate(['email' => ['required', 'email']]);

    $email = request('email');
    $emails = session('emails', []);
   
    if (count($emails) >= 5) {
        return redirect('/formtest') ->withErrors(['email' => 'Maximum of 5 emails reached!']);
    }
    
    if (in_Array($email, $emails)) {
        return redirect('/formtest')->withErrors(['email' => 'Email already exists!']);
    }

    session()->push('emails', $email);

    return redirect('/formtest')->with('success', 'Email added successfully!');
});

Route::post('/formtest/delete', function() {
    $index = request('index');
    $emails = session('emails', []);

    if (isset($emails[$index])) {
        array_splice($emails, $index, 1);
        session(['emails' => array_values($emails)]);
    }
    return redirect('/formtest')->with('success', 'Email deleted!');
});

Route::get('/delete-emails', function(){
    session()->forget('emails');
    return redirect('/formtest');
});