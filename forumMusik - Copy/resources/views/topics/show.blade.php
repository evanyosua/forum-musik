@extends('layout/main')


@section('title','Forum - View Post')


@section('container')
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
                        {{$topic->title}}
                    </div>
                    <hr>
                    {!!$topic->description!!}
                    <br><br>
                    <font size="2">
                        Created at : {{$topic->created_at}}<br>
                        <br>
                        Share to..
                    </font>
                    {!!$description=\Share::page(null,$topic->description)
                    ->twitter();!!}
                </div>
                <div class="card-footer">

                    <form action="{{ route('topic.destroy',$topic->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        @if (Auth::id() == $topic->user_id)

                        <a href="{{route('topic.edit', $topic->slug)}}" class="btn btn-primary btn-sm" align="left">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this post?');" align="left">Delete</a>
                            @elseif(Auth::user()?->isAdmin())
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this post?');" align="left">Delete</a>
                                @endif
                    </form>

                </div>
            </div>

            @foreach($topic->replies()->paginate(3) as $reply)
            <div class="card my-5 bg-light p-2 text-dark bg-opacity-75" style="border-radius: 25px;">

                <div class="d-flex justify-content-between">
                    <div>
                        <img class="image rounded-circle" src="/images/{{$reply->user->image}}" alt="profile_image" style="width: 70px;height: 70px; padding: 10px; margin: 0px; ">
                        <span>
                            {{$reply->user->nama}}
                        </span>

                    </div>
                </div>

                <div class="card-body">
                    {!!$reply->content!!}
                    <br>
                    <font size="2">
                        Replied at : {{$reply->created_at}}<br>
                    </font>
                    <font size="2">
                        Updated at : {{$reply->updated_at}}<br>
                    </font>
                    </form>
                </div>
                <div class="card-footer">
                    <form action="{{route('replies.destroy', ['topic' => $topic->slug, 'reply' => $reply->id])}}" method="POST">
                        @csrf
                        @method('DELETE')

                        @if (Auth::id() == $reply->user_id)

                        <a href="{{route('replies.edit', ['topic' => $topic->slug, 'reply' => $reply->id])}}" class="btn btn-primary btn-sm" align="left">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this reply?');" align="left">Delete</a>
                            @elseif(Auth::user()?->isAdmin())
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this reply?');" align="left">Delete</a>
                                @endif
                    </form>
                </div>
            </div>

            @endforeach
            {{$replies->links()}}
            <div class="card my-5 ">
                <div class="card-header">
                    Reply
                </div>
                <div class="card-body ">
                    @auth
                    <form action="{{route('replies.store',$topic->slug)}}" method="POST">
                        @csrf
                        <input type="hidden" name="content" id="content">
                        <trix-editor input="content"></trix-editor>

                        <button type="submit" class="btn btn-sm my-2 btn-success">
                            Add Reply
                        </button>
                    </form>
                    @else
                    <a href="{{route('login')}}" class="btn btn-info">Sign in to add a reply</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>


</main>

@endsection