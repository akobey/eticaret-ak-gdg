<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function list()
    {
        return view("front.product-list");
    }

    public function detail()
    {
        return view("front.product-detail");
    }
}
