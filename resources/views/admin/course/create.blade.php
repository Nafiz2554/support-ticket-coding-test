@extends('admin.admin_master')
@section('admin_content')
<style>
    .ck-editor__editable {
        min-height: 200px; /* Adjust as needed */
        resize: both; /* Allows manual resizing */
        overflow: auto; /* Adds scrollbar for overflow */
    }
</style>


    <div class="container mt-4">

        <h4 class="text-muted">Create Your Course</h4>
        <p class="alert-info text-center">
            <?php
            $message = Session()->get('message');
            if ($message) {
                echo $message;
                Session()->put('message', null);
            }
            ?>
        </p>
        <form action="{{ url('/course-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label>Course Name <span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Subtitle</label>
                    <input name="subtitle" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Course Type</label>
                    <select id="menu-dropdown" name="type" class="form-control" required>
                        <option selected disabled> Select</option>
                        <option value="diploma">Diploma</option>
                        <option value="academic">Academic</option>
                        <option value="special">Special</option>
                        <option value="undergraduate">Undergraduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                        <option value="professional">Professional</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Price <span class="text-danger">*</span></label>
                    <input type="text" name="price" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Price After Discount</label>
                    <input type="text" name="price_a" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Allowed Number of Instalment</label>
                    <input type="number" name="instalment_no" min="0" value="0" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Tutor Name</label>
                    <input type="text" name="tutor" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Duration</label>
                    <input type="text" name="duration" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Tag</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Short Description</label>
                    <textarea name="short_desc" class="ckeditor"></textarea>
                </div>

                <div class="form-group col-md-6">
                    <label>Full Description</label>
                    <textarea name="full_desc" class="ckeditor2"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Image A</label>
                    <input type="file" name="img_1" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Image B</label>
                    <input type="file" name="img_2" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">SAVE</button>
        </form>
    </div>

    {{-- <script>
        ClassicEditor
            .create(document.querySelectorAll('.ckeditor', ))
            .catch(error => {
                console.error(error);
            });
    </script> --}}
    {{-- <script>
        CKEDITOR.replaceAll('ckeditor');
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('.ckeditor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('.ckeditor2'))
            .catch(error => {
                console.error(error);
            });
    });
</script>


@endsection
