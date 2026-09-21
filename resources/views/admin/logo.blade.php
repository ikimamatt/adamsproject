@extends('Layout.admindash')
@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>Logo</h1>
        <div class="separator mb-5"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Update Logo</h5>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="profile_image">Profile Image</label>
                        <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept="image/*">
                        @error('profile_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        @if($logo && $logo->profile_image)
                            <div class="mt-2">
                                <!-- Gambar bisa diklik untuk melihatnya lebih besar -->
                                <a href="{{ asset('storage/' . $logo->profile_image) }}" data-toggle="lightbox" data-gallery="example-gallery">
                                    <img src="{{ asset('storage/' . $logo->profile_image) }}" alt="Profile Image" width="100" class="img-thumbnail">
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

@endsection
