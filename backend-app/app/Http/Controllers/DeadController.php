<?php

namespace App\Http\Controllers;

use App\Models\Dead;
use Illuminate\Http\Request;

class DeadController extends Controller
{
    public function showTable()
    {
        $deads = Dead::all();
        return response()->json($deads->toArray());
    }
}
