@extends('admin.admin_master')
@section('admin_content')
<style>
    .ck-editor__editable {
        min-height: 200px; /* Adjust as needed */
        resize: both; /* Allows manual resizing */
        overflow: auto; /* Adds scrollbar for overflow */
    }
</style>
    <div class="midde_cont mt-4">


        <!-- row -->
        <div class="row">

            <!-- table section -->
            <div class="col-md-12">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="heading1 margin_0">
                                    <h2>All Courses</h2>

                                    <b>
                                        <p class="text-success">
                                            <?php
                                            $message = Session()->get('message');
                                            if ($message) {
                                                echo $message;
                                                Session()->put('message', null);
                                            }
                                            ?>
                                        </p>
                                    </b>
                                    <p class="alert-success">
                                        <?php
                                        $message = Session()->get('message');
                                        if ($message) {
                                            echo $message;
                                            Session()->put('message', null);
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="/create-course" class="btn btn-primary mt-2 mb-2">Add Course</a>
                            </div>
                        </div>

                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">

                            {{-- Search Functionality Add --}}
                            <form action="{{ route('courses') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="search_criteria">Course Name</label>
                                            <select class="form-control" name="course" id="search_criteria">
                                                <option value="" selected hidden>Select Course</option>
                                                @foreach ($course as $indivudual_course)
                                                    <option value="{{ $indivudual_course->id }}">
                                                        {{ $indivudual_course->title }}</option>
                                                @endforeach
                                                <!-- Add more options based on your needs -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="search_keyword">Keyword:</label>
                                            <input type="text" class="form-control" name="keyword" id="search_keyword">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        {{-- add Clear Button after searching Function once Complete --}}
                                        @if (Request('course') || Request('keyword'))
                                            <button type="button" onclick="window.location='/courses'"
                                                class="btn btn-danger">Clear</button>
                                        @endif
                                        {{-- add Clear Button after searching Function once Complete --}}
                                    </div>
                                </div>
                            </form>
                            {{-- End of Search Functionality --}}


                            <table class="table" style="border: 1px solid darkblue;">
                                <thead>
                                    <tr style="background: lightblue;" class="text-dark">
                                        <th style="border: 1px solid darkblue;">Sl No.</th>
                                        <th style="border: 1px solid darkblue;">Course Name</th>
                                        {{-- <th style="border: 1px solid darkblue;">Subtitle</th> --}}
                                        <th style="border: 1px solid darkblue;">Type</th>
                                        <th style="border: 1px solid darkblue;">Price</th>
                                        <th style="border: 1px solid darkblue;">Discount Price</th>
                                        <th style="border: 1px solid darkblue;">Tutor</th>
                                        {{-- <th style="border: 1px solid darkblue;">Duration</th> --}}
                                        {{-- <th style="border: 1px solid darkblue;">Tag</th> --}}
                                        {{-- <th style="border: 1px solid darkblue;">Short Description</th> --}}
                                        {{-- <th style="border: 1px solid darkblue;">Full Description</th> --}}
                                        {{-- <th style="border: 1px solid darkblue;">Image A</th> --}}
                                        {{-- <th style="border: 1px solid darkblue;">Image B</th> --}}
                                        <th style="border: 1px solid darkblue;">Status</th>
                                        <th style="border: 1px solid darkblue;" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($course as $courses)
                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid darkblue;">{{ $loop->index + 1 }}</td>
                                            <td style="border: 1px solid darkblue;">{{ $courses->title }}</td>
                                            {{-- <td style="border: 1px solid darkblue;">{{ Str::limit($courses->subtitle, 60) }} --}}
                                            </td>
                                            <td style="border: 1px solid darkblue;">{{ $courses->type }}</td>
                                            <td style="border: 1px solid darkblue;">{{ $courses->price }}</td>
                                            <td style="border: 1px solid darkblue;">{{ $courses->price_a }}</td>
                                            {{-- <td style="border: 1px solid darkblue;">{{ $courses->tutor }}</td> --}}
                                            <td style="border: 1px solid darkblue;">{{ $courses->duration }}</td>
                                            {{-- <td style="border: 1px solid darkblue;">{{ $courses->tag }}</td> --}}
                                            {{-- <td style="border: 1px solid darkblue;">{!! html_entity_decode(Str::limit($courses->short_desc, 60)) !!}</td> --}}
                                            {{-- <td style="border: 1px solid darkblue;">{!! html_entity_decode(Str::limit($courses->full_desc, 60)) !!}</td> --}}
                                            {{-- <td style="border: 1px solid darkblue;">
                                                @if ($courses->img_1)
                                                    <img src="{{ asset('/storage/' . $courses->img_1) }}"
                                                        style="width: 105px; height:105px;">
                                                @endif
                                            </td> --}}
                                            {{-- <td style="border: 1px solid darkblue;">
                                                @if ($courses->img_2)
                                                    <img src="{{ asset('/storage/' . $courses->img_2) }}"
                                                        style="width: 105px; height:105px;">
                                                @endif
                                            </td> --}}

                                            <td>
                                                @if ($courses->status == 1)
                                                    <span class="badge bg-primary text-white">Active</span>
                                                @else
                                                    <span class="badge bg-warning text-white">Not Active</span>
                                                @endif
                                            </td>


                                            <td style="border: 1px solid darkblue;">
                                                <div class="d-flex align-items-center">
                                                    <button type="button" title="Edit" class="btn btn-primary"
                                                        data-toggle="modal"
                                                        data-target="#courseUpdateModal{{ $courses->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <form style="padding-left:10px;"
                                                        action="{{ url('/course-delete/' . $courses->id) }}" method="post"
                                                        id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" title="Delete"
                                                            onclick="confirmDelete()">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>

                                                    {{-- @if ($courses->status == 1)
                                                        <a style="margin-left:10px;"
                                                            href="{{ url('/course-status' . $courses->id) }}"
                                                            class="btn btn-success">
                                                            <i class="fa fa-key"></i> Change Status
                                                        </a>
                                                    @else
                                                        <a style="margin-left:10px;"
                                                            href="{{ url('/course-status' . $courses->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-key"></i> Change Status
                                                        </a>
                                                    @endif --}}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <div class="modal modal-fullscreen-xl" id="courseUpdateModal{{ $courses->id }}"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog p-3" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Course</h5>
                                                    <button type="button" class="close text-danger" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/update-course/' . $courses->id) }}"
                                                        method="post" enctype="multipart/form-data"
                                                        id="courseUpdateForm{{ $courses->id }}">
                                                        @csrf
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Course Title/Name: <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="title" value="{{ $courses->title }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Course Subtitle:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="subtitle"
                                                                            value="{{ $courses->subtitle }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Type: <span
                                                                                class="text-danger">*</span></label>
                                                                        <select id="menu-dropdown" name="type"
                                                                            class="form-control" required>
                                                                            <option selected disabled>Select</option>
                                                                            <option value="diploma"
                                                                                {{ $courses->type == 'diploma' ? 'selected' : '' }}>
                                                                                Diploma</option>
                                                                            <option value="academic"
                                                                                {{ $courses->type == 'academic' ? 'selected' : '' }}>
                                                                                Academic</option>
                                                                            <option value="special"
                                                                                {{ $courses->type == 'special' ? 'selected' : '' }}>
                                                                                Special</option>
                                                                            <option value="undergraduate"
                                                                                {{ $courses->type == 'undergraduate' ? 'selected' : '' }}>
                                                                                Undergraduate</option>
                                                                            <option value="Postgraduate"
                                                                                {{ $courses->type == 'Postgraduate' ? 'selected' : '' }}>
                                                                                Postgraduate</option>
                                                                            <option value="professional"
                                                                                {{ $courses->type == 'professional' ? 'selected' : '' }}>
                                                                                Professional</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Price: <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            name="price" value="{{ $courses->price }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Discount Price:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="price_a"
                                                                            value="{{ $courses->price_a }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Allowed Number of Instalment</label>
                                                                        <input type="number" name="instalment_no"
                                                                            min="0"
                                                                            value="{{ $courses->instalment_no }}"
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Tutor:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="tutor" value="{{ $courses->tutor }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Duration:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="duration"
                                                                            value="{{ $courses->duration }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Tag:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="tag" value="{{ $courses->tag }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Status <span
                                                                                class="text-danger">*</span></label>
                                                                        <select name="status" class="form-control"
                                                                            required>
                                                                            <option value="1"
                                                                                {{ $courses->status == 1 ? 'selected' : '' }}>
                                                                                Active</option>
                                                                            <option value="0"
                                                                                {{ $courses->status == 0 ? 'selected' : '' }}>
                                                                                Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Short Description:</label>
                                                                        <textarea class="form-control ckeditor" name="short_desc">{{ $courses->short_desc }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Full Description:</label>
                                                                        <textarea class="form-control ckeditor2" name="full_desc">{{ $courses->full_desc }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label> Image A:</label>
                                                                        <input type="file" class="form-control"
                                                                            name="img_1"
                                                                            onchange="document.getElementById('1blah{{ $courses->id }}').src = window.URL.createObjectURL(this.files[0])">
                                                                        @if ($courses->img_1)
                                                                            <img id="1blah{{ $courses->id }}"
                                                                                alt="Image" width="100"
                                                                                height="100"
                                                                                src="{{ asset('/storage/' . $courses->img_1) }}" />
                                                                        @endif

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label> Image B:</label>
                                                                        <input type="file" class="form-control"
                                                                            name="img_2"
                                                                            onchange="document.getElementById('2blah{{ $courses->id }}').src = window.URL.createObjectURL(this.files[0])">
                                                                        @if ($courses->img_2)
                                                                            <img id="2blah{{ $courses->short_desc }}"
                                                                                alt="Image" width="100"
                                                                                src="{{ asset('/storage/' . $courses->img_2) }}"
                                                                                height="100" />
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary"
                                                        form="courseUpdateForm{{ $courses->id }}">
                                                        Save changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>

                            <b class="text-center">{{ $course->appends(request()->query())->links() }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    {{-- <script>
        ClassicEditor
            .create(document.querySelectorAll('.ckeditor', ))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this course?')) {
                document.getElementById('deleteForm').submit();
            } else {
                // Optionally, you can provide feedback to the user that the deletion was canceled.
                event.preventDefault();
            }
        }
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
