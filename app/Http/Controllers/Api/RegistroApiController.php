<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;

class RegistroApiController extends Controller
{

    public function latest()
    {
        $registros = Registro::where('eprint_status', 'archive')
            ->select(
                'title',
                'eprintid',
                'id',
                'date_year',
                'event_location',
                'publication',
                'volume',
                'type',
                'issn',
                'isbn',
                'publisher as editor',
                'number',
                'pagerange as page',
                'created_at',
                'updated_at'
            )
            ->where(
                'created_at', '>=', Carbon::now()->subDays(80)->firstOfMonth()->toDateTimeString()
            )
            ->with('author')
            ->latest()->paginate(18);
        return response()->json([
            'registro' => $registros
        ]);
    }
}
