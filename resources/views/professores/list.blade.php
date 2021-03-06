@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Professores</h2>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-responsive table-hover">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Modalidade/Horario</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($professores as $p)
                        <tr>
                            <td>{{$p->nome}}</td>
                            <td>{{$p->email}}</td>
                            <td>
                                @foreach($p->modalidades as $m)
                                    {{$m->nome}} / {{$m->horario}}<br>
                                @endforeach
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('professor.edit',['id'=>$p->id])}}" class="btn btn-warning">Editar</a>
                                    <form action="{{route('professor.destroy',['id'=>$p->id])}}" method="post">
                                        {{csrf_field()}}{{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection