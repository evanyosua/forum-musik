<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaylistAdmin;
use App\Http\Requests\CreatePlaylistRequest;
use App\Models\User;

class PlaylistAdminController extends Controller
{
    public function create()
    {
        return view('playlists.createadmin');
    }

    public function show()
    {
        return view('playlists.playlistadmin', [
            'playlists' => PlaylistAdmin::latest()->paginate(6)
        ]);
    }

    public function store(CreatePlaylistRequest $request, PlaylistAdmin $playlist)
    {
        PlaylistAdmin::create([
            'nama' => $request->nama,
            'link' => $request->link
        ]);

        return redirect()->route('playlist.show');
    }

    public function destroy(PlaylistAdmin $playlist)
    {
        $user = User::all();
        if ($user->role = "admin") {
            $this->authorize('delete', $playlist);
        }
        $playlist->delete();

        return redirect()->route('playlist.index')->with('message', 'Playlist deleted successfully');
    }
}
