@extends('Layout.admindash')
@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>News Section</h1>

        <!-- Create and Export Buttons -->

        <div class="top-right-button-container">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createNewsModal">
                Create
            </button>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-2">
            <div class="collapse dont-collapse-sm" id="displayOptions">
                <div class="d-block d-md-inline-block">
                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                        <input class="form-control" placeholder="Search Table" id="searchDatatable">
                    </div>
                </div>
                <div class="float-md-right dropdown-as-select" id="pageCountDatatable">
                    <span class="text-muted text-small">Displaying {{ $news->count() }} items </span>
                </div>
            </div>
        </div>

        <div class="separator"></div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
        <form action="{{ route('news.featureNews') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Select up to 3 news to feature</label>
                <div class="d-flex">
                    @foreach($news as $item)
                    <div class="form-check mr-3">
                        <input type="checkbox" class="form-check-input" name="news_ids[]" value="{{ $item->id }}" {{ $item->is_featured ? 'checked' : '' }} onclick="return document.querySelectorAll('input[name=\'news_ids[]\']:checked').length <= 3">
                        <label class="form-check-label">{{ $item->title }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Featured</button>
        </form>

        <table id="datatableRows" class="data-table responsive nowrap">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td>
                        <p class="list-item-heading">{{ $item->title }}</p>
                    </td>
                    <td>
                        <p class="text-muted">{{ $item->subtitle }}</p>
                    </td>
                    <td>
                        <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a> <!-- Link ke berita -->
                    </td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" style="max-width: 50px;">
                        @else
                            <p>No Image</p>
                        @endif
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editNewsModal{{ $item->id }}">
                            Edit
                        </button>

                        <!-- Delete Form -->
                        <form action="{{ route('signaturenews.destroy', $item->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
</form>




                    </td>
                </tr>

                <!-- Edit News Modal -->
                <!-- Edit News Modal -->
<!-- Edit News Modal -->
<div class="modal fade" id="editNewsModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('signaturenews.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- This is essential to update the resource -->
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $item->title) }}" required>
                    </div>

                    <!-- Subtitle Input -->
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ old('subtitle', $item->subtitle) }}" required>
                    </div>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="url" class="form-control" name="link" id="link" value="{{ old('link', $item->link) }}" required>
                    </div>

                    <!-- Category Input -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" id="category" value="{{ old('category', $item->category) }}" required>
                    </div>

                    <!-- Image Input (Optional) -->
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @if($item->image)
                            <p>Current Image: <img src="{{ asset('storage/' . $item->image) }}" style="max-width: 50px;"></p>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create News Modal -->
<!-- Create News Modal -->
<div class="modal fade" id="createNewsModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>

                    <!-- Subtitle Input -->
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" id="subtitle" required>
                    </div>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="url" class="form-control" name="link" id="link" required>
                    </div>

                    <!-- Category Input -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" name="category" id="category" required>
                    </div>

                    <!-- Image Input -->
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('searchDatatable').addEventListener('input', function() {
        let filter = this.value.toLowerCase(); // Get the input value and convert to lowercase
        let checkboxes = document.querySelectorAll('.form-check'); // Get all the checkbox containers

        checkboxes.forEach(function(checkbox) {
            let label = checkbox.querySelector('.form-check-label').textContent.toLowerCase(); // Get the label text and convert to lowercase
            if (label.indexOf(filter) > -1) {
                checkbox.style.display = ''; // Show the checkbox if the label contains the search text
            } else {
                checkbox.style.display = 'none'; // Hide the checkbox if the label does not match the search text
            }
        });
    });
</script>


@endsection
