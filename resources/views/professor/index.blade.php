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
                            <th></th>
                            <th>Nome</th>
                            <th>email</th>
                            <th colspan="3">data criação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professores as $item)
                            <tr id="tr-{{ $item->id }}">
                                <td><span class="avatar avatar-md brround cover-image" data-image-src="{{ $item->image != null ? Route('index').'/'.'images/'.$item->image : mix('images/user.png') }}"></span></td>                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ date_format($item->created_at ,'d/m/Y H:i:s') }}</td>
                                <td><a href="{{ Route('professor-edit-view',['id'=> $item->id]) }}"><i class="fas fa-edit"></i></i></a></td>
                                {{-- <td><a class="delete-professor" href="{{ Route('professor-delete', ['id'=> $item->id]) }}" style="color: red"> <i class="fas fa-trash-alt"></i></a></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive -->
        </div>
        <div class="pt-2" >
            {{ $professores->links() }}
        </div>
    </div><!-- col end -->
</div>
@section('script-js')
    @include('aluno.aluno-js')
@endsection
@endsection