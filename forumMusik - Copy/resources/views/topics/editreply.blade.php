@extends('layout/main')


@section('title','Forum - Edit Reply')




@section('container')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-15">

            <div class="card">
                <div class="card-header">{{ __('Edit your Reply ') }}</div>

                <div class="card-body">
                    <form action="{{route('replies.update', ['topic' => $topic->slug, 'reply' => $reply->id])}}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <label for="content">Description</label>
                            <br>
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                            @error('content')
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