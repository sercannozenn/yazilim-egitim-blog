<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $articlesData = Article::query()
            ->select("title", "view_count")
            ->orderBy("view_count", "DESC")
            ->limit(7)
            ->pluck("title", "view_count")
            ->toArray();

        $userData = User::query()
            ->select([
                DB::raw("sum(if(is_admin=1, 1, 0)) as adminCount"),
                DB::raw("sum(if(is_admin=0, 1, 0)) as userCount"),
            ])->first();


        return view("admin.index", compact("articlesData", "userData"));
    }
}
