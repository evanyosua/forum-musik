<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlaylistRequest;
use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\PlaylistAdmin;
use App\Models\User;

class PlaylistController extends Controller
{
    public function create()
    {
        return view('playlists.create');
    }

    public function index(User $user)
    {
        $user = auth()->user();
        return view('playlists.playlist', [
            'playlists' => Playlist::latest()->paginate(6),
            'user' => $user
        ]);
    }

    public function show()
    {
        return view('playlists.playlistadmin', [
            'playlists' => PlaylistAdmin::latest()->paginate(6)
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlaylistRequest $request, Playlist $playlist)
    {
        $user = auth()->user();
        $user->playlists()->create([
            'nama' => $request->nama,
            'link' => $request->link
        ]);

        return redirect()->route('playlist.index')->with('message', 'Playlist Added!');;
    }

    public function destroy(Playlist $playlist)
    {
        $user = User::all();
        if (!$user->role = "admin") {
            $this->authorize('delete', $playlist);
        }
        $playlist->delete();

        return redirect()->route('playlist.index')->with('message', 'Playlist deleted successfully');
    }
}
