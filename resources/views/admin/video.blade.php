@extends('Layout.admindash')

@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>Edit Video Link</h1>

        <div class="separator mb-5"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Video Link</h5>

                <!-- Menampilkan pesan sukses jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('video.update', $videoLink->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                    <div class="form-group">
                        <label for="link">Video Link</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $videoLink->link) }}" placeholder="Enter video link" required>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mt-3">Update Link</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
