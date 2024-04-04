<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Sign In | Admin Myrekap Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content=" Admin Dashboard" name="description">
    <meta content="ONE" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::to('assets/images/book.png') }}">
    <!-- Layout config Js -->
    <script src="{{ URL::to('assets/js/layout.js') }}"></script>
    <!-- StarCode CSS -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/starcode2.css') }}">
</head>
<body class="flex items-center justify-center min-h-screen py-16 lg:py-10 bg-slate-50 dark:bg-zink-800 dark:text-zink-100 font-public">
    <div class="relative">
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative">
            <div class="background-image" style="background-image;">
                <div class="content">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                        </div>
                        <img class="text-light bb" target="_blank" src="assets/images/pemandangan.png"> <a class="text-light bb" target="_blank" href="https://unsplash.com"></a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
    <!-- message -->
    {!! Toastr::message() !!}
    </body>
    </html>