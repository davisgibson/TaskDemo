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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        @stack('stylestack')
        <style>
            * {
                color: #303336;
            }
            a {
                color: #303336;
            }
            @media(max-width: 575px)
            {
                .nav-select {
                    max-width: 50%;
                }
            }
            @media(min-width: 767px)
            {
                .nav-select {
                    max-width: 25%;
                }
            }
            .drag-icon::after {
              content: '⠿';
              cursor: pointer;
              font-size: 25px;
              color: #00000099;
            }
            .text-sm {
                font-size: 0.8em;
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

            .expand_caret {
                transform: scale(1.6);
                margin-left: 8px;
                margin-top: -4px;
            }

            [aria-expanded='false'] > .expand_caret {
                transform: scale(1.6) rotate(-90deg);
            }

            label {
                font-weight: 500;
            }

            .hidden-checkbox{
                display: none;
            }

            .hidden-checkbox + .badge{
                text-indent: -999999px;
                width: 27px;
            }

            .hidden-checkbox:checked + .badge{
                  text-indent: 0;
            }

            .dropdown-item.active {
                background-color: #bcd5ee;
            }
        </style>

    </head>
    <body class="antialiased" style="background-color: #f6fbff">
        <div class="mx-auto col-12 col-md-12 col-lg-10 col-xl-6"> <!-- *note* not enough content on this site to warrant more than col-xl-6 -->
            <nav class="navbar navbar-light mb-4" style="background-color: #f5fbff; border-bottom: 1px solid #bdc6ce; box-shadow: 0px 1px 0px #d0d4d7;">
              <h1><a class="navbar-brand fs-5" href="/">Task application <small class="text-muted ml-2">by Davis Gibson</small></a></h1>
            </nav>
            @yield('content')
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        @stack('scriptstack')
    </body>
</html>
