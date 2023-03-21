<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateReqeust;
use App\Http\Requests\ArticleFilterRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\UserLikeArticle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;

class ArticleController extends Controller
{
    public function index(ArticleFilterRequest $request)
    {
        $users = User::all();
        $categories = Category::all();

        $list = Article::query()
            ->with(["category", "user"])
            ->where(function($query) use ($request){
                $query->orWhere("title", "LIKE", "%" . $request->search_text . "%")
                      ->orWhere("slug", "LIKE", "%" . $request->search_text . "%")
                      ->orWhere("body", "LIKE", "%" . $request->search_text . "%")
                      ->orWhere("tags", "LIKE", "%" . $request->search_text . "%");
            })
            ->status($request->status)
            ->category($request->category_id)
            ->user($request->user_id)
            ->publishDate($request->publish_date)
            ->where(function($query) use ($request)
            {
                if ($request->min_view_count)
                {
                    $query->where('view_count', ">=", (int)$request->min_view_count);
                }

                if ($request->max_view_count)
                {
                    $query->where('view_count', "<=", (int)$request->max_view_count);
                }

                if ($request->min_like_count)
                {
                    $query->where('like_count', ">=", (int)$request->min_like_count);
                }

                if ($request->max_like_count)
                {
                    $query->where('like_count', "<=", (int)$request->max_like_count);
                }
            })
            ->paginate(5);

        return view("admin.articles.list", compact("users", "categories", "list"));
    }

    public function create()
    {
        $categories = Category::all();

        return view("admin.articles.create-update", compact("categories"));
    }

    public function store(ArticleCreateReqeust $request)
    {
        if(!is_null($request->image))
        {
            $imageFile = $request->file("image");
            $originalName = $imageFile->getClientOriginalName();
            $originalExtension = $imageFile->getClientOriginalExtension();
            $explodeName = explode(".", $originalName)[0];
            $fileName = Str::slug($explodeName) . "." . $originalExtension;

            $folder = "articles";
            $publicPath = "storage/" . $folder;

            if (file_exists(public_path($publicPath . $fileName)))
            {
                return redirect()
                    ->back()
                    ->withErrors([
                        'image' => "Aynı görsel daha önce yüklenmiştir."
                    ]);
            }
        }

        $data = $request->except("_token");
        $slug = $data['slug'] ?? $data["title"];
        $slug = Str::slug($slug);
        $slugTitle = Str::slug($data["title"]);

        $checkSlug = $this->slugCheck($slug);

        if (!is_null($checkSlug))
        {
            $checkTitleSlug = $this->slugCheck($slugTitle);
            if (!is_null($checkTitleSlug))
            {
                // Title Slug dolu geldiyse
                $slug = Str::slug($slug . time());
            }
            else
            {
                $slug = $slugTitle;
            }
        }

        $data["slug"] = $slug;
        if (!is_null($request->image))
        {
            $data["image"] = $publicPath . "/" . $fileName;
        }
        $data["user_id"] = auth()->id();

        Article::create($data);
        if (!is_null($request->image))
        {
            $imageFile->storeAs($folder,  $fileName);
        }

        alert()->success('Başarılı', "Makale Kaydedildi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

    public function edit(Request $request, int $articleID)
    {
//        $article = Article::find($articleID);
//        $article = Article::where("id", $articleID)->firstOrFail();
        $article = Article::query()
                            ->where("id", $articleID)
                            ->first();
        $categories = Category::all();
        $users = User::all();
        if (is_null($article))
        {
            $statusText = "Makale bulunamadı";

            alert()->error('Hata', $statusText)->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
            return redirect()->route('article.index');
        }

        return view("admin.articles.create-update", compact("article", "categories", "users"));
    }

    public function update(ArticleUpdateRequest $request)
    {
        $data = $request->except("_token");
        $slug = $data['slug'] ?? $data["title"];
        $slug = Str::slug($slug);
        $slugTitle = Str::slug($data["title"]);

        $checkSlug = $this->slugCheck($slug);

        if (!is_null($checkSlug))
        {
            $checkTitleSlug = $this->slugCheck($slugTitle);
            if (!is_null($checkTitleSlug))
            {
                // Title Slug dolu geldiyse
                $slug = Str::slug($slug . time());
            }
            else
            {
                $slug = $slugTitle;
            }
        }

        $data["slug"] = $slug;
        if (!is_null($request->image))
        {
            $imageFile = $request->file("image");
            $originalName = $imageFile->getClientOriginalName();
            $originalExtension = $imageFile->getClientOriginalExtension();
            $explodeName = explode(".", $originalName)[0];
            $fileName = Str::slug($explodeName) . "." . $originalExtension;

            $folder = "articles";
            $publicPath = "storage/" . $folder;

            if (file_exists(public_path($publicPath . $fileName)))
            {
                return redirect()
                    ->back()
                    ->withErrors([
                        'image' => "Aynı görsel daha önce yüklenmiştir."
                    ]);
            }

            $data["image"] = $publicPath . "/" . $fileName;

        }
        $data["user_id"] = auth()->id();

        $articleQuery = Article::query()
            ->where("id", $request->id);

        $articleFind = $articleQuery->first();

        $articleQuery->update($data);


        if (!is_null($request->image))
        {
            if (file_exists(public_path($articleFind->image)))
            {
                \File::delete(public_path($articleFind->image));
            }
            $imageFile->storeAs($folder,  $fileName);
        }

        alert()->success('Başarılı', "Makale güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route("article.index");
    }

    public function slugCheck(string $text)
    {
        return Article::where("slug", $text)->first();
    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $articleID = $request->articleID;

        $article = Article::query()
            ->where("id", $articleID)
            ->first();

        if ($article)
        {
            $article->status = $article->status ? 0 : 1;
            $article->save();

            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => $article, "article_status" => $article->status ])
                ->setStatusCode(200);
        }

        return response()
            ->json(['status' => "error", "message" => "Makale bulunamadı" ])
            ->setStatusCode(404);
    }

    public function delete(Request $request)
    {
        $articleID = $request->articleID;

        $article = Article::query()
            ->where("id", $articleID)
            ->first();
        if ($article)
        {
            $article->delete();
            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => "" ])
                ->setStatusCode(200);
        }
        return response()
            ->json(['status' => "error", "message" => "Makale bulunamadı" ])
            ->setStatusCode(404);
    }

    public function favorite(Request $request)
    {
        $article = Article::query()->with(["articleLikes" => function($query)
        {
            $query->where("user_id", auth()->id());
        }
        ])->where("id", $request->id)->firstOrFail();


        if ($article->articleLikes->count())
        {
            $article->articleLikes()->delete();
            $article->like_count--;
            $process = 0;
//            UserLikeArticle::query()->where("user_id", auth()->id())->where("article_id", $article->id)->delete();
        }
        else
        {
            UserLikeArticle::create([
                'user_id' => auth()->id(),
                "article_id" => $article->id
            ]);
            $article->like_count++;
            $process = 1;
        }


        $article->save();

        return response()
            ->json(['status' => "success", "message" => "Başarılı", "like_count" => $article->like_count, "process" => $process])
            ->setStatusCode(200);
    }

}
