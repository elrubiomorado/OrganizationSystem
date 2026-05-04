@extends('adminlte::page')

@section('title', 'Notes')

@section('content_header')
    <h1>Notes list</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary shadow-lg" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <h3 class="card-title">Notes Table</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.notes.create') }}" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> New Note
                            </a>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notes as $note)
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $note->user->name }}</td>
                                        <td>{{ $note->created_at }}</td>
                                        <td>Todo</td>
                                        <td>{{ $note->title }}</td>
                                    </tr>
                                    <tr class="expandable-body d-none">
                                        <td colspan="10">
                                            <p>{{ $note->content }}</p>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No found notes</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {{ $notes->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
