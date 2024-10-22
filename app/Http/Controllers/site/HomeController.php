<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function __invoke()
    {
        // Buscando todos os registros de 'link'
        $links = link::all();

        $users = User::whereMonth('date_birthday', Carbon::now()->month)
            ->get();

        return view(
            'site.client.home',
            ['links' => $links, 'users' => $users]
        );
    }
}