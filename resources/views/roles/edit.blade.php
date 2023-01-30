@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Edit Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show aria-label=close">
                                <strong>Please check this fields!!</strong>
                                @foreach($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss='alert' aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            {!! Form::model($roles,['route' => ['rol.update',$roles->id], 'method' => 'PUT']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        {!! Form::text('name',null, ['class'=> 'form-control']) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Permission:</label>
                                        <br>
                                        <ul style="list-style:none; margin:0; padding:0">
                                        @foreach($permissions as $permission)
                                        <li>  
                                            {!! Form::checkbox('permission[]',$permission->id,in_array($permission->id,$rolePermissions) ? true : false,['class'=> 'name']) !!}
                                            {!! $permission->name !!}
                                        </li>
                                        @endforeach
                                        </ul>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::submit('Save', ['class' => 'btn btn-success btn-lg']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}  

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

