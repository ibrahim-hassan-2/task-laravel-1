@extends('layouts.app')

@section('content')
    @if (Session::has('done'))
        <div class="alert alert-success mx-auto col-6">
            {{ Session::get('done') }}
        </div>
    @endif

    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th colspan="3">Action</th>
                    </tr>
                    @if (count($drives) > 0)
                        @foreach ($drives as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <th>{{ $item->title }}</th>
                                <th>{{ $item->description }}</th>
                                <td>
                                    <a href="{{ route('file.show', $item->id) }}"class="btn btn-info">Show</a>
                                </td>
                                <td>
                                    <a href="{{ route('file.edit', $item->id) }}"class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('file.delete', $item->id) }}"class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" align="center">No Records Found.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
