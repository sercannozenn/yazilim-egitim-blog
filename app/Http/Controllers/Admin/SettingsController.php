<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    public function show()
    {
        $settings = Settings::first();

        return view("admin.settings.update", compact("settings"));
    }

    public function update(SettingsRequest $request)
    {
        $settings = Settings::first();

        $settings->header_text = $request->header_text;
        $settings->footer_text = $request->footer_text;
        $settings->telegram_link = $request->telegram_link;

        if ($request->video_is_active)
            $settings->video_is_active = 1;
        else
            $settings->video_is_active = 0;
        if ($request->author_is_active)
            $settings->author_is_active = 1;
        else
            $settings->author_is_active = 0;
        if ($request->feature_categories_is_active)
            $settings->feature_categories_is_active = 1;
        else
            $settings->feature_categories_is_active = 0;


        if (!is_null($request->logo))
            $settings->logo = $this->imageUpload($request, "logo", $settings->logo);
        if (!is_null($request->category_default_image))
            $settings->category_default_image = $this->imageUpload($request, "category_default_image", $settings->category_default_image);
        if (!is_null($request->article_default_image))
            $settings->article_default_image = $this->imageUpload($request, "article_default_image", $settings->article_default_image);


        $settings->save();

        alert()->success('Başarılı', "Ayarlar güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);
        return redirect()->route("settings");
    }


    public function imageUpload(Request $request,string $imageName, string $oldImagePath): string
    {
        $imageFile         = $request->file($imageName);
        $originalName      = $imageFile->getClientOriginalName();
        $originalExtension = $imageFile->getClientOriginalExtension();
        $explodeName       = explode(".", $originalName)[0];
        $fileName          = Str::slug($explodeName) . "." . $originalExtension;

        $folder     = "settings";
        $publicPath = "storage/" . $folder;

        if (file_exists(public_path($oldImagePath)))
        {
            \File::delete(public_path($oldImagePath));
        }

        $imageFile->storeAs($folder, $fileName);
        return $publicPath . "/" . $fileName;
    }
}
