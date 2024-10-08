<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Book;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'content' => 'required|string'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'content' => $request->content
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function destroy(Comment $comment)
    {
    if (auth()->id() === $comment->user_id) {
        $comment->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
    return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }
}
