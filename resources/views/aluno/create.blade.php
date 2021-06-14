@extends('template.index')

@section('content')

<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Cadastro aluno</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="">
        {{csrf_field()}}
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nome" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-success">
                            <input type="email" class="form-control is-valid state-valid" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group has-success">
                        <b for="input-avatar">Carregar uma imagem de perfil personalizada:</b>
                            <small>(Somente .jpg ou .png; Tamanho máximo de 750Kb; Resolução recomendada de
                                256x256 pixels)</small>
                            <div>
                                <div class="row pt-3">
                                    <div class="col-2 col-md-2">
                                        <a class="thumbnail jq-thumb">
                                            <img src="{{ auth()->user()->image != null ? Route('index').'/'.'images/'.auth()->user()->image : mix('images/user.png') }}"
                                                alt="thumb1" class="thumbimg" id="img-modify">
                                        </a>
                                    </div>
                                    <input type="file" name="img" class="pt-3" id="input-avatar"
                                        accept="image/jpeg, image/png">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
@section('script-js')
    @include('aluno.aluno-js')
@endsection
@endsection