@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Roles List</h3>

                            @can('crear-rol')
                                <a class="btn btn-success btn-lg" href="{{ route('rol.create')  }}">Add</a>
                            @endcan
                                <table class="table  mt-2">
                                    <thead style="background: #9894ed5d">
                                      <tr>
                                        <th style="">ID</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $rol)
                                          <tr>
                                            <td style="">{{ $rol->id }}</td>
                                            <th>{{ $rol->name }}</th>
                                            <td>
                                                @can('editar-rol')
                                                <a class="btn btn-warning" href="{{route('rol.edit',$rol->id)}}">edit</a>
                                                @endcan

                                                @can('eliminar-rol')
                                                {!! Form::open(['route' => ['rol.destroy',$rol->id], 'method' => 'DELETE', 'style' =>'display:inline']) !!}
                                                {!! Form::submit('delete',['class'=> 'btn btn-danger']) !!} 
                                                {!! Form::close() !!} 
                                                @endcan 
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                              <div class="pagination justify-end">
                                {{ $roles->links() }}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection