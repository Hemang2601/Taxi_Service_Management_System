@extends('admin.layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3"><i class="fas fa-route"></i> Manage Routes</h2>
    <p>Efficiently manage all taxi service routes by adding, editing, and removing them.</p>

    <!-- Add New Route Button -->
    <button class="btn btn-dark text-warning mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-plus"></i> Add New Route
    </button>

    <!-- Routes Table -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="bg-dark text-white">
                <tr>
                    <th>#</th>
                    <th>Route Name</th>
                    <th>Start Location</th>
                    <th>End Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $route->route_name }}</td>
                    <td>{{ $route->start_location }}</td>
                    <td>{{ $route->end_location }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning edit-btn"
                            data-id="{{ $route->id }}"
                            data-name="{{ $route->route_name }}"
                            data-start="{{ $route->start_location }}"
                            data-end="{{ $route->end_location }}">
                            <i class="fas fa-edit"></i> Edit
                        </button>

                        <form action="{{ route('admin.routes.destroy', $route->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Route Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.routes.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-dark text-warning">
                    <h5 class="modal-title" id="addModalLabel"><i class="fas fa-plus"></i> Add New Route</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label><i class="fas fa-road"></i> Route Name</label>
                        <input type="text" name="route_name" class="form-control" placeholder="Enter route name" required>
                    </div>
                    <div class="mb-3">
                        <label><i class="fas fa-map-marker-alt"></i> Start Location</label>
                        <input type="text" name="start_location" class="form-control" placeholder="Enter start location" required>
                    </div>
                    <div class="mb-3">
                        <label><i class="fas fa-flag-checkered"></i> End Location</label>
                        <input type="text" name="end_location" class="form-control" placeholder="Enter end location" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning text-dark"><i class="fas fa-save"></i> Save Route</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Route Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Edit Route</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="route_id" id="edit-route-id">
                    <div class="mb-3">
                        <label><i class="fas fa-road"></i> Route Name</label>
                        <input type="text" name="route_name" id="edit-route-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label><i class="fas fa-map-marker-alt"></i> Start Location</label>
                        <input type="text" name="start_location" id="edit-start-location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label><i class="fas fa-flag-checkered"></i> End Location</label>
                        <input type="text" name="end_location" id="edit-end-location" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-warning"><i class="fas fa-save"></i> Update Route</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let name = this.getAttribute('data-name');
            let start = this.getAttribute('data-start');
            let end = this.getAttribute('data-end');

            document.getElementById('edit-route-id').value = id;
            document.getElementById('edit-route-name').value = name;
            document.getElementById('edit-start-location').value = start;
            document.getElementById('edit-end-location').value = end;

            document.getElementById('editForm').setAttribute('action', '/admin/routes/update/' + id);

            new bootstrap.Modal(document.getElementById('editModal')).show();
        });
    });
</script>
@endsection
