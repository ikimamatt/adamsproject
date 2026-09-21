@extends('Layout.admindash')
@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>Jumbotron Section</h1>

        <div class="top-right-button-container">
            @php
            // Menghitung jumlah data jumbotron
            $jumbotronCount = $jumbotron->count();
            @endphp

            <!-- Tombol Create hanya ditampilkan jika jumlah data lebih dari 1 -->
            @if ($jumbotronCount > 1)
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                    Create
                </button>
            @endif

        </div>



        <div class="separator mb-5"></div>
    </div>
</div>

<div class="row">

    <div class="col-md-12 col-lg-12 mb-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update Jumbotron</h5>

            <form action="{{ route('jumbotron.update', $jumbotron->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="text_left">Text Left</label>
                        <input type="text" class="form-control" id="text_left" name="text_left" value="{{ old('text_left', $jumbotron->text_left) }}" placeholder="Text Left" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="text_right">Text Right</label>
                        <input type="text" class="form-control" id="text_right" name="text_right" value="{{ old('text_right', $jumbotron->text_right) }}" placeholder="Text Right" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="background_image">Background Image</label>
                    <input type="file" class="form-control-file" id="background_image" name="background_image" accept="image/*">
                    @if($jumbotron->background_image)
                        <div class="mt-2">
                            <!-- Gambar bisa diklik untuk melihatnya lebih besar -->
                            <a href="{{ asset('storage/' . $jumbotron->background_image) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="{{ asset('storage/' . $jumbotron->background_image) }}" alt="Background Image" width="100" class="img-thumbnail">
                            </a>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="profile_image">Profile Image</label>
                    <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept="image/*">
                    @if($jumbotron->profile_image)
                        <div class="mt-2">
                            <!-- Gambar bisa diklik untuk melihatnya lebih besar -->
                            <a href="{{ asset('storage/' . $jumbotron->profile_image) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="{{ asset('storage/' . $jumbotron->profile_image) }}" alt="Profile Image" width="100" class="img-thumbnail">
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jumbotron.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="text_left">Text Left</label>
                            <input type="text" class="form-control" id="text_left" name="text_left" value="{{ old('text_left') }}" placeholder="Text Left" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="text_right">Text Right</label>
                            <input type="text" class="form-control" id="text_right" name="text_right" value="{{ old('text_right') }}" placeholder="Text Right" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="background_image">Background Image</label>
                        <input type="file" class="form-control-file" id="background_image" name="background_image" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="profile_image">Profile Image</label>
                        <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mt-3">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
