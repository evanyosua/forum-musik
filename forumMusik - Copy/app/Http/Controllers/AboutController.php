<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function create()
    {
        return view('abouts.create');
    }

    public function edit(About $about)
    {
        return view('abouts.edit', [
            'about' => $about,

        ]);
    }

    public function update(UpdateAboutRequest $request, About $about)
    {
        $about->update($request->all());

        return redirect()->route('about.index')

            ->with('success', 'About updated successfully');
    }

    public function index(About $about)
    {
        return view('abouts.index', [
            'abouts' => $about
        ]);
    }

    public function store(CreateAboutRequest $request)
    {
        About::create([
            'content' => $request->content,

        ]);
        $request->session()->now('status', 'Task was successful!');
        return redirect()->route('about.index');
    }
}
