<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content=" ">
        <meta name="keywords" content=" ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="author" content="">

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <link rel="apple-touch-icon" href="assets/img/favicon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon-114x114.png">

        <!--site title-->
        <title>MavApp</title>


        <!--web font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <link rel="stylesheet" href="{{ URL::asset('website/vendor/bs/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/vendor/bicon/css/bicon.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/vendor/owl/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/vendor/owl/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/vendor/magnific-popup/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/vendor/animate.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('website/css/main.css') }}">
    </head>
    <body>

        <div class="main-content">
            <header class="header">
                <nav class="navbar navbar-inverse- navbar-white navbar-fixed-top navbar-expanded">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">
                                <img class="img-responsive" src="{{ URL::asset('website/img/logo.png') }}" alt="">
                            </a>
                        </div>
                        @include("website.header")

