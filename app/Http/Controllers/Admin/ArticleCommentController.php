<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    public function approvalList(Request $request)
    {
        $users = User::all();

        $comments  = ArticleComment::query()
            ->with(['user', "article", "children", "article.user"])
            ->approveStatus()
            ->user($request->user_id)
            ->createdDate($request->created_at)
            ->searchText($request->search_text)
            ->paginate(10);

        $page = "approval";

        return view("admin.articles.comment-list", compact("comments", "users", "page"));
    }

    public function changeStatus(Request $request)
    {
        $comment = ArticleComment::findOrFail($request->id);

        $comment->status = $comment->status ? 0 : 1;

        $comment->save();


        return response()->json(
            [
                'status' => "success",
                "message" => "Başarılı",
                "data" => $comment,
                "comment_status" => $comment->status])
            ->setStatusCode(200);
    }
}
