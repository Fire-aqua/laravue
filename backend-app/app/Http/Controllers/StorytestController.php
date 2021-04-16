<?php

namespace App\Http\Controllers;

use App\Models\Storytest;
use Illuminate\Http\Request;

class StorytestController extends Controller
{
    public function getStories()
    {
        $story = Storytest::all();
        return response()->json($story->toArray());
    }
}
