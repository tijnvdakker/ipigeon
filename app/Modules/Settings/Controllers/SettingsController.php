<?php

namespace App\Modules\Settings\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Settings\Models\SettingsModel;

class SettingsController extends Controller
{

    public function overview()
    {
        return view('Settings::overview');
    }
}