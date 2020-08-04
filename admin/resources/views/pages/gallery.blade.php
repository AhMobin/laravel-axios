@extends('master.layout')
@section('title','Photo Gallery')

@section('content')


    <div id="contentDiv" class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <button class="btn btn-danger btn-sm my-3" id="addNewPhotoBtn" >Add New</button>
{{--                <table id="projectDt" class="table table-striped table-bordered" cellspacing="0" width="100%">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th class="th-sm">Project Title</th>--}}
{{--                        <th class="th-sm">Description</th>--}}
{{--                        <th class="th-sm">Thumbnail</th>--}}
{{--                        <th class="th-sm">Edit</th>--}}
{{--                        <th class="th-sm">Delete</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody id="projectTable">--}}

{{--                    --}}{{--   project data fetched by axios.....--}}

{{--                    </tbody>--}}
{{--                </table>--}}

            </div>
        </div>
    </div>



{{--    <div id="loaderDiv" class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 text-center p-5">--}}
{{--                <img class="m-5" src="{{ asset('layout/images/loader.gif') }}" alt="">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div id="wrongDiv" class="container d-none">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12 text-center p-5">--}}
{{--                <h3>Something Went Wrong!</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




    <!-- Course Insert Modal -->
    <div class="modal fade" id="photoInsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="file" id="newPhoto" class="form-control mb-4" placeholder="Choose Image">

                    <img id="imgPreview" src="{{ url('layout/images/default.jpg') }}" alt="" class="imgPreview">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="newProjectInsert" class="btn btn-danger btn-sm">Add New</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Course Edit Modal -->
    <div class="modal fade" id="projectEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="projectBody">
                    <span id="projectEditID" class=""></span>

                    <label for="projectTitle">Project Title</label>
                    <input type="text" id="projectTitleEdit" class="form-control mb-4" placeholder="Project Title">

                    <label for="CourseDetails">Project Details</label>
                    <textarea id="projectDetailsEdit" class="form-control mb-4" placeholder="Project Description"></textarea>

                    <label for="projectThumb">Project Thumbnail</label>
                    <input type="text" id="projectThumbEdit" class="form-control mb-4" placeholder="Project Image Link">

                    <label for="projectLink">Course Link</label>
                    <input type="text" id="projectLinkEdit" class="form-control mb-4" placeholder="Project Link">
                </div>

                <h5 id="projectWrong" class="text-center my-5 d-none">Something Went Wrong!</h5>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="confirmProjectUpdate" class="btn btn-danger btn-sm">Update</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Service Delete Modal -->
    <div class="modal fade" id="projectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-3 text-center">
                    <h5 class="mt-4">Are You Sure!! You Want To Delete This Project?</h5>
                    <span id="projectDeleteID" class="d-none"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button type="button" id="confirmProjectDelete" data-id="" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')

    <script>
        $('#addNewPhotoBtn').click(function () {
            $('#photoInsertModal').modal('show');
        });
    </script>

@endsection
