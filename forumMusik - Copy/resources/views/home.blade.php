<head>
    <link rel="shortcut icon" href="{{asset('image/favicon.ico')}}">
    <title>
        Forum - Welcome
    </title>

    <style>
        body {
            background-image: url("{{asset('image/wallpaper.jpg')}}");
            background-repeat: no-repeat;
            background-position: center;
        }

        .judul {
            font-family: "Georgia", "Times", cursive;
            text-align: center;
            color: white;

            font-size: 50px;
        }

        a:hover,
        a:visited,
        a:link,
        a:active {
            font-family: "Georgia",
                "Times",
                cursive;
            text-align: center;
            color: white;

            font-size: 25px;
        }
    </style>

</head>

<body>
    &nbsp;

    <img class="image rounded-circle" src="{{asset('image/logos.jpg')}}" width="150" height="150" align="left">
    <br><br><br><br><br><br><br><br><br><br><br>
    <p class="judul">Welcome to Music Listener Forum</p>

    <p class=" link" align="center">
        <a href="/homepage" class="btn btn-outline-secondary">To Homepage</a>

    </p>


</body>