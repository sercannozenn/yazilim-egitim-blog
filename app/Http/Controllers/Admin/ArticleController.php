<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view("admin.articles.list");
    }

    public function create()
    {
        $categories = Category::all();

        return view("admin.articles.create-update", compact("categories"));
    }
}
