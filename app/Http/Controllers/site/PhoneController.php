<?php

namespace App\Http\Controllers\Site;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class PhoneController extends Controller
{

    public function __invoke()
    {
        // Buscando todos os registros de 'phones'
        $phones = Phone::all();
        return view(
            'site.client.phone',
            ['phones' => $phones]
        );
    }
}