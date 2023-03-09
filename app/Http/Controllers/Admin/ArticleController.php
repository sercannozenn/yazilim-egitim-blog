<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateReqeust;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

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

    public function store(ArticleCreateReqeust $request)
    {
        // Image
        $originalName = $request->file("image")->getClientOriginalName();
        $originalExtension = $request->file("image")->getClientOriginalExtension();
        $fileName = Str::slug(explode(".", $originalName)[0]) . "." . $originalExtension;
        $uploadPath = "articles";
        $checkPath = "storage/articles/";

        if (file_exists(public_path($checkPath . $fileName)))
        {
            return redirect()->back()->withErrors([
                'image' => "Aynı image daha önce yüklenmiştir."
            ]);
        }

        $data = $request->except("_token");

        $slug      = Str::slug($data['slug'] ?? $data['title']);
        $titleSlug = Str::slug($data['title']);

        $checkSlug = $this->slugCheck($slug);
        //            $slug = is_null($this->slugCheck($slug)) ? $slug : (is_null($this->slugCheck($titleSlug) ? $titleSlug : Str::slug($slug . time())));
        if (!is_null($checkSlug))
        {
            $checkTitleSlug = $this->slugCheck($titleSlug);
            if (is_null($checkTitleSlug))
            {
                $slug = $titleSlug;
            }
            else
            {
                $slug = Str::slug($slug . time());
            }
        }

        $data['slug'] = $slug;
        $data['image'] = $checkPath . $fileName;
        $data['user_id'] = \Auth::id();

        Article::create($data);
        $request->file("image")->storeAs($uploadPath, $fileName);

        alert()->success('Başarılı', "Makale Kaydedildi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

    public function slugCheck(string $text)
    {
        return Article::where("slug", $text)->first();
    }
}
