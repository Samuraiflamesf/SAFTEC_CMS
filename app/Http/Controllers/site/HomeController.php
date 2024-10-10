<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __invoke()
    {
        // Buscando todos os registros de 'phones'
        $links = link::all();

        return view(
            'site.client.home',
            ['links' => $links]
        );
    }
}
