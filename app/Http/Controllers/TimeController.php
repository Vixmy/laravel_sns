<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Word;

class TimeController extends Controller
{
    public function showTimelinePage()
    {
        $words = Word::latest()->get();

        return view('timeline', [
            'words' => $words,
        ]);
    }

    public function registerWord(Request $request)
    {
        $request->validate([
            'word' => 'required|max:20',
        ]);

        Word::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'word' => $request->word,
            'meaning' => $request->meaning,
        ]);

        return back();
    }
}