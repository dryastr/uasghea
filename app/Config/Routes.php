<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('admin', ['filter' => 'noauth'], function ($routes) {
    $routes->add('login', 'Admin\Admin::login');
    $routes->add('articlesAll', 'Admin\Admin::articleView');


});

$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    $routes->add('logout', 'Admin\Admin::logout');
    $routes->add('article', 'Admin\Article::index');
    $routes->add('article/tambah', 'Admin\Article::tambah');
    $routes->add('article/edit/(:any)', 'Admin\Article::edit/$1');
    $routes->add('sukses', 'Admin\Admin::sukses');
    $routes->add('home', 'Admin\Admin::home');
    $routes->add('articlesAllLogin', 'Admin\Admin::articleView');

    // $routes->add('page', 'Admin\Page::index');
    // $routes->add('page/tambah', 'Admin\Page::tambah');
    // $routes->add('page/edit/(:any)', 'Admin\Page::edit/$1');

});

$routes->add('article/(:any)', 'Article::index/$1');
// $routes->add('page/(:any)', 'Page::index/$1');