<div class="row">
    <!-- records list -->
@foreach($records as $record)
        <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$record->title}}</h5>
                <p class="card-text badge badge-info">Contain: {{ $record->attachments()->count() }} Img</p>
                <div>
                    <a href="{{ route('album.edit',$record->uuid) }}" class="btn btn-default p-2"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('album.delete') }}" class="btn btn-danger p-2"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

        <!-- Pagination Links -->
        <div class="d-flex justify-content-end">
            {{ $records->links() }}
        </div>
</div>
