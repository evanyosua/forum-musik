@extends('layout/main')


@section('title','Forum - Check Users')


@section('container')
&nbsp;
<div class="container">
    @if (Session::has('message'))

    <div class="alert alert-success" role="alert">

        {{ Session::get('message') }}

    </div>

    @endif
    <div class="album py-5 bg-light p-8 text-dark bg-opacity-75">

        <div class="card-header">User's Profile Data</div>

        @if($users->count()>0)
        <table class="table table-bordered">
            <thead>
                <th>Avatar</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Gender</th>
                <th>Fav Genre</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Joined on</th>
                <th>Posts</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <img class="image rounded-circle" src="/images/{{$user->image}}" alt="profile_image" style="width: 70px;height: 70px; padding: 10px; margin: 0px; ">
                    </td>
                    <td>
                        {{$user->nama}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->role}}
                    </td>
                    <td>
                        {{$user->gender}}
                    </td>
                    <td>
                        {{$user->genre_fav1}} & {{$user->genre_fav2}}
                    </td>
                    <td>
                        {{$user->home_address}}
                    </td>
                    <td>
                        {{$user->date_of_birth}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <td>

                        {{$user->topics->count()}}
                    </td>
                    <td>
                        <form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this user?');" align="left">Delete</a>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No User Yet</h3>
        @endif

    </div>
</div>


</main>
@endsection