<?php

namespace App\Http\Controllers;

use App\Models\paineis;
use App\Models\Painel;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // Buscando todos os registros de 'link'

    public function __invoke(Request $request)
    {
        $painels = Painel::all();
        return view("site.admin.painel", ['painels' => $painels]);
    }
}
