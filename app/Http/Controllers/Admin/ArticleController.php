<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view("admin.articles.list");
    }

    public function create()
    {
        return view("admin.articles.create-update");
    }
}
