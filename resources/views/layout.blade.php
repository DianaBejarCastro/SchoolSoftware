<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
   
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">

</head>



<body>

    @yield('modelo')
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="#" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Don Bosco</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navegación</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                        class="nav-item active">
                        <a href="{{route('home')}}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Inicio</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menú</label>
                    </li>

                    @auth
                    @can('manejo_materias_docentes')
                        
                   
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Materias</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="form elements advance componant validation masking wizard picker select"
                                class="nav-item">
                                <a href="{{route('materia.index')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-file-text"></i></span><span class="pcoded-mtext">Agregar
                                        Nuevo</span></a>
                            </li>
                            <li data-username="Table bootstrap datatable footable" class="nav-item">
                                <a href="{{route('materia.list')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-server"></i></span><span
                                        class="pcoded-mtext">Ver Registros</span></a>
                            </li>
                        </ul>
                    </li>


                    @endcan

                    @can('editar_estudiantes')
                    
                    
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span
                                class="pcoded-mtext">Estudiantes</span></a>
                        <ul class="pcoded-submenu">
                            
                            <li data-username="form elements advance componant validation masking wizard picker select"
                                class="nav-item">
                                <a href="{{route('estudiante.index')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-file-text"></i></span><span class="pcoded-mtext">Agregar
                                        Nuevo</span></a>
                            </li>
                            <li data-username="Table bootstrap datatable footable" class="nav-item">
                                <a href="{{route('estudiante.listbefore')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-server"></i></span><span
                                        class="pcoded-mtext">Ver Registros</span></a>
                            </li>
                        
                            {{--  
                        <li data-username="Table bootstrap datatable footable" class="nav-item">
                                <a href="{{route('estudiante.viewDatos')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-server"></i></span><span
                                        class="pcoded-mtext">Buscar Registros</span></a>
                            </li>--}}
                        </ul>
                    </li>
                    @endcan
                

                     @can('manejo_materias_docentes')
                        

                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds"
                        class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Docentes</span></a>
                        <ul class="pcoded-submenu">
                            <li data-username="form elements advance componant validation masking wizard picker select"
                                class="nav-item">
                                <a href="{{route('docente.index')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-file-text"></i></span><span class="pcoded-mtext">Agregar
                                        Nuevo</span></a>
                            </li>
                            <li data-username="Table bootstrap datatable footable" class="nav-item">
                                <a href="{{route('docente.list')}}" class="nav-link "><span class="pcoded-micon"><i
                                            class="feather icon-server"></i></span><span
                                        class="pcoded-mtext">Ver Registros</span></a>
                            </li>
                        </ul>
                    </li>

                         @endcan


                    <li class="nav-item pcoded-menu-caption">
                        <label>Inicio de Sesión </label>
                    </li>
                    <li data-username="Sample Page" class="nav-item"><a href="#" class="nav-link"><span
                                class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span
                                class="pcoded-mtext">Ayuda</span></a></li>

                    <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesiòn') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                    
                @endauth

                @guest

                <li data-username="Disabled Menu" class="nav-item"><a href="{{ route('login') }}" class="nav-link"><span
                                class="pcoded-micon"><i class="feather icon-power"></i></span><span
                                class="pcoded-mtext">Iniciar Sesiòn</span></a></li>
                @endguest

                {{-- comment 
                <li data-username="Disabled Menu" class="nav-item"><a href="{{ route('notas.index') }}" class="nav-link"><span
                                class="pcoded-micon"><i class="feather icon-power"></i></span><span
                                class="pcoded-mtext">Notas</span></a></li>--}}
                    
                </ul>
            </div>
        </div>
    </nav>

    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Don Bosco </span>
            </a>
        </div>

        <div class="collapse navbar-collapse">


        </div>
    </header>



    <div class="pcoded-main-container">
    

        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">

                    <div class="main-body">
                        <div class="page-wrapper">

                            @yield('contenedor')

                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
   
    

</body>

 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script> 
<script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
   <script src="{{mix('js/app.js')}}"></script>
   

     
   
    
    @stack('js')
</html>