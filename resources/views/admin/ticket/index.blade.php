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
                                    <h2>All Ticket</h2>

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
                                <a href="/create-ticket" class="btn btn-primary mt-2 mb-2">Add Ticket</a>
                            </div>
                        </div>

                    </div>
                    <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm"> 

                            <table class="table" style="border: 1px solid darkblue;">
                                <thead>
                                    <tr style="background: lightblue;" class="text-dark">
                                        <th style="border: 1px solid darkblue;">Sl No.</th>
                                        <th style="border: 1px solid darkblue;">Ticket Title</th> 
                                        <th style="border: 1px solid darkblue;">Description</th>  
                                        <th style="border: 1px solid darkblue;">Status</th>
                                        <th style="border: 1px solid darkblue;" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                @foreach ($tickets as $ticket)
                                    <tbody>
                                        <tr>
                                            <td style="border: 1px solid darkblue;">{{ $loop->index + 1 }}</td>
                                            <td style="border: 1px solid darkblue;">{{ $ticket->title }}</td>
                                            <td style="border: 1px solid darkblue;">{!! html_entity_decode(Str::limit($ticket->desc, 60)) !!}
                                            </td> 
                                            <td>
                                                @if ($ticket->status == 1)
                                                    <span class="badge bg-primary text-white">Active</span>
                                                @else
                                                    <span class="badge bg-warning text-white">Closed</span>
                                                @endif
                                            </td>


                                            <td style="border: 1px solid darkblue;">
                                                <div class="d-flex align-items-center"> 

                                                    <form style="padding-left:10px;"
                                                        action="{{ url('/ticket-delete/' . $ticket->id) }}" method="post"
                                                        id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" title="Delete"
                                                            onclick="confirmDelete()">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    @if ($ticket->status == 1)
                                                        <a style="margin-left:10px;"
                                                            href="{{ url('/ticket-status' . $ticket->id) }}"
                                                            class="btn btn-success">
                                                            <i class="fa fa-key"></i> Change Status
                                                        </a>
                                                    @else
                                                        <a style="margin-left:10px;"
                                                            href="{{ url('/ticket-status' . $ticket->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fa fa-key"></i> Change Status
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                     
                                @endforeach
                            </table>
                            <b class="text-center">{{ $tickets->appends(request()->query())->links() }}</b>
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
