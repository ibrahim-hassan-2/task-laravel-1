@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <div class="card">
            <div class="card-body">

                    <div class="form-group">
                        <label for="">File Title</label>
                        <input disabled type="text" class="form-control" value="{{ $drives->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">File Description</label>
                        <input disabled type="text" class="form-control" value="{{ $drives->description }}">
                    </div>
                    <div class="form-group">
                        <label for="">File Upload</label>
                        <input disabled type="text" class="form-control" value="{{ $drives->file }}">
                    </div>
            </div>
        </div>
    </div>
@endsection
