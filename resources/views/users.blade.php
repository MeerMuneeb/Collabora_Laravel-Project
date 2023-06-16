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
                                    <a href="#" class="btn btn-primary edit-user" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">Edit</a>
                                    {{-- <a href="{{ url('/deleteUser'.$user->id)}}" class="btn btn-danger" >Delete</a> --}}
                                    <form action="/deleteUser" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" class="form-control" name="Uid" value="{{ $user->id }}">
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
                            <label for="user_name">User Name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="user_email">User Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="user_pass">User Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <br>                        
                        <button type="submit" class="btn btn-success" style="width: 100%;">Add</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/editUser" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <input type="hidden" class="form-control" name="Uid" id="edit_user_id" required>

                        <div class="form-group">
                            <label for="user_name">User Name:</label>
                            <input type="text" class="form-control" name="name" id="edit_user_name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="user_email">User Email:</label>
                            <input type="email" class="form-control" name="email" id="edit_user_email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="user_pass">User Password: <small class="form-text text-muted">Leave Blank If No Change.</small></label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <br>                        
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Update</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Include necessary JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.edit-user').on('click', function() {
            var userName = $(this).data('name');
            var userEmail = $(this).data('email');
            var userId = $(this).data('id');

            $('#edit_user_name').val(userName);
            $('#edit_user_email').val(userEmail);
            $('#edit_user_id').val(userId);
        });
        });

    </script>
@endsection