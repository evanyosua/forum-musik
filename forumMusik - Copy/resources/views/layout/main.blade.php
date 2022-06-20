<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}">
  <script src="https://kit.fontawesome.com/9b45b5fd96.js" crossorigin="anonymous"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="stylesheet" type="text/css" href="/css/trix.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/share.js') }}"></script>
  <script type="text/javascript" src="/js/trix.js"></script>

  <title>@yield('title')</title>

  <style>
    body {
      background-image:url("{{asset('image/homepage.jpg')}}")
    }

    .card {
      font-family: 'Georgia', Times, serif;
    }

    .form-group {
      font-family: 'Georgia', Times, serif;
    }

    .h1 {
      font-family: 'Georgia', Times, serif;
    }

    .nav-item {
      font-family: 'Georgia', Times, serif;
    }

    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }

    .footer-basic {
      padding: 40px 0;
      background-color: #ffffff;
      color: #4b4c4d;
    }

    .footer-basic ul {
      padding: 0;
      list-style: none;
      text-align: center;
      font-size: 18px;
      font-family: 'Georgia', Times, serif;
      line-height: 1.6;
      margin-bottom: 0;
    }

    .footer-basic li {
      padding: 0 10px;
    }

    .footer-basic ul a {
      color: inherit;
      text-decoration: none;
      opacity: 0.8;
    }

    .footer-basic ul a:hover {
      opacity: 1;
    }

    .footer-basic .copyright {
      margin-top: 15px;
      text-align: center;
      font-size: 13px;
      color: #aaa;
      margin-bottom: 0;
    }

    .footer-basic .contactus {
      margin-top: 15px;
      text-align: center;
      font-size: 13px;
      color: #aaa;
      margin-bottom: 0;
    }

    .card-profile {
      background-image:url("{{asset('image/profile.jpg')}}");
    }

    #pinned {
      width: 100px;
      height: 30px;
      font-size: 15px;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    #share {
      width: 50px;
      height: 30px;
      font-size: 15px;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }

    ul {
      list-style-type: none;
    }

    li {
      list-style-type: none;
    }

    .bio-graph-heading {
      background: black;
      color: #fff;
      text-align: center;
      font-style: italic;
      padding: 40px 50px;
      border-radius: 4px 4px 0 0;
      -webkit-border-radius: 4px 4px 0 0;
      font-size: 30px;
      font-weight: 300;
    }

    .bio-graph-info {
      color: #89817e;
    }

    .bio-graph-info h1 {

      font-weight: 300;
      margin: 0 0 20px;
    }

    .bio-row {
      font-size: 20px;
      float: center;
      margin-bottom: 10px;
    }

    .bio-row p span {
      width: 300px;
      display: inline-block;
    }

    .column {
      float: center;
      width: 33.3%;
      margin-bottom: 16px;
      padding: 0 8px;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 8px;

    }

    .about-section {
      padding: 50px;
      text-align: center;
      background-color: #474e5d;
      color: white;
    }
  </style>

  @yield('css')
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid">
      <a class="nav-link text-white fst-italic" aria-current="page" href="/home">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
          <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z" />
          <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z" />
          <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z" />
        </svg>
      </a>
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white fst-italic" aria-current="page" href="/homepage">
              <i class="fa-solid fa-book-open-reader"></i>
              Home</a>
          </li>
          &nbsp;
          &nbsp;
          <li class="nav-item">
            <a class="nav-link text-white fst-italic" aria-current="page" href="/topic">
              <i class="fa-solid fa-book-open-reader"></i>
              Forum</a>
          </li>
          &nbsp;
          &nbsp;
          <li class="nav-item">
            <a class="nav-link text-white fst-italic" href="{{ route('playlist.index')}}">
              <i class="fa-brands fa-spotify"></i>
              Playlist</a>
          </li>
          &nbsp;
          &nbsp;

          <li class="nav-item">
            <a class="nav-link text-white fst-italic" href="{{ route('about.index')}}">
              <i class="fa-solid fa-child"></i>
              About</a>
          </li>

          &nbsp;
          &nbsp;
          @if(Auth::user()?->isAdmin())
          <li class="nav-item">
            <a class="nav-link text-white fst-italic" href="{{route('users.index')}}">
              <i class="fa-solid fa-users"></i>
              View User</a>
          </li>
          @endif
        </ul>
        @guest
        @if (Route::has('login'))
        <li class="list-inline-item">
          <a class="nav-link text-white fst-italic" href="{{ route('login') }}">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="list-inline-item">
          <a class="nav-link text-white fst-italic" href="{{ route('register') }}">
            <i class="fa-solid fa-user"></i>

            Register</a>
        </li>
        @endif
        @else
        <li class="list-inline-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="/profile" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

            <img class="image rounded-circle" src="/images/{{Auth::user()->image}}" alt="profile_image" style="width: 50px;height: 50px; padding: 10px; margin: 0px; ">

            {{ Auth::user()->nama }}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('users.show')}}">
              <i class="fa-solid fa-user"></i>
              {{ __('Profile') }}
            </a>
            <hr>
            <a class="dropdown-item" href="/logout">
              <i class="fa-solid fa-right-from-bracket"></i>
              {{ __('Logout') }}
            </a>
          </div>
        </li>
        @endguest
      </div>


    </div>
  </nav>
  @yield('container')
  &nbsp;
  <div class="footer-basic">
    <footer>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="/home">Home</a></li>
        <li class="list-inline-item"><a href="/topic">Forum</a></li>
        <li class="list-inline-item"><a href="{{ route('playlist.index')}}">Playlist</a></li>
        <li class="list-inline-item"><a href="{{ route('about.index')}}">About</a></li>
      </ul>
      <p class="contactus">Contact Us: forummusic27@gmail.com</p>
      <p class="copyright">Music Listener Forum © 2022</p>
    </footer>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>












  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  <script src="{{asset('js/app.js')}}"></script>
  @yield('js')
</body>

</html>