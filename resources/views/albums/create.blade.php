@extends('components.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('album.index') }}" class="btn btn-outline-dark">Back</a>
                <span class="text-darker text-xl m-4">New Album</span>
            </div>
            <div class="card-body">
                <form action="{{ route('album.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                @include('albums.partials.form')
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


