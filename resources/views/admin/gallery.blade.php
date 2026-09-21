@extends('Layout.admindash')

@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>Gallery Section</h1>
    </div>

    <div class="separator mb-5"></div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Gallery</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                        <tr>
                            <th scope="row">{{ $gallery->id }}</th>
                            <td>
                                @if($gallery->image)
                                <a href="{{ asset('storage/' . $gallery->image) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image" width="100" class="img-thumbnail">
                                </a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="d-inline-block gallery-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="file" class="form-control-file image-upload-validation" name="image" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Add New Gallery -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Gallery</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="gallery-form">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file image-upload-validation" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary d-block mt-3">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInputs = document.querySelectorAll('.image-upload-validation');
            const maxFileSize = 2 * 1024 * 1024; // 2MB

            fileInputs.forEach(function(input) {
                input.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file && file.size > maxFileSize) {
                        alert('File is too large! Maximum size is 2MB.');
                        // Clear the file input
                        event.target.value = '';
                    }
                });
            });
        });

        // Initialize modal logic for adding new gallery
        var editModal = document.getElementById('exampleModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function (event) {
                // Set form action or other dynamic data if needed
            });
        }
    </script>
@endpush
