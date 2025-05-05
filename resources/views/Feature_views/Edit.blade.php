<!-- filepath: c:\Users\user\Desktop\laravel_wct\resources\views\Feature_views\Edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Feature</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Edit Feature</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Edit Form -->
                        <form method="POST" action="{{ route('Feature_views.update', ['feature' => $feature->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $feature->name }}" required>
                            </div>

                            <!-- Image Field -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                @if($feature->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $feature->image) }}" alt="Current image" class="img-thumbnail" style="max-height: 200px;">
                                        <p class="text-muted small">Current image</p>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                <small class="text-muted">Leave empty to keep the current image</small>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update Feature</button>
                                <a href="{{ route('Feature_views.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>