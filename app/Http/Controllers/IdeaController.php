<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {


        return view('ideas.show', compact('idea'));
        /*
        return view('ideas.show',[
            'idea'=>$idea,
        ]);*/
    }

    public function store()
    {

        $validated = request()->validate([
            'content' => 'required|min:3|max:240',

        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Twit oluşturuldu');

    }

    public function destroy(Idea $idea)
    {
        //dump('deletin ' . $id);
        //  $idea = Idea::where('id', $id)->firstOrFail();
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Twit silindi');
    }



    public function edit(Idea $idea)
    {
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
        /*
        return view('ideas.show',[
            'idea'=>$idea,
        ]);*/
    }

    public function update(Idea $idea)
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240',

        ]);

        $idea->update($validated);
        return redirect()->route('idea.show', $idea->id)->with('success', 'idea güncelleme başarılı');
    }

}
