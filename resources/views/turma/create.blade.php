@extends('template.index')

@section('content')

<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">{{ isset($turma) ? 'Editar turma' : 'Cadastro turma' }}</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="">
        {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aluno">Aluno</label>
                        <select id="aluno" class="form-control reset select2 not-null" name="aluno" required>
                                <option selected>Selecione</option>
                            @foreach ($alunos as $key => $item)
                                <option value="{{ $item->id }}" {{ isset($turma[0]) && $turma[0]->cod_aluno == $item->id ? 'selected' : ''  }}>{{ $item->name }}</option>
                            @endforeach
                        </select>  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="disciplinas">disciplinas</label>
                        <select id="disciplinas" class="form-control reset select2 not-null" name="disciplina" required>
                                <option selected>Selecione</option>
                            @foreach ($disciplinas as $key => $item)
                                <option value="{{ $item->id }}" {{ isset($turma[0]) && $turma[0]->cod_disciplina == $item->id ? 'selected' : ''  }}>{{ $item->name }}</option>
                            @endforeach
                        </select>                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="professores">Professores</label>
                        <select id="professores" class="form-control reset select2 not-null" name="professor" required>
                                <option selected>Selecione</option>
                                @foreach ($professores as $key => $item)
                                    <option value="{{ $item->id }}" {{ isset($turma[0]) && $turma[0]->cod_professor == $item->id ? 'selected' : ''  }}>{{ $item->name }}</option>
                                @endforeach
                        </select>                    
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Carga horaria</label>
                        <input type="text" class="form-control not-null" name="carga" value="{{ isset($turma[0]) ? $turma[0]->carga_horaria : '' }}" placeholder="Carga horaria" >             
                    </div>
                </div>
                
            </div>
                <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>
    </div>
</div>
@section('script-js')
    @include('turma.turma-js', ['id'=>$id ?? 0])
@endsection
@endsection