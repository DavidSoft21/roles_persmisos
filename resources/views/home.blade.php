@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">News</h3>
        </div>
        <div class="section-body ">
            <div class="row d-flex justify-content-center">
            @foreach($blogs as $blog)
                <div class="sm-col-12 md-col-4">
                    <div class="card m-1" style="width:350px; height:250px;">
                        <div class="card-header justify-content-center">
                            <h4 class="text-capitalize"> {{$blog->title}}</h4>
                        </div>
                        <div class="card-body text-lowercase text-center">
                            <div class="overflow-auto" style="height:100px; overflow-y: scroll;">
                                <p>
                                    {{$blog->content}}
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="card-text text-capitalize font-weight-bold">
                                {{ $blog->name }}
                            </div>
                            <div class="actions text-lowercase">
                                @if(auth()->user() != null)
                                    @if(auth()->user()->hasRole('admin'))
                                        {!! Form::open(['route' => ['blog.destroy',$blog->id], 'method' => 'DELETE', 'style' =>'display:inline']) !!}
                                        {!! Form::submit('delete',['class'=> 'btn btn-danger']) !!} 
                                        {!! Form::close() !!}  
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection

