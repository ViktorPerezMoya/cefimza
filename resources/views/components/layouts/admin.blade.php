<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Laravel 10 Livewire User Registration and Login - AllPHPTricks.com' }}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <style>
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100;
                padding: 90px 0 0;
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
                z-index: 99;
            }

            @media (max-width: 767.98px) {
                .sidebar {
                    top: 11.5rem;
                    padding: 0;
                }
            }

            .navbar {
                box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
            }

            @media (min-width: 767.98px) {
                .navbar {
                    top: 0;
                    position: sticky;
                    z-index: 999;
                }
            }

            .sidebar .nav-link {
                color: #333;
            }

            .sidebar .nav-link.active {
                color: #0d6efd;
            }
        </style>
        @livewireStyles
        @stack('styles')
    </head>
    <body>
        <nav class="navbar navbar-light bg-light p-3">
            <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
                <a class="navbar-brand" href="#">
                    CEFIMendoza
                </a>
                <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-12 col-md-4 col-lg-2">
                <!--<input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">-->
            </div>
            <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
                <div class="mr-3 mt-1">
                    <!--<a class="github-button" href="https://github.com/themesberg/simple-bootstrap-5-dashboard" data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star /themesberg/simple-bootstrap-5-dashboard">Star</a>-->
                </div>
                @guest
                    <a class="nav-link link-secondary {{ (request()->is('login')) ? 'active' : '' }}" href="/auth/login" wire:navigate>Login</a>
                <!--
                    <a class="nav-link link-secondary {{ (request()->is('register')) ? 'active' : '' }}" href="/auth/register" wire:navigate>Register</a>
                -->
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </button>
                        <livewire:logout />
                    </div>
                @endguest
            </div>
        </nav>

        @auth
            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                        <div class="position-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('dashboard')) ? 'active' : '' }}" href="/admin/dashboard" wire:navigate>
                                        <i class="fa-solid fa-house"></i>
                                        <span class="ml-2">Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('secciones')) ? 'active' : '' }}" href="/admin/secciones" wire:navigate>
                                        <i class="fa-solid fa-puzzle-piece"></i>
                                        <span class="ml-2">Secciones</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('equipo')) ? 'active' : '' }}" href="/admin/equipo" wire:navigate>
                                        <i class="fa-solid fa-people-group"></i>
                                        <span class="ml-2">Equipo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('parametros')) ? 'active' : '' }}" href="/admin/parametros" wire:navigate>
                                        <i class="fa-solid fa-gears"></i>
                                        <span class="ml-2">Parámetros</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('usuarios')) ? 'active' : '' }}" href="/admin/usuarios" wire:navigate>
                                        <i class="fa-solid fa-users"></i>
                                        <span class="ml-2">Usuarios</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ (request()->routeIs('configuracion')) ? 'active' : '' }}" href="/admin/configuracion" wire:navigate>
                                        <i class="fa-solid fa-user-gear"></i>
                                        <span class="ml-2">Configuración</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                        <!--<nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>-->
                        {{ Breadcrumbs::render()}}

                        @if (session()->has('message'))
                            <div class="row justify-content-center text-center mt-3">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (session()->has('error_message'))
                            <div class="row justify-content-center text-center mt-3">
                                <div class="col-md-12">
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error_message') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{ $slot }}

                    </main>
                </div>
            </div>
        @else

        <div class="container-fluid">
            <div class="row">
                <main class="col-md-9 col-lg-12 px-md-4 py-4">

                    {{ $slot }}
                    <!--
                    <div class="row justify-content-center text-center mt-3">
                        <div class="col-md-12">
                            <p>Back to Tutorial:
                                <a href="https://www.allphptricks.com/laravel-10-livewire-user-registration-and-login/"><strong>Tutorial Link</strong></a>
                            </p>
                            <p>
                                For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
                            </p>
                        </div>
                    </div>
                    -->
                </main>
            </div>
        </div>
        @endauth

        <script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script>/*
            new Chartist.Line('#traffic-chart', {
                labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
                series: [
                    [23000, 25000, 19000, 34000, 56000, 64000]
                ]
                }, {
                low: 0,
                showArea: true
            });*/
        </script>
        @stack('scripts')
    </body>
</html>
