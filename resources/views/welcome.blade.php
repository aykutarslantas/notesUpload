<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            textarea {
                font-size: 18px;
                font-family: 'Shalimar', cursive;

                border: 1px solid #EEEEEE;
                box-shadow: 1px 1px 0 #DDDDDD;
                display: block;
                margin: 2% auto;
                padding: 11px 20px 0 70px;
                resize: none;
                height: 689px;
                width: 530px;

                background-image: -moz-linear-gradient(top , transparent, transparent 49px,#E7EFF8 0px);
                background-image: -webkit-linear-gradient(top , transparent, transparent 49px,#E7EFF8 0);

                -webkit-background-size:  100% 50px;
                background-size: 100% 50px;

            }
        </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Shalimar&display=swap" rel="stylesheet">

    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Create Notes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav mr-auto">

                </ul>
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

            </div>
        </nav>

    </header>

    <main role="main">
        @auth
            <section class="jumbotron text-center">
                <div class="container">
                    <h1>Add Notes</h1>
                    <p class="lead text-muted">Please add a note</p>
                </div>
            </section>
            <div class="py-5 bg-light">
                <div class="container">
                    <form method="post" enctype="multipart/form-data" id="upload-image" action="{{ url('image-upload') }}">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="user-image mb-3 text-center">
                                    <div class="imgPreview"> </div>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="imageFile" class="custom-file-input" id="images" multiple="multiple">
                                    <label class="custom-file-label" for="images">Choose image</label>
                                </div>
                            </div>
                            <!-- jQuery -->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <script>
                                $(function() {
                                    // Multiple images preview with JavaScript
                                    var multiImgPreview = function(input, imgPreviewPlaceholder) {

                                        if (input.files) {
                                            var filesAmount = input.files.length;

                                            for (i = 0; i < filesAmount; i++) {
                                                var reader = new FileReader();

                                                reader.onload = function(event) {
                                                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                                                }

                                                reader.readAsDataURL(input.files[i]);
                                            }
                                        }

                                    };

                                    $('#images').on('change', function() {
                                        multiImgPreview(this, 'div.imgPreview');
                                    });
                                });
                            </script>
                            <div class="col-12">
                                <textarea name="note" class="form-control" rows="10" style="padding-top:18px; font-size: 40px; line-height: 48px" placeholder="Please add note here..."></textarea>
                            </div>
                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-block btn-dark btn-lg">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row pt-5">
                    <div class="col-12">
                        <p class="text-center" style="font-size: 80px;font-family: 'Shalimar', cursive;">Please Login</p>
                    </div>
                </div>
            </div>
        @endauth
    </main>
    </body>
</html>
