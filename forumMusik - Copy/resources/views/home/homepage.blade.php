<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">


    <script src="https://kit.fontawesome.com/9b45b5fd96.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {

            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->

    <style>
        body {
            background-image:url("{{asset('image/homepage.jpg')}}");
            color: #5a5a5a;
        }

        .nav-item {
            font-family: 'Georgia', Times, serif;

        }

        /* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            margin-bottom: 4rem;
        }

        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
            height: 32rem;
        }

        .carousel-item>img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
        }


        /* MARKETING CONTENT
    -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .marketing h2 {
            font-weight: 400;
        }

        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        /* rtl:end:ignore */


        /* Featurettes
    ------------------------- */

        .featurette-divider {
            margin: 5rem 0;
            /* Space out the Bootstrap
    <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            /* rtl:remove */
            letter-spacing: -.05rem;
        }


        /* RESPONSIVE CSS
    -------------------------------------------------- */

        @media (min-width: 40em) {

            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
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
    </style>
</head>

<body>

    <header>
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
                                <i class="fa-solid fa-house"></i>
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
                    <form action="{{route('topic.index')}}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Topic.." name="search" value="{{request('search')}}">
                            <button class=" btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>


            </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>

            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('image/headphone.jpg')}}" alt="Headphone" style="width:100%; height:100%">

                    <div class="container">
                        <div class="carousel-caption text-start ">

                            <h1>Forum</h1>
                            <p>Interact with other music listeners!</p>
                            <p><a class="btn btn-lg btn-primary" href="/topic">Go!</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('image/spotify.jpg')}}" alt="Los Angeles" style="width:100%; height:100%">

                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Playlist</h1>
                            <p>Sharing playlists from Spotify</p>
                            <p><a class="btn btn-lg btn-primary" href="{{ route('playlist.index')}}">Go!</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 text-white">
                    <h2 class="featurette-heading">Forum</h2>
                    <p class="lead">Sharing with other users about music, what type of music that usually they hear, and more...</p>
                    <span class="text"><i class="fa-solid fa-book-open-reader"></i> {{$topic->count()}} Active Topics </span>
                    <p>Genre available : Pop, Rock, Classic, Jazz, Others and All Genres</p>
                </div>
                <div class="col-md-5">
                    <img src="{{asset('image/forum.png')}}" alt="Los Angeles" style="width:400px; height:400px">

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-3 text-white">
                    <h2 class="featurette-heading">Playlist</h2>
                    <p class="lead">Sharing playlists with other users from Spotify..</p>
                    <span class="text"><i class="fa-solid fa-music"></i> {{$playlist->count()}} Shared Playlist</span>
                </div>
                <div class="col-md-5 order-md-1">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZEVXbMDoHDwVN2tF?utm_source=generator" width="100%" height="380" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>

                </div>
            </div>
            &nbsp;
            &nbsp;

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
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

    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>