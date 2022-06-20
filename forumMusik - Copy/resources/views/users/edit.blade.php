@extends('layout/main')


@section('title','User Profile | Edit')


@section('container')
<div class="container">
    <div class="row">
        &nbsp;
        <div class="card py-1 bg-light bg-opacity-75" text-align=center>
            <h1 class="h3 mb-3 fw-normal">Edit Profile</h1>
        </div>
        <hr>

        <div class="container bootstrap snippets bootdey">
            <hr>
            <div class="row">


                <!-- edit form column -->
                <div class="col-md-9 personal-info">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="card-body bg-light p-2 text-dark bg-opacity-80">
                        <form action="{{route('users.update-profile')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="image" class="col-lg-3 control-label"><i class="fa-solid fa-image"></i> Profile Photo</label>
                                <input type="file" name="image">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"></i><i class="fa-solid fa-id-card"></i> Name</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="nama" type="text" value="{{$user->nama}}">

                                    </input>
                                </div>
                                @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><i class="fa-solid fa-at"></i> Email</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="email" type="email" value="{{$user->email}}" placeholder="Email">

                                    </input>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><i class="fa-solid fa-cake-candles"></i> Date of Birth</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="date_of_birth" name="date_of_birth" type="text" value="{{$user->date_of_birth}}" placeholder="yyyy-mm-dd">

                                    </input>
                                </div>
                                @error('date_of_birth')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><i class="fa-solid fa-house-user"></i> Home Address</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="home_address" type="text" value="{{$user->home_address}}" placeholder="Your Address">

                                    </input>
                                </div>
                                @error('home_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><i class="fa-solid fa-mars"></i>/<i class="fa-solid fa-venus"></i> Gender</label>
                                <br>
                                <input type="radio" id="gender" name="gender" value="Male" {{ $user->gender == 'male' ? 'checked' : '' }}>
                                <label for="Male">Male</label>
                                <br>
                                <input type="radio" id="gender" name="gender" value="Female" {{ $user->gender == 'female' ? 'checked' : '' }}>
                                <label for="Female">Female</label><br>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><i class="fa-solid fa-music"></i> Favourite Genre 1</label>
                                <div class="col-lg-8">
                                    <select name="genre_fav1" id="genre_fav1" class="form control" value="{{$user->genre_fav1}}" required="required">
                                        <option value="0">Choose</option>
                                        <option value="Pop">Pop</option>
                                        <option value="Classic">Classic</option>
                                        <option value="Rock">Rock</option>
                                        <option value="Jazz">Jazz</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                @error('genre_fav1')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><i class="fa-solid fa-music"></i> Favourite Genre 2</label>
                                <div class="col-lg-8">
                                    <select name="genre_fav2" id="genre_fav2" class="form control" value="{{$user->genre_fav2}}" required="required">
                                        <option value="0">Choose</option>
                                        <option value="Pop">Pop</option>
                                        <option value="Classic">Classic</option>
                                        <option value="Rock">Rock</option>
                                        <option value="Jazz">Jazz</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                @error('genre_fav2')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</a>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#date_of_birth')
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection