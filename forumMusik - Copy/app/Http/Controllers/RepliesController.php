<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReplyRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Reply;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReplyRequest $request, Topic $topic)
    {
        $user = auth()->user();

        $user->replies()->create([
            'topic_id' => $topic->topicID, //fixed
            'content' => $request->content
        ]);

        return redirect()->back()->with('message', 'Reply success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic, Reply $reply)
    {
        return view('topics.editreply', [
            'reply' => $reply,
            'topic' => $topic,


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateReplyRequest $request, Topic $topic, Reply $reply)
    {
        $reply->update($request->all());

        return redirect()->route('topic.show', $topic->slug)->with('message', 'Reply updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic, Reply $reply)
    {

        $reply->delete();

        return redirect()->back()->with('message', 'Reply deleted successfully');
    }
}
