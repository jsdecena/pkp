<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categories;
use App\Models\Suppliers;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
}