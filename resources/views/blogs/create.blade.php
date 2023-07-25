@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Create Blog</h3>
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
                            {!! Form::open(['route' => ['blog.store'], 'method' => 'POST']) !!}
                              
                            <input type="text" value='{{auth()->id()}}' style="display:none" name="user_id">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        {!! Form::text('title',null, ['class'=> 'form-control']) !!}

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        {!! Form::textarea('content',null, ['class'=> 'form-control', 'rows' => 5, 'cols' => 40, 'style' => 'resize:none;height:100px']) !!}
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

