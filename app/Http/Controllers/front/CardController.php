<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function card()
    {
        return view("front.card");
    }
}
