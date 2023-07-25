@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blogs</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Blogs List</h3>

                            @can('blogs.create')
                            <a class="btn btn-success btn-lg" href="{{ route('blog.create')  }}">Add</a>
                            @endcan
                            <div class="overflow-auto" style="overflow-x: scroll;">
                               <table class="table  mt-2">
                                    <thead style="background: #9894ed5d">
                                      <tr>
                                        <th style="display: none">ID</th>
                                        <th>Title</th>
                                        <th class="">Content</th>
                                        <th class="">User</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                          <tr>
                                            <td style="display: none">{{ $blog->id }}</td>
                                            <th>
                                              <div class="overflow-auto" style="max-height:70px;max-width:200px; overflow-y: scroll;">
                                              {{ $blog->title }}
                                              </div>
                                            </th>
                                            <td >
                                                <div class="overflow-auto" style="max-height:70px;max-width:200px; overflow-y: scroll;">
                                                  {{ $blog->content }}
                                                </div>
                                            </td>
                                            <td class="">{{ $blog->name }}</td>
                                            <td>
                                                @can('blogs.edit')
                                                <a class="btn btn-warning" href="{{route('blog.edit',$blog->id)}}" style="width:65px">edit</a>
                                                @endcan
                                                @can('blogs.destroy')
                                                {!! Form::open(['route' => ['blog.destroy',$blog->id], 'method' => 'DELETE', 'style' =>'display:inline']) !!}
                                                {!! Form::submit('delete',['class'=> 'btn btn-danger']) !!} 
                                                {!! Form::close() !!}  
                                                @endcan('blogs.edit')
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                               
                            
                              <div class="pagination justify-end">
                                {{ $blogs->links() }}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection