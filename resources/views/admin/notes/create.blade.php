@extends('adminlte::page')

@section('title', 'Create Note')

@section('content_header')
    <h1>Create Note</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Note</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.notes.index') }}" class="btn btn-success btn-sm">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.notes.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                    value="{{ old('title') }}" name="title">
                            </div>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="summernote" name="content" placeholder="">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Save Note</button>
                        </div>
                    </form>
                </div>
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
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                placeholder: 'Write your note here...'
            });
        });
    </script>
@stop
