@extends('Layout.admindash')

@section('dashboard')
<div class="row">
    <div class="col-12">
        <h1>Introduction Section</h1>

        <div class="top-right-button-container">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createModal">
                Create Introduction
            </button>
        </div>

        <div class="separator mb-5"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Introduction</h5>

                <form action="{{ route('introduction.update', $introduction->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $introduction->title) }}" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $introduction->subtitle) }}" placeholder="Subtitle" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                        @if($introduction->image)
                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $introduction->image) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                    <img src="{{ asset('storage/' . $introduction->image) }}" alt="Image" width="100" class="img-thumbnail">
                                </a>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary d-block mt-3">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal for Creating Introduction -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Introduction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('introduction.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" placeholder="Subtitle" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mt-3">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
