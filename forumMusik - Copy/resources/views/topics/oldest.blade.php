@extends('layout/main')


@section('title','Forum - Oldest Discussions')


@section('container')

<div class="container">
    <br>

    <div class="row justify-content-center">
        <main class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <br>
                    @if (Session::has('message'))

                    <div class="alert alert-success" role="alert">

                        {{ Session::get('message') }}

                    </div>

                    @endif


                    <form action="{{route('topic.index')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{request('search')}}">
                            <button class=" btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                    @auth
                    <a href="{{route('topic.create')}}" style="width: 100%; color: #fff" class="btn btn-info my-2">
                        <i class="fa-solid fa-plus"></i>
                        Add Discussion
                    </a>
                    @else
                    <a href="{{route('login')}}" style="width: 100%; color: #fff" class="btn btn-info my-2">
                        Sign in to Add Discussion
                    </a>
                    @endauth

                    @auth
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by..
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="/view-user/{{ $user->id }}"><i class="fa-solid fa-music"></i> My Topics</a></li>
                            <li><a class="dropdown-item" href="{{route('topic.latest')}}"><i class="fa-solid fa-music"></i> Latest</a></li>
                            <li><a class="dropdown-item" href="{{route('topic.oldest')}}"><i class="fa-solid fa-music"></i> Oldest</a></li>
                            <li><a class="dropdown-item" href="{{route('topic.mostreplies')}}"><i class="fa-solid fa-music"></i> Most Replies</a></li>
                        </ul>
                    </div>
                    @endauth
                    <br>
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header fst-italic">
                            <i class="fa-solid fa-music"></i>
                            Genre
                        </div>
                        <div class="card-body text-dark bg-light mb-3">
                            @foreach($genres as $genre)
                            <ul class="list-group fst-italic ">
                                <a class="list-group-item" href="{{url('view-genre/'.$genre->slug)}}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    {{$genre->nama}}
                                </a>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    {{$topics->links()}}
                    @foreach($topics as $topic)
                    <div class="card bg-light p-2 text-dark bg-opacity-75" style="border-radius: 25px;">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img class="image rounded-circle" src="/images/{{$topic->user->image}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">

                                <span class="fst-italic">{{$topic->user->nama}}</span>

                            </div>
                            @if($topic->pinned)
                            <span id='pinned' class="badge rounded-pill bg-primary text-center">Pinned</span>
                            @endif
                            <p class="text fst-italic text-muted" align="right">

                                {{$topic->genre}}
                            </p>

                        </div>

                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{route('topic.show', $topic->slug)}}" style="color:black; text-decoration:none">{{$topic->title}}</a>
                            </div>

                            <small class="text-muted"> {{$topic->created_at}}</small>

                            <br>
                            <i class="fa-solid fa-comment text-muted" aria-hidden="true"></i>
                            <span class="text">{{$topic->replies()->count()}} </span>
                            &nbsp;
                            @if(Auth::user()?->isAdmin())
                            <form action="{{ route('topic.pin', $topic) }}" method="POST">
                                @csrf
                                <button class=" btn btn-danger" type="submit" onclick="return confirm('Are you want to pin this post?');"><i class="fa-solid fa-map-pin"></i></button>
                            </form>
                            @endif
                        </div>

                    </div>
                    &nbsp;
                    @endforeach

                </div>

            </div>
    </div>



    @endsection