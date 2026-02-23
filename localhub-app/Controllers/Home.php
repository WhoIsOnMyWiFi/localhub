<?php
namespace App\Controllers;

use CodeIgniter\Controller;


class Home extends Controller
{
    var $uri;

    public function __construct()
    {
    }

    public function index()
    {
        // echo view('includes/lib-header');
        echo view('home');
        // echo view('includes/lib-footer');
    }

}