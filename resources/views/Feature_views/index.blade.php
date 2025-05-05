<!-- filepath: c:\Users\user\Desktop\laravel_wct\resources\views\Feature_views\index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feature Views</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Feature Views</h3>
                        <div>
                            <!-- Sorting Buttons -->
                            <a href="{{ route('Feature_views.index', ['order' => 'asc']) }}" 
                               class="btn btn-sm {{ request('order', 'asc') === 'asc' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-sort-down"></i> ASC
                            </a>
                            <a href="{{ route('Feature_views.index', ['order' => 'desc']) }}" 
                               class="btn btn-sm {{ request('order') === 'desc' ? 'btn-primary' : 'btn-outline-primary' }}">
                                <i class="bi bi-sort-up"></i> DESC
                            </a>
                            <!-- Create New Feature Button -->
                            <a href="{{ route('Feature_views.Create') }}" class="btn btn-primary ms-3">
                                <i class="bi bi-plus-circle me-1"></i> Create New Feature
                            </a>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Success Message -->
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Features Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($features as $feature)
                                        <tr>
                                            <td>{{ $feature->id }}</td>
                                            <td>{{ $feature->name }}</td>
                                            <td>
                                                @if($feature->image)
                                                    <img src="{{ asset('storage/' . $feature->image) }}" 
                                                         alt="{{ $feature->name }}" 
                                                         class="img-thumbnail"
                                                         style="max-height: 50px;">
                                                @else
                                                    <span class="text-muted">No image</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('Feature_views.Edit', ['feature' => $feature]) }}" 
                                                       class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <button type="button" 
                                                            class="btn btn-sm btn-danger" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#deleteModal{{ $feature->id }}">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal{{ $feature->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete "{{ $feature->name }}"?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form method="post" action="{{ route('Feature_views.destroy', ['feature' => $feature]) }}" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Features Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>