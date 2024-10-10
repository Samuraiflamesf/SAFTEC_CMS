<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function __invoke()
    {
        return view(view: 'site.client.document');
    }
}
