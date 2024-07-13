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

        return view('dashboard', ['ideas' => Idea::all()]);
    }
}
