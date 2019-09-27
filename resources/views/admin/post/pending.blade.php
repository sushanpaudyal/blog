@extends('layouts.backend.app')

@section('title', 'View All Posts')

@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{route('admin.post.create')}}">
                <i class="material-icons">add</i>
                <span>Add New Post</span>
            </a>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            VIEW PENDING POSTS
                            <span class="badge bg-blue">{{ $posts->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th> <i class="material-icons">visibility </i></th>
                                    <th>Is Approved</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{ str_limit($post->title, '10') }}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->view_count}}</td>
                                        <td>
                                            @if($post->is_approved == true)
                                                <span class="badge bg-blue">Approved</span>
                                            @else
                                                <span class="badge bg-pink">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->status == true)
                                                <span class="badge bg-blue">Published</span>
                                            @else
                                                <span class="badge bg-pink">Draft</span>
                                            @endif
                                        </td>
                                        <td>{{$post->created_at}}</td>
                                        <td class="text-center">


                                            <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info btn-xs waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>

                                            <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-info btn-xs waves-effect">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <button class="btn btn-danger btn-xs waves-effect" type="button" onclick="deleteTag({{ $post->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>


                                            @if($post->is_approved == false)
                                                <a type="button" class="btn btn-success btn-xs waves-effect" onclick="approvePost({{ $post->id }})">
                                                    <i class="material-icons">done</i>
                                                    <span></span>
                                                </a>
                                                <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none">
                                                    @csrf
                                                    @method('PUT')
                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection


@push('js')

@endpush


