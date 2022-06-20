@extends('layout/main')


@section('title','Forum - Create Discussions')




@section('container')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-15">

            <div class="card bg-light bg-opacity-90">
                <div class="card-header">{{ __('Add Discussions ') }}</div>

                @if(session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{session('success')}}
                </div>
                @endif

                <div class="card-body">
                    <form action="{{route('topic.store')}}" method="POST">
                        @csrf
                        <div class=form-group>
                            <label for="genre"><i class="fa-solid fa-music"></i> Genre</label>
                            <br>
                            <select name="genre" id="genre" class="form-control" required="required">
                                <option value="All Genre">All Genre</option>
                                <option value="Pop">Pop</option>
                                <option value="Classic">Classic</option>
                                <option value="Rock">Rock</option>
                                <option value="Jazz">Jazz</option>
                                <option value="Others">Others(Dangdut, Hip Hop, Gospel, Blues, Rhythm, Funk, Rap, Reggae)</option>
                            </select>
                            @error('genre')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="floatingInput"><i class="fa-solid fa-pen"></i> Title</label>
                            <br>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" required="required">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <label for="description"><i class="fa-solid fa-pen-field"></i> Description</label>
                        <br>
                        <input id="description" type="hidden" name="description">
                        <trix-editor input="description"></trix-editor>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <!-- google recaptcha -->
                        <div class="g-recaptcha" type="g-recaptcha" data-sitekey="6LdOCG4fAAAAAFWKcApjBqjmVzk0K8Iq9v0KWzCT"></div>
                        @if(Session::has('g-recaptcha-response'))
                        <p class="alert{{Session::get('alert-class','alert-info')}}">
                            {{Session::get('g-recaptcha-response')}}
                        </p>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection