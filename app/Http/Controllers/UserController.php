<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $products = [];
    private $_filters;
    private $showBanner = false;

    public function __construct()
    {
    }
}
