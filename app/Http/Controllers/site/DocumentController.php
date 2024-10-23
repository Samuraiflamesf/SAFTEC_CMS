<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\NameFolder;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function __invoke()
    {
        // Carregar pastas junto com seus documentos
        $folders = NameFolder::with('documents')->get();
        return view(
            'site.client.document',
            compact('folders')
        );
    }
}