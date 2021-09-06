<?php

namespace App\Modules\Analytics\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Analytics\Models\AnalyticsModel;

class AnalyticsController extends Controller
{

    public function overview()
    {
        return view('Analytics::overview');
    }
}