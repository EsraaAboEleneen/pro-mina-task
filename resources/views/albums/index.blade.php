@extends('components.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <h3 class="text-darker"><i class="fa fa-image m-3"></i>Albums List</h3>
                <div class="d-flex justify-content-md-end">
                    <a href="{{ route('album.create') }}" class="btn btn-primary">Add New Album</a>
                </div>
            </div>
            <div class="card-body">
                @include('albums.partials.view')
            </div>
        </div>
    </div>
@endsection
