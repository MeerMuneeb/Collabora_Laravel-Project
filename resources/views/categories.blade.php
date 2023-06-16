@extends('admin')
@section('adminContent')
    <main>
        
        <div class="container-fluid px-4">
            <h1 class="mt-4">Categories</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-table me-1"></i>
                        Categories List
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                        Add Category
                    </button>                    
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Image</th>
                                <th>Category Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Image</th>
                                <th>Category Name</th>
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
                                    <a href="#" class="btn btn-primary edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $Cdata->id }}" data-name="{{ $Cdata->name }}" data-image="{{ $Cdata->image }}">Edit</a>
                                    <form action="/deleteCategory" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" class="form-control" name="Cid" value="{{ $Cdata->id }}">
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
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/editCategory" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')                        
                        <input type="hidden" class="form-control" name="Cid" id="edit_category_id" required>
                        <div class="form-group">
                            <label for="category_name">Category Name:</label>
                            <input type="text" class="form-control" name="name" id="edit_category_name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image2_option">Image Source:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="image2_option" id="image2_option_file" value="file" checked>
                                <label class="form-check-label" for="image2_option_file">
                                    Choose File
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="image2_option" id="image2_option_url" value="url">
                                <label class="form-check-label" for="image2_option_url">
                                    Add Image URL
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="category_image">New Image:</label>
                            <div id="file2_input_container">
                                <input type="file" class="form-control-file" id="category_image" name="image" accept="image/*">
                            </div>
                            <div id="url2_input_container" style="display: none;">
                                <input type="text" class="form-control" id="category_image_url" name="image">
                            </div>
                        </div>
                        <br>
                        <small class="form-text text-muted">Original Image.</small>
                        <div style="width: 200px; height: 200px; background-size: cover; background-position: center; border-radius: 10px; " id="edit_category_image"></div>
                        <br>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Update</button>
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

        $(document).ready(function() {
            $('input[name="image2_option"]').change(function() {
                if ($(this).val() === 'file') {
                    $('#file2_input_container').show();
                    $('#url2_input_container').hide();
                } else {
                    $('#file2_input_container').hide();
                    $('#url2_input_container').show();
                }
            });
        });

        $(document).ready(function() {
        $('.edit-category').on('click', function() {
            var categoryID = $(this).data('id');
            var categoryName = $(this).data('name');
            var categoryImage = $(this).data('image');

            $('#edit_category_id').val(categoryID);
            $('#edit_category_name').val(categoryName);
            $('#edit_category_image').css('background-image', 'url(' + categoryImage + ')');

        });
        });
    </script>
@endsection