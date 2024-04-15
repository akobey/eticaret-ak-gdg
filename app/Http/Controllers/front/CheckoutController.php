<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        return view("front.checkout");
    }
}
