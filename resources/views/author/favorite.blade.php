@extends('layouts.backend.app')

@section('title', 'View Favourite Posts')

@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush

@section('content')

    <div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            VIEW FAVORITE POSTS
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
                                    <th><i class="material-icons">favorite</i></th>
                                    {{--<th><i class="material-icons">comment</i></th>--}}
                                    <th> <i class="material-icons">visibility </i></th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ str_limit($post->title,'10') }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->favorite_to_users->count() }}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td class="text-center">

                                            <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>

                                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $post->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('post.favorite',$post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
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


