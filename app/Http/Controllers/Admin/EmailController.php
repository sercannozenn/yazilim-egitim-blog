<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTheme;
use App\Models\EmailThemesActive;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function themes()
    {
        $list = EmailTheme::with("user")->paginate(10);

        return view("admin.email.list", compact("list"));
    }

    public function create()
    {
        return view("admin.email.create-update");
    }

    public function store(Request $request)
    {
        $request->validate([
            'theme_type' => ["required"],
            'process' => ["required"],
            'name' => ["required"],
        ]);


        $themeType = $request->theme_type;

        if ($themeType == 1)
        {
            $data = $request->except(['_token', 'passwordResetMail']);
            $data['body'] = json_encode($data['custom_content']);
            unset($data['custom_content']);
        }
        else if ($themeType == 2)
        {
            $data = $request->except(['_token', 'custom_content']);
            $data['body'] = json_encode($data['passwordResetMail']);
            unset($data['passwordResetMail']);
        }

        $data['user_id'] = auth()->id();
        EmailTheme::create($data);

        alert()
            ->success('Başarılı', "Email teması oluşturuldu")
            ->showConfirmButton('Tamam', '#3085d6')
            ->autoClose(5000);
        return redirect()->route("admin.email-themes.index");
    }

    public function edit(Request $request)
    {
        $theme = EmailTheme::query()
            ->where("id", $request->id)
            ->firstOrFail();

        return view("admin.email.create-update", compact("theme"));
    }

    public function update(Request $request)
    {
        $theme = EmailTheme::query()
            ->where("id", $request->id)
            ->firstOrFail();

        if ($theme->getRawOriginal("theme_type") == 1)
        {
            $data = $request->except(['_token', 'passwordResetMail']);
            $data['body'] = json_encode($data['custom_content']);
            unset($data['custom_content']);
        }
        else if ($theme->getRawOriginal("theme_type") == 2)
        {
            $data = $request->except(['_token', 'custom_content']);
            $data['body'] = json_encode($data['passwordResetMail']);
            unset($data['passwordResetMail']);
        }
        $data['user_id'] = auth()->id();
        $data['status'] = isset($data['status']) ? 1 : 0;
        unset($data["id"]);

        $theme->update($data);

        $updateName = $data['name'];
        alert()
            ->success('Başarılı', "$updateName Email teması güncellendi")
            ->showConfirmButton('Tamam', '#3085d6')
            ->autoClose(5000);

        return redirect()->route("admin.email-themes.index");

    }

    public function delete(Request $request)
    {
        $theme = EmailTheme::query()
            ->where("id", $request->id)
            ->first();

        if ($theme)
        {
            $theme->delete();
            return response()->json(
                [
                    'status' => "success",
                    "message" => "Başarılı",
                ])
                ->setStatusCode(200);
        }
        else
        {
            return response()->json(
                [
                    'status' => "warning",
                    "message" => "Uyarı",
                    "data" => "Tema bulunamadı"
                ])
                ->setStatusCode(404);
        }

    }

    public function changeStatus(Request $request)
    {
        $theme = EmailTheme::query()
            ->where("id", $request->id)
            ->first();

        if ($theme)
        {
            $theme->status = $theme->status ? 0 : 1;
            $theme->save();

            return response()->json(
                [
                    'status' => "success",
                    "message" => "Başarılı",
                    "themeStatus" => $theme->status
                ])
                ->setStatusCode(200);
        }
        else
        {
            return response()->json(
                [
                    'status' => "warning",
                    "message" => "Uyarı",
                    "data" => "Tema bulunamadı"
                ])
                ->setStatusCode(404);
        }
    }

    public function assignShow()
    {
        $themes = EmailTheme::query()
            ->with("user")
            ->where("status", 1)
            ->get();
        $process = EmailTheme::PROCESS;

        return view("admin.email.assign", compact("themes", "process"));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'process_id' => ["required"],
            "theme_type_id" => ["required"]
        ]);

        $activeQuery = EmailThemesActive::query()
            ->where("process_id", $request->process_id);
        if ($activeQuery->get()->count())
        {
            $activeQuery->delete();
        }
        $data = $request->only(["process_id", "theme_type_id"]);
        $data["user_id"] = auth()->id();
        EmailThemesActive::create($data);

        return redirect()->route("admin.email-themes.assign-list");
    }

    public function assignGetTheme(Request $request)
    {
        $themes = EmailTheme::query()
            ->where("status", 1)
            ->where("process", $request->id)
            ->get();

        return view("admin.email.assign-get-theme", compact("themes"));
    }

    public function assignList()
    {
        $list = EmailThemesActive::with(['theme', 'user'])->get();
        $process = EmailTheme::PROCESS;

        return view("admin.email.assign-list", compact("list", "process"));
    }

    public function showEmail(Request $request)
    {
        $themeInfo = EmailTheme::query()
            ->where("id", $request->themeID)
            ->first();

        if ($themeInfo)
        {
            switch ($themeInfo->getRawOriginal("theme_type"))
            {
                case 1:
                    $theme = str_replace(
                        [
                            "{username}",
                            "{useremail}",
                            "http://{link}",
                            "https://{link}"
                        ],
                        [
                            "xxx",
                            "xxxemail",
                            route("verify-token", ['token' => "xxxtoken"]),
                            route("verify-token", ['token' => "xxxtoken"]),
                        ],
                        json_decode($themeInfo->body));

                    return view("email.custom", compact("theme"));
                case 2:
                    $theme = json_decode($themeInfo->body);
                    if ($themeInfo->getRawOriginal("process") == 2)
                    {
                        $token = "xxToken";
                        return view("email.reset-password", compact("theme", "token"));
                    }
                    dd("geldi2");
                    break;
            }
        }
    }

    public function assignDelete(Request $request)
    {
        $query = EmailThemesActive::query()
            ->where("theme_type_id", $request->id);

        if ($query->first())
        {
            $query->delete();
        }
        else
        {
            return response()->json(
                [
                    'status' => "warning",
                    "message" => "Uyarı",
                    "data" => "Atama bulunamadı"
                ])
                 ->setStatusCode(404);
        }

        return response()->json(
            [
                'status' => "success",
                "message" => "Başarılı",
            ])
            ->setStatusCode(200);
    }
}
