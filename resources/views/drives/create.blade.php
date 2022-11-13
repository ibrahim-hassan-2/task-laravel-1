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
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">File Title</label>
                        <input type="text" class="form-control" value="{{old("title")}}" name="title">
                    </div>
                    <div class="form-group">
                        <label for="">File Description</label>
                        <input type="text" class="form-control" value="{{old("description")}}" name="description">
                    </div>
                    <div class="form-group">
                        <label for="">File Upload</label>
                        <input type="file" class="form-control" name="file_input">
                    </div>
                    <button class="btn btn-info">Upload File</button>
                </form>
            </div>
        </div>
    </div>
@endsection
