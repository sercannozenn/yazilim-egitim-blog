<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        $parentCategories = Category::all();
        $users = User::all();

        $parentID = $request->parent_id;
        $userID = $request->user_id;

//        $categoryQuery = Category::with(["parentCategory:id,name", 'user']);
//
//        if (!is_null($parentID))
//        {
//            $categoryQuery->where("parent_id", $parentID);
//        }
//        $categoryQuery->paginate(5);


        $categories = Category::with(["parentCategory:id,name", 'user'])
//            ->where(function($query) use ($parentID, $userID){
//                if (!is_null($parentID))
//                {
//                    $query->where('parent_id', $parentID);
//                }
//                if (!is_null($userID))
//                {
//                    $query->where('user_id', $userID);
//                }
//            })
//            ->where("parent_id", $parentID)
            ->name($request->name)
            ->description($request->description)
            ->slug($request->slug)
            ->order($request->order)
            ->status($request->status)
            ->featureStatus($request->feature_status)
            ->user($request->user_id)
            ->parentCategory($request->parent_id)
            ->orderBy("order", "DESC")
            ->paginate(5);

        return view("admin.categories.list", [
            'list' => $categories,
            "users" => $users,
            "parentCategories" => $parentCategories
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view("admin.categories.create-update", compact("categories"));
    }

    public function store(CategoryStoreRequest $request)
    {
        $slug = Str::slug($request->slug);

        try
        {
            $category                  = new Category();
            $category->name            = $request->name;
            $category->slug            = is_null($this->slugCheck($slug)) ? $slug : Str::slug($slug . time());
            $category->description     = $request->description;
            $category->status          = $request->status ? 1 : 0;
            $category->parent_id       = $request->parent_id;
            $category->feature_status  = $request->feature_status ? 1 : 0;
            $category->seo_keywords    = $request->seo_keywords;
            $category->seo_description = $request->seo_description;
            $category->user_id         = random_int(1, 10);
            $category->order           = $request->order;

            $category->save();
        }
        catch (\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        alert()->success('Ba??ar??l??', "Kategori Kaydedildi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->back();
    }

    public function slugCheck(string $text)
    {
        return Category::where("slug", $text)->first();
    }

    public function changeStatus(Request $request)
    {
        $request->validate(['id' => ['required', 'integer', "exists:categories"]]);

        $categoryID = $request->id;


        $category = Category::where("id", $categoryID)->first();

        $oldStatus = $category->status;

        $category->status = !$category->status;
        $category->save();

        $statusText = ($oldStatus == 1 ? "Aktif" : "Pasif") . "'ten " . ($category->status == 1 ? "Aktif" : "Pasif");

        alert()->success('Ba??ar??l??', $category->name . " status " . $statusText . " olarak g??ncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        //        return redirect()->route("category.index");
        return redirect()->back();

    }

    public function changeFeatureStatus(Request $request)
    {
        $request->validate(['id' => ['required', 'integer', "exists:categories"]]);

        $categoryID = $request->id;


        $category = Category::where("id", $categoryID)->first();

        $oldStatus = $category->feature_status;

        $category->feature_status = !$category->feature_status;
        $category->save();

        $statusText = ($oldStatus == 1 ? "Aktif" : "Pasif") . "'ten " . ($category->feature_status == 1 ? "Aktif" : "Pasif");

        alert()->success('Ba??ar??l??', $category->name . " feature status de??eri " . $statusText . " olarak g??ncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("category.index");

    }

    public function delete(Request $request)
    {
        $request->validate(['id' => ['required', 'integer', "exists:categories"]]);

        $categoryID = $request->id;

        Category::where("id", $categoryID)->delete();

        $statusText = "Kategori Silindi";

        alert()->success('Ba??ar??l??', $statusText)->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("category.index");

    }

    public function edit(Request $request)
    {
        $categories = Category::all();

        $categoryID = $request->id;

        $category = Category::where("id", $categoryID)->first();

        if (is_null($category))
        {
            $statusText = "Kategori bulunamad??";

            alert()->error('Hata', $statusText)->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
            return redirect()->route('category.index');
        }

        return view("admin.categories.create-update", compact("category", 'categories'));

    }

    public function update(CategoryStoreRequest $request)
    {

        $slug      = Str::slug($request->slug);
        $slugCheck = $this->slugCheck($slug);

        $category       = Category::find($request->id);
        $category->name = $request->name;
        if ((!is_null($slugCheck) && $slugCheck->id == $category->id) || is_null($slugCheck))
        {
            $category->slug = $slug;
        }
        else if (!is_null($slugCheck) && $slugCheck->id != $category->id)
        {
            $category->slug = Str::slug($slug . time());
        }
        else
        {
            $category->slug = Str::slug($slug . time());
        }


        $category->description     = $request->description;
        $category->status          = $request->status ? 1 : 0;
        $category->parent_id       = $request->parent_id;
        $category->feature_status  = $request->feature_status ? 1 : 0;
        $category->seo_keywords    = $request->seo_keywords;
        $category->seo_description = $request->seo_description;
        //        $category->user_id         = random_int(1, 10);
        $category->order = $request->order;

        $category->save();

        alert()->success('Ba??ar??l??', "Kategori g??ncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route("category.index");
    }
}
