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

        <h4 class="text-muted">Raise Your Ticket</h4>
        <p class="alert-info text-center">
            <?php
            $message = Session()->get('message');
            if ($message) {
                echo $message;
                Session()->put('message', null);
            }
            ?>
        </p>
        <form action="{{ url('/tickets/') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Title<span class="text-danger">*</span></label>
                    <input name="title" type="text" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea class="form-control ckeditor" name="desc" id="" cols="30" rows="10"></textarea>
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


@endsection
