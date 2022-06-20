@extends('layout/main')


@section('title','Forum - Edit Topic')




@section('container')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-15">

            <div class="card">
                <div class="card-header">{{ __('Edit your Topic ') }}</div>

                <div class="card-body">
                    <form action="{{route('topic.update', $topic->slug)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class=form-group>
                            <label for="genre">Genre</label>
                            <br>
                            <select name="genre" id="genre" class="form-control" value="{{$topic->genre}}" required="required">
                                <option value="0">Choose</option>
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
                            <label for="floatingInput">Title</label>
                            <br>
                            <input type="text" id="title" name="title" class="form-control" value="{{$topic->title}}" placeholder="Judul" required="required">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <br>
                            <input id="description" type="hidden" name="description">
                            <trix-editor input="description"></trix-editor>
                            @error('description')
                            <div class=" alert alert-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection