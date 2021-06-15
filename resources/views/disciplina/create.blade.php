@extends('template.index')

@section('content')

<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">{{ isset($disciplina) ? 'Editar' : 'Cadastro' }}</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="">
        {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control not-null" name="name" value="{{ isset($disciplina) ? $disciplina[0]->name : '' }}" placeholder="Nome" >
                    </div>
                </div>
                
            </div>
                <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>
    </div>
</div>
@section('script-js')
    @include('disciplina.disciplina-js', ['id'=>$id ?? 0])
@endsection
@endsection