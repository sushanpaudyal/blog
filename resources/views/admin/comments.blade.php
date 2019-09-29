@extends('layouts.backend.app')

@section('title', 'View Comments')

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
                            VIEW ALL COMMENTS
                            <span class="badge bg-blue">{{ $comments->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th class="text-center">Comments Info</th>
                                    <th class="text-center">Post Info</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" width="64" height="64">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small>
                                                    </h4>
                                                    <p>{{ $comment->comment }}</p>
                                                    <a target="_blank" href="{{ route('post.details',$comment->post->slug.'#comments') }}">Reply</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="media-right">
                                                    <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                        <img class="media-object" src="{{ Storage::disk('public')->url('post/'.$comment->post->image) }}" width="64" height="64">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                        <h4 class="media-heading">{{ str_limit($comment->post->title,'40') }}</h4>
                                                    </a>
                                                    <p>by <strong>{{ $comment->post->user->name }}</strong></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger waves-effect" onclick="deleteTag({{ $comment->id }})">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $comment->id }}" method="POST" action="{{ route('admin.comment.destroy',$comment->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
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


