@extends('layouts.backend.app')

@section('title', 'Tag')

@push('css')
    <link href="{{asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    @endpush

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{route('admin.tag.create')}}">
               <i class="material-icons">add</i>
                <span>Add New Tag</span>
            </a>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           VIEW ALL TAGS
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                               <tbody>
                               @foreach($tags as $key => $tag)
                               <tr>
                                   <td>{{$key + 1}}</td>
                                   <td>{{$tag->name}}</td>
                                   <td>{{$tag->created_at}}</td>
                                   <td>{{$tag->created_at}}</td>
                                   <td class="text-center">
                                       <a href="{{route('admin.tag.edit', $tag->id)}}" class="btn btn-info waves-effect">
                                           <i class="material-icons">edit</i>
                                       </a>
                                       <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $tag->id }})">
                                           <i class="material-icons">delete</i>
                                       </button>
                                       <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: none;">
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


