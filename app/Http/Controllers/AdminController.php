<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tenant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Buscando todos os registros de 'link'
        $links = Link::all();
        $tenants = Tenant::all();
        $count = $tenants->count(); // Contando quantos tenants existem

        return view("site.admin.home", ['links' => $links, 'count' => $count]);
    }
}
