@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Edit User</h3>
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
                            {!! Form::model($user, ['route' => ['user.update',$user->id], 'method' => 'PATCH']) !!}
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
                                        <label for="email">Email:</label>
                                        {!! Form::email('email',null, ['class'=> 'form-control']) !!}

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">´Password:</label>
                                        {!! Form::password('password', ['class'=> 'form-control']) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password-confirm">Password Confirm:</label>
                                        {!! Form::password('password-confirm', ['class'=> 'form-control']) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="roles">Roles:</label>
                                        {!! Form::select('roles[]',$roles,[], ['class'=> 'form-control']) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    {!! Form::submit('Edit', ['class' => 'btn btn-warning btn-lg']) !!}
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

