@extends('Layout.admindash')
@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>Quote Section</h1>
    </div>

    <div class="separator mb-5"></div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Quote</h5>
                <form action="{{ route('admin.quoteDetail.updateQuoteDetail') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Main text</label>
        <input type="text" class="form-control" id="title" name="main" value="{{ $mainquotes->text ?? '' }}" placeholder="Title" required>
        <button type="submit" class="btn btn-primary d-block mt-3">Update</button>
    </div>
</form>

                <!-- Loop through each quote -->
                @foreach($quotes as $quote)
                    <form action="{{ route('quote.update', $quote->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Using PUT method for update -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" 
                                       value="{{ old('title', $quote->title) }}" placeholder="Title" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" 
                                       value="{{ old('subtitle', $quote->subtitle) }}" placeholder="Subtitle" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-block mt-3">Update</button>
                    </form>
                    <hr> <!-- Optional: adds a line between each form -->
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection
