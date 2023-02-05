<?php
use \Framework\Route;
use \Framework\DatabaseTable;


/*
    ROUTE AND CONTROLLER FOR LISTING A TABLE TO THE ADMINS --> ADMIN LOGIN REQUIRED!!
*/

Route::create_new_link('get','list/story', function () {
    $stories = (new DatabaseTable('story'))->findAll();
    return [
        'title'=>'Stories list','template'=>'admin_story_list', 'variables' => ['stories'=>$stories]
    ];
});


Route::create_new_link('get','list/car', function () {
    return [
        'title'=>'Admin cars List','template'=>'admin_car_list',
        'variables'=>['cars'=>(new DatabaseTable('cars'))->findAll()]
    ];

});



Route::create_new_link('get','list/user', function () {
    return [
        'title'=>'Admin manufacturer List','template'=>'admin_user_list',
        'variables'=>['users'=>(new DatabaseTable('users'))->findAll()]
    ];

});


Route::create_new_link('get','list/manufacturer', function () {
    return [
        'title'=>'Admin cars List','template'=>'admin_category_list',
        'variables'=>['categories'=>(new DatabaseTable('manufacturers'))->findAll()]
    ];

});

/*
    ROUTE AND CONTROLLER FOR DELETING A RECORD FROM THE DATABASE --> ADMIN LOGIN REQUIRED!!
*/

Route::create_new_link('post','delete/story', function () {
    unset($_POST['submit']);
    (new DatabaseTable('story'))->delete($_POST['id']);
    Route::g_link_header('/list/story');
});

 // DELETING USER NEEDS ACCESS TO BE HIGHER THAN 10
Route::create_new_link('post','delete/user', function () {
    unset($_POST['submit']);
    (new DatabaseTable('users'))->delete($_POST['id']);
    Route::g_link_header('/list/user');

});

Route::create_new_link('post','delete/car', function () {
    unset($_POST['submit']);
    (new DatabaseTable('cars'))->delete($_POST['id']);
    Route::g_link_header('/list/car');

});



Route::create_new_link('post','delete/category', function () {
    unset($_POST['submit']);
    (new DatabaseTable('manufacturers'))->delete($_POST['id']);
    Route::g_link_header('/list/manufacturer');

});


/*
    ROUTE AND CONTROLLER FOR EDITING A RECORD IN THE DATAABSE ADMIN LOGIN IS REQUIRED
*/

Route::create_new_link('post','edit/category', function () {
    unset($_POST['submit']);
    (new DatabaseTable('manufacturers'))->update($_POST);
    Route::g_link_header('/list/manufacturer');

});



Route::create_new_link('get','edit/category', function () {
    return [
        'title'=>'Add Manufacturer','template'=>'admin_edit_category', 'variables'=>[
            'currentMan' => (new DatabaseTable('manufacturers'))->find('id', $_GET['params'][1])[0]
        ]
    ];
});


Route::create_new_link('post','edit/car', function () {
    unset($_POST['submit']);
    (new DatabaseTable('cars'))->update($_POST);
    Route::g_link_header('/list/car');

});


Route::create_new_link('get','edit/car', function () {
    return [
        'title'=>'Edit Car','template'=>'admin_edit_car', 'variables'=>[
            'car' => (new DatabaseTable('cars'))->find('id', $_GET['params'][1])[0],
            'categories' => (new DatabaseTable('manufacturers'))->findAll()
            
        ]
    ];
});

/*
    ROUTES AND CONTROLLERS FOR ADDING NEW DATA TO THE DATABASE 
*/


Route::create_new_link('POST','add/user', function () {
    unset($_POST['submit']);
    (new DatabaseTable('users'))->insert($_POST);
    Route::g_link_header('/list/user');
});


Route::create_new_link('get','add/user', function () {
    return [
        'title'=>'Add User ','template'=>'admin_add_user'
    ];
});


Route::create_new_link('post','add/story', function () {
    unset($_POST['submit']);
    $_POST['user']=$_SESSION['username'];
    (new DatabaseTable('story'))->insert($_POST);
    Route::g_link_header('/add/story');

});


Route::create_new_link('get','add/story', function () {
    return [
        'title'=>'Add Manufacturer','template'=>'admin_add_story'
    ];
});

Route::create_new_link('post','add/car', function () {
    unset($_POST['submit']);
    (new DatabaseTable('cars'))->insert($_POST);
    Route::g_link_header('/add/car');

});

Route::create_new_link('get','add/car', function () {
    return [
        'title'=>'Add Manufacturer','template'=>'admin_add_car',
        'variables'=>['categories' => (new DatabaseTable('manufacturers'))->findAll()]

    ];
});



Route::create_new_link('post','add/category', function () {
    unset($_POST['submit']);
    (new DatabaseTable('manufacturers'))->insert($_POST);
    Route::g_link_header('/add/category');

});


Route::create_new_link('get','add/category', function () {
    return [
        'title'=>'Add Manufacturer','template'=>'admin_add_category'
    ];
});


// LOGIN AND CREATE NEW USER
Route::create_new_link('post','login', function () {

    $user = (new DatabaseTable('users'))->find('username', $_POST['username']);
    if($user == null || $user[0]->password !=  $_POST['password']) {
        Route::g_link_header('login');
        return;
    }
    $user = $user[0];

    $_SESSION['id'] = $user->id;
    $_SESSION['user_system_accesss'] = $user->user_system_accesss;
    $_SESSION['username'] = $user->username;
    Route::g_link_header('home');
});

Route::create_new_link('get','logout', function () {
    session_destroy();
    Route::g_link_header('login');
});


Route::create_new_link('get','login', function () {
    return [
        'title'=>'Login','template'=>'admin_login_page'
    ];
});

// GENERAL USERS LINK

Route::create_new_link('get','showroom', function () {
    return [
        'title'=>'','template'=>'cars_by_category', 'variables'=>[
            'categories'=>(new DatabaseTable('manufacturers'))->findAll(),
            'cars'=> (new DatabaseTable('cars'))->findAll()
            ]
    ];
});


Route::create_new_link('get','cars/category', function () {
    return [
        'title'=>'','template'=>'cars_by_category', 'variables'=>[
            'categories'=>(new DatabaseTable('manufacturers'))->findAll(),
            'cars'=> (new DatabaseTable('cars'))->find('manufacturerId', $_GET['params'][1])
            ]
    ];
});



Route::create_new_link('get','Home', function () {
    $stories = (new DatabaseTable('story'))->findAll();
    return [
        'title'=>'Home','template'=>'home', 'variables' => ['stories'=>$stories]
    ];
});

Route::create_new_link('get','', function () {
    $stories = (new DatabaseTable('story'))->findAll();
    return [
        'title'=>'Home','template'=>'home', 'variables' => ['stories'=>$stories]
    ];
});


