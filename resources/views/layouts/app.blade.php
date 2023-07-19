<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Davis Gibson Laravel Site</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            * {
                color: #303336 !important;
            }
            .drag-icon::after {
              content: '⠿';
              cursor: pointer;
              font-size: 25px;
              color: #00000099;
            }
            .sortable-ghost {
                opacity: 0.3 !important;
                border: 2px dashed rgba(70, 73, 76, 0.5) !important;
            }
            .sortable-chosen {
                color: red;
                opacity: 0.1;
            }
            .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
                background-color: rgba(64, 127, 190, 0.8);
                color: white !important;
                border-color: rgba(0, 0, 0, 0.1) !important;
            }

            .btn-outline-secondary, .btn-outline-secondary:hover, .btn-outline-secondary:active, .btn-outline-secondary:visited {
                background-color: rgba(0, 0, 0, 0);
                color: #747f88 !important;
                border-color: #747f88 !important;
            }

            label {
                font-weight: 500;
            }
        </style>

    </head>
    <body class="antialiased" style="background-color: #f6fbff">
        <div class="mx-auto col-12 col-md-10 col-lg-8 col-xl-6"> <!-- *note* not enough content on this site to warrant more than col-xl-6 -->
            <nav class="navbar navbar-light mb-4" style="background-color: #f5fbff; border-bottom: 1px solid #bdc6ce; box-shadow: 0px 1px 0px #d0d4d7;">
              <h1><a class="navbar-brand fs-5" href="/">Task application <small class="text-muted ml-2">by Davis Gibson</small></a></h1>
            </nav>
            @yield('content')
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @stack('scriptstack')
</html>
