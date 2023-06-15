@extends('admin')
@section('adminContent')
    <main>
        
        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Users List
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                        Add User
                    </button>                    
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Joined At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Joined At</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <form action="#" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addUser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">User Name:</label>
                            <input type="text" class="form-control" id="category_name" name="name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category_name">User Email:</label>
                            <input type="text" class="form-control" id="category_name" name="email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category_name">User Password:</label>
                            <input type="text" class="form-control" id="category_name" name="password" required>
                        </div>
                        <br>                        
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Include necessary JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection