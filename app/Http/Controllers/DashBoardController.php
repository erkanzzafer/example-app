<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        /*  $idea = Idea::create([
              'content' => "TEST",
              'likes' => 2
          ]);*/

        //  dd(Idea::all());


        $ideas = Idea::orderBy('created_at', 'DESC');


        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'ideas' => $ideas->paginate(2)
        ]);
    }




}
