<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneController extends Controller
{

    public function __invoke()
    {
        return view(view: 'site.phone');
    }
}