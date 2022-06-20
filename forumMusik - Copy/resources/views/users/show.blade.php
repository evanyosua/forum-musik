@extends('layout/main')


@section('title','User Profile')


@section('container')
<div class="container">
    <div class="main-body">
        <!-- /Breadcrumb -->
        <br>
        <img class="image rounded-circle" src="/images/{{Auth::user()->image}}" alt="profile_image" style="width: 200px;height: 200px; padding: 10px; display: block;
        margin-left: auto;
        margin-right: auto; ">
        <h1 class="h3 mb-3 fw-normal text-white fst-italic text-center"> {{$user->nama}}'s Profile</h1>
        <div class="card-body text-white">
            <div class="row">
                <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center" style="font-size: 1.1rem;
                                                font-weight: bold;
                                                display: block;
                                                
                                               
                                                text-align: center;">
                        <div>
                            <span class="heading"> {{$user->topics->count()}}</span>
                            <br>
                            <span class="description">Topics Posted</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div>
                            <span class="heading"> {{$user->replies->count()}}</span>
                            <br>
                            <span class="description">Replies Posted</span>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div>
                            <span class="heading"> {{$user->playlists->count()}}</span>
                            <br>
                            <span class="description">Playlists Shared</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <li class="list-inline-item dropdown" style="float:right;">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="/profile" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a href="{{route('users.edit-profile')}}" style="text-decoration:none;color:black">

                        <i class="fa-solid fa-pen-to-square"></i> Edit Profile</a>
                    <br><br>
                    <a href="{{route('change-password.index')}}" style="text-decoration:none;color:black">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Change Password
                    </a>
                    <br><br>
                    <form action="{{ route('users.destroyUser',['user'=>$user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete your account?');" align="left">Delete Account</a>
                    </form>
                </div>
            </li>
        </div>
        &nbsp;
        <div class="panel bg-light">
            <div class="bio-graph-heading">
                <strong>About</strong>
            </div>
            <div class="panel-body bio-graph-info">
                <div class="row">
                    <div class="bio-row">
                        <p><span>Full Name </span>: {{$user->nama}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Email </span>: {{$user->email}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Gender </span>: {{$user->gender}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Birthday</span>: {{$user->date_of_birth}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>1st Favourite Genre </span>: {{$user->genre_fav1}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>2nd Favourite Genre </span>: {{$user->genre_fav2}}</p>
                    </div>
                    <div class="bio-row">
                        <p><span>Address </span>: {{$user->home_address}}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection