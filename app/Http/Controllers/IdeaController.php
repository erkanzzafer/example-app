<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {

        request()->validate([
            'idea' => 'required|min:3|max:240',

        ]);

        $idea = Idea::create([
            'content' => request('idea'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Twit oluşturuldu');

    }

    public function destroy($id)
    {
        //dump('deletin ' . $id);
        $idea = Idea::where('id', $id)->firstOrFail();
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Twit silindi');
    }
}
