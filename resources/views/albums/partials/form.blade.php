<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="form-control-label">Album Name</label>
            <input class="form-control" required name="album_title" type="text"
                   value="{{ isset($record) ? $record->title : 'Ex: My New Album' }}">
            @if($errors->has('album_title'))
                <div class="error text-danger">{{ $errors->first('album_title') }}</div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="form-control-label">Album Image</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*"
                   onchange="loadFile(event)">
            @if($errors->has('images'))
                <div class="error text-danger">{{ $errors->first('images') }}</div>
            @endif
            @if($errors->has('images_names'))
                <div class="error text-danger">{{ $errors->first('images_names') }}</div>
            @endif
        </div>
        <br>
    </div>
    <div class="col-lg-12">
        <div id="gallery" class="m-2 row"></div>

        <div id="gallery-old" class="m-2 row">
            @if(isset($record))
                @foreach($record->attachments as $attach)
                    <div class="col-lg-3 card w-75 m-3 attachment-card" data-uuid="{{ $attach->uuid }}">
                        <div class="mt-2">
                            <a href="#" class="btn btn-danger delete-image"
                               data-url="{{ route('album.delete-img',['imgUuid' => $attach->uuid]) }}"><i
                                    class="fa fa-trash text-white"></i></a>
                        </div>
                        <img src="{{ asset('/storage'. '/' .$attach->path) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div readonly class="form-control">{{ $attach->file_name }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.delete-image').click(function (e) {
                e.preventDefault();

                let url = $(this).data('url');
                let attachmentCard = $(this).closest('.attachment-card');

                if (confirm('Are you sure you want to delete this image?')) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                // Remove the attachment card
                                attachmentCard.remove();
                            } else {
                                alert('Failed to delete the image.');
                            }
                        },
                        error: function (xhr) {
                            alert('Error: ' + xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        const img = (src) => `<div class="col-lg-3 card w-75 m-3">
                    <img src="${src}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <input name="images_names[]" class="form-control" placeholder="Enter Image Name" type="text"/>
                    </div>
                </div>`;

        var loadFile = function (event) {
            var output = document.getElementById('gallery');
            output.innerHTML = '';

            [...event.target.files].forEach(
                (file) => (output.innerHTML += img(URL.createObjectURL(file)))
            );
        };
    </script>
@endpush
