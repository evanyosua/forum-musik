@extends('layout/main')


@section('title','Admin - Add Playlist')


@section('container')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">{{ __('Admin - Add Playlist ') }}</div>

                @if(session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{session('success')}}
                </div>
                @endif

                <div class="card-body">
                    <form action="{{route('playlistadmin.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="floatingInput" class="fst-italic">Playlist Name</label>
                            <br>
                            <input type="text" id="nama" name="nama" style="width:500px;" placeholder="Playlist Name" required="required">
                            @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <label for="link" class="fst-italic">Link Spotify</label>
                        <br>
                        <input type="text-area" id="link" name="link" placeholder="Link" style="width:500px;"><br>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <br>
                        <img class="image " src="{{asset('image/embed.png')}}" width="520" height="320" align="left"><br>
                        &nbsp;
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection