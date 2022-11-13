@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('file.update' , $drives->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">File Title</label>
                        <input type="text" class="form-control" name="title" value="{{ "$drives->title" }}">
                    </div>
                    <div class="form-group">
                        <label for="">File Description</label>
                        <input type="text" class="form-control" name="description" value="{{ $drives->description }}">
                    </div>
                    <div class="form-group">
                        <label for="">File Upload</label>
                        <input type="file" class="form-control" name="file_input" value="{{ $drives->file }}">
                    </div>
                    <button class="btn btn-info">Update File</button>
                </form>
            </div>
        </div>
    </div>
@endsection
