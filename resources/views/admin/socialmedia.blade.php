@extends('Layout.admindash')
@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>Social Media Links</h1>
        <div class="separator mb-5"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manage Social Media Links</h5>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('social-media.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="instagram">Instagram URL</label>
                        <input type="url" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $socialMedia->instagram) }}" placeholder="https://www.instagram.com/username">
                        @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="facebook">Facebook URL</label>
                        <input type="url" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $socialMedia->facebook) }}" placeholder="https://www.facebook.com/username">
                        @error('facebook')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tiktok">TikTok URL</label>
                        <input type="url" class="form-control" id="tiktok" name="tiktok" value="{{ old('tiktok', $socialMedia->tiktok) }}" placeholder="https://www.tiktok.com/@username">
                        @error('tiktok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter URL</label>
                        <input type="url" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $socialMedia->twitter) }}" placeholder="https://www.twitter.com/username">
                        @error('twitter')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary d-block mt-3">Update Links</button>

                </form>

                @if($socialMedia->exists)
                    <form action="{{ route('social-media.destroy', $socialMedia->id) }}" method="POST" class="mt-3" onsubmit="return confirm('Are you sure you want to delete all social media links?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete All Links</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
