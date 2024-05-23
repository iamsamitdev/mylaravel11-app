<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// กำหนดตัวแปร $users
$users = [
    [
        'name' => 'John Doe',
        'email' => 'john@email.com',
    ],
    [
        'name' => 'Jane Doe',
        'email' => 'jane@email.com',
    ]
];

// GET /api/user
Route::get('/user',  function (Request $request) use ($users){
    return $users;
});

// POST /api/user
// Payload: { "name": "John Doe", "email": "john@email.com"}
Route::post('/user', function (Request $request)  use ($users){
    // Retrieve the name and email from the request body payload
    $name = $request->input('name');
    $email = $request->input('email');

    // Add the new user to the users array
    $users[] = [
        'name' => $name,
        'email' => $email,
    ];

    // Return the name and email
    return $users;
});

// PUT /api/user/1
// Payload: { "name": "Jack Doe", "email": "jack@email.com"}
Route::put('/user/{id}', function (Request $request, $id) use ($users) {
    // Retrieve the name and email from the request body payload
    $name = $request->input('name');
    $email = $request->input('email');

    // Update the user with the given id
    $users[$id] = [
        'name' => $name,
        'email' => $email,
    ];

    // Return the name and email
    return $users;
});

// DELETE /api/user/1
Route::delete('/user/{id}', function (Request $request, $id) use ($users) {
    // Remove the user with the given id
    unset($users[$id]);

    // Return the name and email
    return $users;
});