@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Users</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Users List</h3>

                        
                            <a class="btn btn-success btn-lg" href="{{ route('user.create')  }}">Add</a>
                            
                                <table class="table  mt-2">
                                    <thead style="background: #9894ed5d">
                                      <tr>
                                        <th style="display: none">ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                          <tr>
                                            <td style="display: none">{{ $user->id }}</td>
                                            <th>{{ $user->name }}</th>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                            
                                                    @foreach($user->getRoleNames() as $roleName)
                                                        <h5>
                                                            <span class="badge badge-dark">
                                                                {{$roleName}}
                                                            </span>
                                                        </h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="{{route('user.edit',$user->id)}}">edit</a>
                                                {!! Form::open(['route' => ['user.destroy',$user->id], 'method' => 'DELETE', 'style' =>'display:inline']) !!}
                                                {!! Form::submit('delete',['class'=> 'btn btn-danger']) !!} 
                                                {!! Form::close() !!}  
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            
                              <div class="pagination justify-end">
                                {{ $users->links() }}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection