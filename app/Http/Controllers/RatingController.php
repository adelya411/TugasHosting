<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil rating berdasarkan user ID yang sedang login
        $rating = Rating::where('user_id', Auth::id())->first(); // Perbaiki Auth::rating() menjadi Auth::id()

        return view('rating.index', compact('rating'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'ratingpesanan' => 'required|numeric',
            'komentar' => 'nullable|string',
            'password' => 'nullable|confirmed',
        ]);

        // Ambil rating berdasarkan user ID yang sedang login
        $rating = Rating::where('user_id', Auth::id())->first();

        // Perbarui data rating
        $rating->user_id = Auth::user()->id;
        $rating->name = $request->name;
        $rating->email = $request->email;
        $rating->ratingpesanan = $request->ratingpesanan;
        $rating->komentar = $request->komentar;

        if (!empty($request->password)) {
            $rating->password = Hash::make($request->password);
        }

        $rating->save(); // Gunakan save() untuk menyimpan perubahan

        return redirect('rating');
    }
}
