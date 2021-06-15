@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div>
                    <h3 class="card-title">Alunos</h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Nome Aluno</th>
                            <th>Nome Professor</th>
                            <th>Disciplina</th>
                            <th>carga horaria</th>
                            <th colspan="3">data criação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($turmas as $item)
                            <tr id="tr-{{ $item->id }}">
                                <td>{{ $item->nome_aluno }}</td>
                                <td>{{ $item->nome_prof }}</td>
                                <td>{{ $item->nome_disciplina }}</td>
                                <td>{{ $item->carga_horaria }}</td>
                                <td>{{ date_format($item->created_at ,'d/m/Y H:i:s') }}</td>
                                <td><a href="{{ Route('turma-edit-view',['id'=> $item->id]) }}"><i class="fas fa-edit"></i></i></a></td>
                                <td><a class="delete-turma" href="{{ Route('turma-delete', ['id'=> $item->id]) }}" style="color: red"> <i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive -->
        </div>
        <div class="pt-2" >
            {{ $turmas->links() }}
        </div>
    </div><!-- col end -->
</div>
@section('script-js')
    @include('turma.turma-js')
@endsection
@endsection