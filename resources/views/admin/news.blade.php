@extends('Layout.admindash')
@section('dashboard')

<div class="row">
    <div class="col-12">
        <h1>News Section</h1>

        <div class="top-right-button-container">
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createNewsModal">
                Create
            </button>
            <div class="btn-group">
                <button class="btn btn-outline-primary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    EXPORT
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" id="dataTablesCopy" href="#">Copy</a>
                    <a class="dropdown-item" id="dataTablesExcel" href="#">Excel</a>
                    <a class="dropdown-item" id="dataTablesCsv" href="#">Csv</a>
                    <a class="dropdown-item" id="dataTablesPdf" href="#">Pdf</a>
                </div>
            </div>
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
                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        10
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">5</a>
                        <a class="dropdown-item active" href="#">10</a>
                        <a class="dropdown-item" href="#">20</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4 data-table-rows data-tables-hide-filter">
        <table id="datatableRows" class="data-table responsive nowrap">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Link</th> <!-- Added column for Link -->
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
                        <p class="text-muted">{{ $item->category }}</p>
                    </td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="News Image" style="max-width: 50px;">
                        @else
                            <p>No Image</p>
                        @endif
                    </td>
                    <td>
                        @if($item->link)
                            <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
                        @else
                            <p>No Link</p>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editNewsModal{{ $item->id }}">
                            Edit
                        </button>
                        <form action="{{ route('news.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal for each news item -->
                <div class="modal fade" id="editNewsModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit News</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('news.update', $item) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $item->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" class="form-control" name="subtitle" value="{{ $item->subtitle }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" class="form-control" name="category" value="{{ $item->category }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Link</label> <!-- Added Link Input -->
                                        <input type="url" class="form-control" name="link" value="{{ $item->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <small class="form-text text-muted">Leave empty to keep current image</small>
                                        @if($item->image)
                                            <img src="{{ Storage::url('public/news/' . $item->image) }}" alt="News Image" style="max-width: 100px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="form-group">
                        <label>Link</label> <!-- Added Link Input -->
                        <input type="url" class="form-control" name="link">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" required>
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

@endsection
