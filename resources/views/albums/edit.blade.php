@extends('components.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('album.index') }}" class="btn btn-outline-dark">Back</a>
                <span class="text-darker text-xl m-4">Edit {{$record->title}}</span>
            </div>
            <div class="card-body">
                <form action="{{ route('album.update',$record->uuid) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                @include('albums.partials.form',['record' => $record])

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
