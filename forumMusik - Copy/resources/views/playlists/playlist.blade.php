@extends('layout/main')


@section('title','Playlist User from Spotify')


@section('container')
<div class="container">
    <div class="row">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="card col-md-6 mx-auto" align="center" style="border-radius: 25px;">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light fst-italic">User Playlist</h1>
                        <p class="lead fst-italic">Some playlist from Spotify</p>
                    </div>
                </div>
            </div>
        </section>
        <hr class="bg-white">
        @if (Session::has('message'))

        <div class="alert alert-success" role="alert">

            {{ Session::get('message') }}

        </div>

        @endif
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Playlist..
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('playlist.show')}}"><i class="fa-solid fa-music"></i> From Admin</a></li>
                <li><a class="dropdown-item" href="{{ route('playlist.index')}}"><i class="fa-solid fa-music"></i> From Users</a></li>
            </ul>
        </div>
        &nbsp;
        <div class="album py-5 bg-secondary p-2 text-dark bg-opacity-50">
            <div class="container">
                @if(Auth::user()?->isMember())
                <a class="btn btn-info " href="{{route('playlist.create')}}">Add a Playlist</a>
                @endauth
                <br>
                <p>
                    {{$playlists->links()}}
                </p>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach($playlists as $playlist)
                    <div class="col">
                        <div class="card shadow-sm bg-light p-2 text-dark bg-opacity-75">
                            {!!$playlist->link!!}

                            <div class=" card-body">
                                <p class="card-text ">{{$playlist->nama}}</p>
                                <span class="text-muted fst-italic">
                                    by: {{$playlist->user->nama}}
                                </span>
                            </div>
                            <font size="2">
                                <br>
                                Share to..
                            </font>
                            {!!$description=\Share::page(null,$playlist->link)
                            ->twitter();!!}
                            &nbsp;
                            <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                @if (Auth::id() == $playlist->user_id)
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this playlist?');" align="left">Delete</a>
                                    @elseif(Auth::user()?->isAdmin())
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this playlist?');" align="left">Delete</a>
                                        @endif
                            </form>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection