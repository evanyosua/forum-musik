<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Topic;
use App\Models\User;
use App\Models\Genre;
use App\Models\Reply;

class TopicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, User $user)
    {
        $search = $request->search;
        $user = auth()->user();
        $topics = Topic::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search, '%')
            ->orderbyRaw('pinned DESC, created_at DESC')
            ->paginate(5);

        return view('topics.index',  [
            'topics' => $topics,
            'reply' => Reply::all(),
            'genres' => Genre::all(),
            'user' => $user,
        ]);
    }

    public function latest(Request $request, User $user)
    {

        $search = $request->search;
        $user = auth()->user();
        $topics = Topic::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search, '%')
            ->orderbyRaw('pinned DESC, created_at DESC')
            ->paginate(5);

        return view('topics.index',  [
            'topics' => $topics,
            'reply' => Reply::all(),
            'genres' => Genre::all(),
            'user' => $user,
        ]);
    }

    public function oldest(Request $request, User $user)
    {
        $search = $request->search;
        $user = auth()->user();
        $topics = Topic::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search, '%')
            ->orderbyRaw('pinned DESC')
            ->paginate(5);

        return view('topics.index',  [
            'topics' => $topics,
            'reply' => Reply::all(),
            'genres' => Genre::all(),
            'user' => $user,
        ]);
    }

    public function mostreply(Request $request, User $user)
    {
        $search = $request->search;
        $user = auth()->user();
        $topics = Topic::where('title', 'like', '%' . $search . '%')
            ->withCount('replies')
            ->orderbyRaw('pinned DESC, replies_count DESC')
            ->paginate(5);
        return view('topics.oldest',  [
            'topics' => $topics,
            'reply' => Reply::all(),
            'genres' => Genre::all(),
            'user' => $user,

        ]);
    }

    public function viewgenre($slug)
    {
        $user = auth()->user();
        if (Genre::where('slug', $slug)->exists()) {
            $genre = Genre::where('slug', $slug)->first();
            $topics = Topic::where('genre', $genre->nama)->orderbyRaw('pinned DESC')->paginate(5);
            return view("topics.genres.index", compact('genre', 'topics'), [
                'genres' => Genre::all(),
                'user' => $user,
            ]);
        } else {
            return redirect('/')->with("status", "Slug doesn't exists");
        }
    }

    public function viewuser($id)
    {
        if (Topic::where('user_id', $id)->exists()) {
            $user = User::where('id', $id)->first();
            $topics = Topic::where('user_id', $user->id)->orderbyRaw('pinned DESC')->paginate(5);
            return view("topics.genres.index", compact('user', 'topics'), [
                'genres' => Genre::all(),
            ]);
        } else {
            return redirect('/')->with("status", "Id doesn't exists");
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create', ['genres' => Genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTopicRequest $request)
    {

        $user = auth()->user();

        $user->topics()->create([
            'genre' => $request->genre,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = '6LdOCG4fAAAAAPoGlpPDQlcZ-WEHF3S7LYuXGzAC';
                $response = $value;
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                $response = \file_get_contents($url);
                $response = json_decode($response);

                if (!$response->success) {
                    Session()->flash('g-recaptcha-response', 'please check reCaptcha');
                    Session()->flash('alert-class', 'alert-danger');
                    $fail($attribute . 'google reCatpcha failed');
                }
            },
        ]);

        return redirect()->route('topic.index')->with('message', 'Discussion posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function show(Topic $topic, User $user)
    {
        $user = auth()->user();


        return view('topics.show', [
            'topic' => $topic,
            'genres' => Genre::all(),
            'replies' => Reply::latest()->paginate(3),
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {

        $this->authorize('update', $topic);
        return view('topics.edit', [
            'topic' => $topic,
            'genres' => Genre::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTopicRequest $request, Topic $topic)
    {
        $this->authorize('update', [$topic, $request->all()]);
        $topic->update($request->all());

        return redirect()->route('topic.show', $topic->slug)->with('message', 'Topics updated successfully');
    }

    public function pin(Topic $topic)
    {
        $topic->update(['pinned' => true]);
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $user = User::all();
        if (!$user->role = "admin") {
            $this->authorize('delete', $topic);
        }
        $topic->delete();

        return redirect()->route('topic.index')->with('message', 'Topic deleted successfully');
    }
}
