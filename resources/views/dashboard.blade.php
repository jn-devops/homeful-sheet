<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluation Sheet') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
    @php
        $isEdit = isset($editDocument);
    @endphp

<form id="evaluationForm" 
      action="{{ $isEdit ? route('documents.update', $editDocument->id) : route('create-document') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <h3 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">
    {{ $isEdit ? 'Edit ' . $editDocument->name : 'Upload Evaluation Sheet' }}
</h3>
 @if(session('success'))
    <div class="alert alert-success">
    {{ session('success') }}
    <button type="button" class="btn btn-close fs-6" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('warning') }}
    <button type="button" class="btn btn-close fs-6" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="Name" class="form-control" value="{{ $isEdit ? $editDocument->name : '' }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Project</label>
        <select name="Code" class="form-select" required>
            @foreach($projects as $project)
                <option value="{{ $project['code'] }}" 
                    {{ $isEdit && $editDocument->code === $project['code'] ? 'selected' : '' }}>
                    {{ $project['name'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload</label>
        <input type="file" name="excel_file" class="form-control" {{ $isEdit ? '' : 'required' }}>
    </div>

    <div class="mt-4">
        <button id="submitBtn" class="btn btn-success" type="submit">
            <span id="submitText">{{ $isEdit ? 'Update' : 'Add' }}</span>
            <span id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
        </button>
        @if($isEdit)
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mr-3">Cancel Edit</a>
@endif
    </div>
</form>
            </div>

            <div class="col-md-8">
                <h3 class="mb-4 font-semibold text-xl text-gray-800 leading-tight">All Evaluation Documents</h3>
                <table class="table table-bordered table-striped">
                <thead class="thead-dark">
    <tr>
        <th hidden>ID</th>
        <th>Name</th>
        <th>Project Code</th>
        <th>File</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
</thead>g

<tbody>
    @forelse($documents as $doc)
        <tr>
            <td hidden>{{ $doc->id }}</td>
            <td>{{ $doc->name }}</td>
            <td>{{ $doc->code }}</td>
            <td><a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">View File</a></td>
            <td>{{ $doc->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('documents.edit', $doc->id) }}" class="btn btn-sm btn-primary">Edit</a>

                <form action="{{ route('documents.destroy', $doc->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this document?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">No documents found.</td>
        </tr>
    @endforelse
</tbody>

                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
</x-app-layout>
