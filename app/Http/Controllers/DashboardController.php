<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dailyAnalysis()
    {
        return response()->json(['message' => 'Details fetched successfully'], 200);
    }
}
