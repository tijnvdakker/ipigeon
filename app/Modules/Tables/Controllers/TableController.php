<?php

namespace App\Modules\Tables\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Tables\Models\TableModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{

    //Show overview
    public function overview()
    {
        $tables = TableModel::All();
        return view('Tables::overview', ['tables' => $tables]);
    }
}