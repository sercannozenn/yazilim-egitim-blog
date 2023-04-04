<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $searchText = $request->search_text;
        $userSearchText = $request->user_search_text;
        $model = $request->model;
        $action = $request->action;
        $logs = Log::with([
            "loggable",
            'user'
        ])
            ->where(function($query) use($model, $action, $searchText){
                if (!is_null($model))
                {
                    $query->where("loggable_type",  $model);
                }
                if (!is_null($action))
                {
                    $query->where("action",  $action);
                }
                if (!is_null($searchText))
                {
                    $query->where(function($q) use ($searchText){
                        $q->orwhere("data", "LIKE", "%" . $searchText . '%')
                          ->orwhere("created_at", "LIKE", "%" . $searchText . '%');
                    });
                }
            })
            ->whereHas("loggable")
            ->whereHas("user", function($query) use($userSearchText){
                $query->where("name", "LIKE", "%" . $userSearchText . '%')
                    ->orWhere("email", "LIKE", "%" . $userSearchText . '%')
                    ->orWhere("username", "LIKE", "%" . $userSearchText . '%');
            })
            ->orderBy("id", "DESC")
            ->paginate(20);

        $actions = Log::ACTIONS;
        $models = Log::MODELS;

        return view("admin.logs.list", [
                'list' => $logs,
                'actions' => $actions,
                'models' => $models
            ]);
    }

    public function getLog(Request $request)
    {
        $id = $request->id;
        $dataType = $request->data_type;

        $log = Log::query()->with("loggable")->findOrFail($id);

        $logtype = $log->loggable_type;

        $data = json_decode($log->data);
        if ($dataType == "data")
        {
            return response()->json()->setData($data)->setStatusCode(200);
        }
        $data = $log->loggable;
        return view('admin.logs.model-log-view', compact("data", 'logtype'));
    }
}
