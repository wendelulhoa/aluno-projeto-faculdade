<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar toggle-sidebar">
    <ul class="side-menu toggle-menu">
        <li><h3>Principal</h3></li>
        <li>
            <a class="side-menu__item" href="{{ url('/') }}"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Inicio</span></a>
        </li>
        @guest
             <li class="slide">
                <a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fas fa-user-shield"></i><span class="side-menu__label">Entrar</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li >
                        <a class="slide-item" href="{{ route('login') }}"><i class="side-menu__icon fas fa-lock-open"></i></i>{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li >
                            <a class="slide-item" href="{{ route('register') }}"><i class="side-menu__icon fas fa-id-card"></i>{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </li>
            @else
            <li class="slide">
                <a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fas fa-user-cog"></i><span class="side-menu__label">Admin</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    @if (Auth::user()->type_user == 1)
                        <li><a class="slide-item"  href="{{ Route('user-index') }}"><span>Inicio</span></a></li>
                    @else
                    @endif
                        <li><a class="slide-item side-menu__icon"  href="{{ Route('aluno-create-view') }}"><span>Cadastrar aluno</span></a></li>
                        <li><a class="slide-item"  href=""><span>Cadastrar professor</span></a></li>
                        <li><a class="slide-item"  href=""><span>Cadastrar disciplina</span></a></li>
                </ul>
            </li>
        @endguest
        
        
        <li><h3></h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ Route('aluno-index') }}"></i> <span class="side-menu__label">GTA V</span><i class="angle fa fa-angle-right"></i></a>
            {{-- <a class="side-menu__item" data-toggle="slide" href="#"></i> <span class="side-menu__label">GTA V</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="" class="slide-item "><i class="side-menu__icon fas fa-tools"></i> Ferramentas</a></li>
            </ul> --}}
        </li>
        <li>
            <a class="side-menu__item" href="{{ Route('aluno-index') }}"><i class="side-menu__icon fas fa-home"></i><span class="side-menu__label">Inicio</span></a>
        </li>
        
    </ul>
</aside>
<!--sidemenu end-->