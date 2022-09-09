<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('about', [
            "name" => "Michel Sinambela",
            "email" => "sinambelamichel05@gmail.com",
            "image" => "pasphoto.png"
        ]);
    }

    public function create()
    {
        // 
    }

    public function delete(){
        // 
    }
}
