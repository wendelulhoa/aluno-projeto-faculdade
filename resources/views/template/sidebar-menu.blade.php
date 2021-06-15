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
                    <li><a class="slide-item side-menu__icon"  href="{{ Route('aluno-create-view') }}"><span>Cadastrar aluno</span></a></li>
                    <li><a class="slide-item"  href="{{ Route('professor-create-view') }}"><span>Cadastrar professor</span></a></li>
                    <li><a class="slide-item"  href="{{ Route('disciplina-create-view') }}"><span>Cadastrar disciplina</span></a></li>
                    <li><a class="slide-item"  href="{{ Route('turma-create-view') }}"><span>Enturmar aluno</span></a></li>
                </ul>
            </li>
        @endguest
        
        <li><h3>Listagens</h3></li>
        <li>
            <a class="side-menu__item" href="{{ Route('disciplina-index') }}"><i class="side-menu__icon fas fa-book"></i><span class="side-menu__label">Disciplinas</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ Route('aluno-index') }}"><i class="side-menu__icon fas fa-user-graduate"></i><span class="side-menu__label">Alunos</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ Route('professor-index') }}"><i class="side-menu__icon fas fa-chalkboard-teacher"></i><span class="side-menu__label">Professores</span></a>
        </li>
        <li>
            <a class="side-menu__item" href="{{ Route('turma-index') }}"><i class="side-menu__icon fas fa-user-friends"></i><span class="side-menu__label">Turmas</span></a>
        </li>
        
    </ul>
</aside>
<!--sidemenu end-->