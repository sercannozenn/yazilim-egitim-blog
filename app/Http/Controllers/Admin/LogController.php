<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with(["loggable", 'user'])->paginate(20);


        return view("admin.logs.list", ['list' => $logs]);
    }

    public function getLog(Request $request)
    {
        $id = $request->id;
        $log = Log::query()->with("loggable")->findOrFail($id);

        $logtype = $log->loggable_type;

        $data = $log->loggable;

        return view('admin.logs.log-view', compact("data", 'logtype'));
    }
}
