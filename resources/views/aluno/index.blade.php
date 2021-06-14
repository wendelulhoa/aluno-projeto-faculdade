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
                            <th>Nome</th>
                            <th>email</th>
                            <th>data criação</th>
                            <th colspan="3">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr id="tr-{{ $item->id }}">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ date_format($item->created_at ,'d/m/Y H:i:s') }}</td>
                                @if (Auth::user()->type_user == 0)
                                    <td>{!! 1 == 1 ? '<button class="btn btn-success btn-sm status-mod" data-id="'.$item->id.'" data-type="false">Aprovar</button>' : '<button class="btn btn-danger btn-sm status-mod" id="status-mod" data-id="'.$item->id.'" data-type="true">Bloquear</button>' !!} </td>
                                @else
                                    <td>aaa</td>
                                @endif
                                <td><a href=""><i class="fas fa-edit"></i></i></a></td>
                                <td><a class="delete-mod" href="" style="color: red"> <i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive -->
        </div>
        <div class="pt-2" >
            {{ $student->links() }}
        </div>
    </div><!-- col end -->
</div>
@endsection