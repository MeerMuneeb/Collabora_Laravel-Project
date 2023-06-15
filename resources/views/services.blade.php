@extends('admin')
@section('adminContent')
    <main>
        
        <div class="container-fluid px-4">
            <h1 class="mt-4">Services</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Services List
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                        Add Service
                    </button>                    
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Service ID</th>
                                <th>Service Image</th>
                                <th>Service Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Service Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Service ID</th>
                                <th>Service Image</th>
                                <th>Service Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Service Price</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                        @foreach ($category as $Cdata)
                            <tr>
                                <td>{{ $Cdata->id }}</td>
                                <td>
                                    <div style="width: 200px; height: 200px; background-image: url('{{ $Cdata->image }}'); background-size: cover; background-position: center;"></div>
                                </td>
                                <td>{{ $Cdata->name }}</td>
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
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addCategory" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name:</label>
                            <input type="text" class="form-control" id="category_name" name="name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image_option">Image Source:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="image_option" id="image_option_file" value="file" checked>
                                <label class="form-check-label" for="image_option_file">
                                    Choose File
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="image_option" id="image_option_url" value="url">
                                <label class="form-check-label" for="image_option_url">
                                    Add Image URL
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category_image">Category Image:</label>
                            <div id="file_input_container">
                                <input type="file" class="form-control-file" id="category_image" name="image" accept="image/*">
                            </div>
                            <div id="url_input_container" style="display: none;">
                                <input type="text" class="form-control" id="category_image_url" name="image">
                            </div>
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
    <script>
        $(document).ready(function() {
            $('input[name="image_option"]').change(function() {
                if ($(this).val() === 'file') {
                    $('#file_input_container').show();
                    $('#url_input_container').hide();
                } else {
                    $('#file_input_container').hide();
                    $('#url_input_container').show();
                }
            });
        });
    </script>
@endsection