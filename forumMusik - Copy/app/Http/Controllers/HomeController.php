<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\models\Genre;
use App\models\Reply;
use App\Models\Playlist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home(Topic $topic, User $user, Playlist $playlist)
    {
        return view('home.homepage', [
            'topic' => $topic,
            'playlist' => $playlist,
            'genres' => Genre::all(),
            'replies' => Reply::latest()->paginate(3),
            'user' => $user,
        ]);
    }

    public function index()
    {
        return view('home');
    }
}
