@extends('template.index')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div>
                    <h3 class="card-title">Disciplinas</h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th colspan="3">data criação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disciplinas as $item)
                            <tr id="tr-{{ $item->id }}">
                                <td>{{ $item->name }}</td>
                                <td>{{ date_format($item->created_at ,'d/m/Y H:i:s') }}</td>
                                <td><a href="{{ Route('disciplina-edit-view',['id'=> $item->id]) }}"><i class="fas fa-edit"></i></i></a></td>
                                {{-- <td><a class="delete-disciplina" href="{{ Route('disciplina-delete', ['id'=> $item->id]) }}" style="color: red"> <i class="fas fa-trash-alt"></i></a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive -->
        </div>
        <div class="pt-2" >
            {{ $disciplinas->links() }}
        </div>
    </div><!-- col end -->
</div>
@section('script-js')
    @include('aluno.aluno-js')
@endsection
@endsection