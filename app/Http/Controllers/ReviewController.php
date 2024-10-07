<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'review' => 'required'
        ]);

        Review::create([
            'book_id' => $request->book_id,
            'user_id' => auth()->user()->id,
            'review' => $request->review
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim.');
    }

    public function destroy($id)
    {

        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus');
    }
}
