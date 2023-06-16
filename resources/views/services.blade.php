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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
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
                        @foreach ($service as $Sdata)
                            <tr>
                                <td>{{ $Sdata->id }}</td>
                                <td>
                                    <div style="width: 200px; height: 200px; background-image: url('{{ $Sdata->picture }}'); background-size: cover; background-position: center;"></div>
                                </td>
                                <td>{{ $Sdata->name }}</td>
                                <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $Sdata->category)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach    
                                </td>
                                <td>
                                    <div style="max-width: 400px">
                                        {{ $Sdata->description }}
                                    </div>
                                </td>
                                <td>{{ $Sdata->price }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary edit-service" data-toggle="modal" data-target="#editServiceModal" 
                                        data-id="{{ $Sdata->id }}"
                                        data-name="{{ $Sdata->name }}"
                                        data-category="{{ $Sdata->category }}"
                                        data-picture="{{ $Sdata->picture }}"
                                        data-price="{{ $Sdata->price }}"
                                        data-description="{{ $Sdata->description }}">Edit</a>
                                    {{-- <a href="{{ url('/deleteUser'.$user->id)}}" class="btn btn-danger" >Delete</a> --}}
                                    <form action="/deleteService" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" class="form-control" name="Sid" value="{{ $Sdata->id }}">
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
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addService" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="service_name">Service Title:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div><br>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" rows="4" maxlength="300" style="width: 100%;" required></textarea>
                        </div><br>
                        <div class="form-group">
                            <label for="category_name">Category:</label>
                            <select id="category" name="category" required>
                                <option value="" selected disabled>Select an option</option> 
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" min="0" required>
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
                            <label for="category_image">Image:</label>
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
    <div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Edit Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/editService" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')                        
                        <input type="hidden" class="form-control" name="Sid" id="edit_service_id" required>
                        <div class="form-group">
                            <label for="service_name">Service Title:</label>
                            <input type="text" class="form-control" name="name" id="edit_service_name" required>
                        </div><br>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" rows="4" maxlength="300" style="width: 100%;" id="edit_service_description" required></textarea>
                        </div><br>
                        <div class="form-group">
                            <label for="category_name">Category:</label>
                            <select id="category" name="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" min="0" id="edit_service_price" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image_option">Image Source:</label>
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
                                <input type="file" class="form-control-file" id="service_image" name="image" accept="image/*">
                            </div>
                            <div id="url2_input_container" style="display: none;">
                                <input type="text" class="form-control" id="service_image_url" name="image">
                            </div>
                        </div>
                        <br>
                        <small class="form-text text-muted">Original Image.</small>
                        <div style="width: 200px; height: 200px; background-size: cover; background-position: center; border-radius: 10px; " id="edit_service_picture"></div>
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
        $('.edit-service').on('click', function() {
            var serviceName = $(this).data('name');
            var serviceDescription = $(this).data('description');
            var serviceId = $(this).data('id');
            var serviceCategory = $(this).data('category');
            var servicePicture = $(this).data('picture');
            var servicePrice = $(this).data('price');

            $('#edit_service_name').val(serviceName);
            $('#edit_service_description').val(serviceDescription);
            $('#edit_service_id').val(serviceId);
            $('#edit_service_price').val(servicePrice);
            $('#edit_service_picture').css('background-image', 'url(' + servicePicture + ')');
            $('#category option[value="' + serviceCategory + '"]').prop('selected', true);

        });
        });

    </script>
    
@endsection