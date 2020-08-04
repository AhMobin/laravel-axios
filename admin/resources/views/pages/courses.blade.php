@extends('master.layout')
@section('title','Courses')

@section('content')


<div id="contentDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
            <button class="btn btn-danger btn-sm my-3" id="addNewCourseBtn" >Add New</button>
            <table id="courseDt" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Image</th>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">View</th>
                    <th class="th-sm">Edit</th>
                    <th class="th-sm">Delete</th>
                </tr>
                </thead>
                <tbody id="courseTable">

                {{--   course data fetched by axios.....--}}

                </tbody>
            </table>

        </div>
    </div>
</div>



<div id="loaderDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <img class="m-5" src="{{ asset('layout/images/loader.gif') }}" alt="">
        </div>
    </div>
</div>


<div id="wrongDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong!</h3>
        </div>
    </div>
</div>



<!-- Course View Modal -->
<div class="modal fade" id="courseViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Course Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="edit-body">

                <table class="table table-striped">
                    <tr>
                        <th width="35%" style="font-weight: bold">Course Thumbnail: </th>
                        <td><img id="viewCourseThumb" src="" alt="" width="100px"></td>
                    </tr>

                    <tr>
                        <th style="font-weight: bold">Course Title: </th>
                        <td id="viewCourseTitle"></td>
                    </tr>

                    <tr>
                        <th style="font-weight: bold">Course Details: </th>
                        <td id="viewCourseDetails"></td>
                    </tr>

                    <tr>
                        <th style="font-weight: bold">Course Fee: </th>
                        <td id="viewCourseFee"></td>
                    </tr>

                    <tr>
                        <th style="font-weight: bold">Total Classes: </th>
                        <td id="viewCourseTotalClass"></td>
                    </tr>

                    <tr>
                        <th style="font-weight: bold">Total Students: </th>
                        <td id="viewCourseEnroll"></td>
                    </tr>

                    <tr>
                        <th style="font-weight: bold">Course Link: </th>
                        <td id="viewCourseLink"></td>
                    </tr>
                </table>

            </div>

            <h5 id="viewWrong" class="text-center my-5 d-none">Something Went Wrong!</h5>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>






<!-- Course Insert Modal -->
<div class="modal fade" id="courseInsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="CourseTitle">Course Title</label>
                        <input type="text" id="newCourseTitle" class="form-control mb-4" placeholder="Course Title">

                        <label for="CourseDetails">Course Details</label>
                        <textarea id="newCourseDetails" class="form-control mb-4" placeholder="Service Description"></textarea>

                        <label for="CourseThumb">Course Thumbnail</label>
                        <input type="text" id="newCourseThumb" class="form-control mb-4" placeholder="Service Image Link">
                    </div>
                    <div class="col-md-6">
                        <label for="CourseFee">Course Fee</label>
                        <input type="text" id="newCourseFee" class="form-control mb-4" placeholder="Course Fee">

                        <label for="CourseEnroll">Course Enrolled</label>
                        <input type="text" id="newCourseEnroll" class="form-control mb-4" placeholder="Course Total Student">

                        <label for="totalClasses">Total Classes</label>
                        <input type="text" id="newCourseTotalClass" class="form-control mb-4" placeholder="Course Total Class">

                        <label for="CourseLink">Course Link</label>
                        <input type="text" id="newCourseLink" class="form-control mb-4" placeholder="Course Link">
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" id="newCourseInsert" class="btn btn-danger btn-sm">Add New</button>
            </div>
        </div>
    </div>
</div>


<!-- Course Edit Modal -->
<div class="modal fade" id="courseEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="edit-body">
                <span id="courseEditID" class="d-none"></span>
                <div class="row">
                    <div class="col-md-6">
                        <label for="CourseTitle">Course Title</label>
                        <input type="text" id="courseTitle" class="form-control mb-4" placeholder="Course Title">

                        <label for="CourseDetails">Course Details</label>
                        <textarea id="courseDetails" class="form-control mb-4" placeholder="Service Description"></textarea>

                        <label for="CourseThumb">Course Thumbnail</label>
                        <input type="text" id="courseThumb" class="form-control mb-4" placeholder="Service Image Link">
                    </div>
                    <div class="col-md-6">
                        <label for="CourseFee">Course Fee</label>
                        <input type="text" id="courseFee" class="form-control mb-4" placeholder="Course Fee">

                        <label for="CourseEnroll">Course Enrolled</label>
                        <input type="text" id="courseEnroll" class="form-control mb-4" placeholder="Course Total Student">

                        <label for="totalClasses">Total Classes</label>
                        <input type="text" id="courseTotalClass" class="form-control mb-4" placeholder="Course Total Class">

                        <label for="CourseLink">Course Link</label>
                        <input type="text" id="courseLink" class="form-control mb-4" placeholder="Course Link">
                    </div>
                </div>

            </div>

            <h5 id="editWrong" class="text-center my-5 d-none">Something Went Wrong!</h5>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmCourseUpdate" data-id="" class="btn btn-danger btn-sm">Update</button>
            </div>
        </div>
    </div>
</div>



<!-- Service Delete Modal -->
<div class="modal fade" id="courseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Are You Sure!! You Want To Delete This Course?</h5>
                <span id="courseDeleteID" class="d-none"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button type="button" id="confirmCourseDelete" data-id="" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        getCourses();

        $('#addNewCourseBtn').click(function () {
            $('#courseInsertModal').modal('show');
        });

        $('#newCourseInsert').click(function () {
            var title = $('#newCourseTitle').val();
            var desc = $('#newCourseDetails').val();
            var thumb = $('#newCourseThumb').val();
            var fee = $('#newCourseFee').val();
            var enroll = $('#newCourseEnroll').val();
            var classes = $('#newCourseTotalClass').val();
            var link = $('#newCourseLink').val();

            courseInsert(title, desc, thumb, fee, enroll, classes, link);

        });


        function getCourses() {
            axios.get('course-data')
                .then(function (response) {
                    if(response.status==200){
                        $('#loaderDiv').addClass('d-none');
                        $('#contentDiv').removeClass('d-none');


                        $('#courseDt').DataTable().destroy();
                        $('#courseTable').empty();

                        var courseData = response.data;

                        $.each(courseData, function (i, item) {
                            $('<tr>').html(
                                "<td class='th-sm'><img class='table-img' src="+ courseData[i].course_thumb +"></td>" +
                                "<td class='th-sm'>"+ courseData[i].course_title +"</td>" +
                                "<td class='th-sm'>"+ courseData[i].course_desc +"</td>" +
                                "<td class='th-sm'> <a class='courseView' data-id="+ courseData[i].id +"><i class='fas fa-eye'></i></a> </td>" +
                                "<td class='th-sm'> <a class='courseEdit' data-id="+ courseData[i].id +"><i class='fas fa-edit'></i></a> </td>" +
                                "<td class='th-sm'> <a class='courseDelete' data-id="+ courseData[i].id +"><i class='fas fa-trash-alt'></i></a> </td>"
                            ).appendTo('#courseTable');
                        });

                        //view course
                        $('.courseView').click(function () {
                            $('#courseViewModal').modal('show');
                            var id = $(this).data('id');
                            courseDetailsView(id);
                        });

                        //edit course
                        $('.courseEdit').click(function () {
                            var Id = $(this).data('id');
                            $('#courseEditModal').modal('show');
                            $('#courseEditID').html(Id);
                            courseDetails(Id);
                        });

                        //delete course
                        $('.courseDelete').click(function () {
                            $('#courseDeleteModal').modal('show');
                            var id = $(this).data('id');
                            $('#courseDeleteID').html(id);
                        });


                        $('#courseDt').DataTable();
                        $('.dataTables_length').addClass('bs-select');

                    }else{
                        $('#loaderDiv').addClass('d-none');
                        $('#wrongDiv').removeClass('d-none');
                    }

                })
                .catch(function (error) {
                    $('#loaderDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');
                })
        }


        $('#confirmCourseUpdate').click(function () {
            var id = $('#courseEditID').html();
            var title = $('#courseTitle').val();
            var details = $('#courseDetails').val();
            var thumb = $('#courseThumb').val();
            var fee = $('#courseFee').val();
            var enroll = $('#courseEnroll').val();
            var classes = $('#courseTotalClass').val();
            var link = $('#courseLink').val();

            courseUpdate(id, title, details, classes, enroll, link, thumb, fee);
        });


        $('#confirmCourseDelete').click(function () {
            var id = $('#courseDeleteID').html();
            courseDelete(id);
        });




        function courseInsert(courseTitle, courseDesc, courseThumb, courseFee, courseEnroll, courseClasses, courseLink) {

            if(courseTitle.length == 0){
                toastr.warning('Course Title Cannot Be Empty');
            }else if(courseDesc.length == 0){
                toastr.warning('Course Description Cannot Be Empty');
            }else if(courseClasses.length == 0){
                toastr.warning('Course Classes Cannot Be Empty');
            }else if(courseLink.length == 0){
                toastr.warning('Course Link Cannot Be Empty');
            }else if(courseEnroll.length == 0){
                toastr.warning('Course Enroll Number Cannot Be Empty');
            }else if(courseThumb.length == 0){
                toastr.warning('Course Thumb Cannot Be Empty');
            }else if(courseFee.length == 0){
                toastr.warning('Course Fee Cannot Be Empty');
            }else {
                $('#newCourseInsert').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                axios.post('course-added', {
                    courseTitle: courseTitle,
                    courseDesc: courseDesc,
                    courseFee: courseFee,
                    courseThumb: courseThumb,
                    studentEnroll: courseEnroll,
                    courseClass: courseClasses,
                    courseLink: courseLink,
                })
                    .then(function (response) {
                        $('#newCourseInsert').html('Add New');
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#courseInsertModal').modal('hide');
                                toastr.success('Course Insert Successful');
                                getCourses();
                            } else {
                                $('#courseInsertModal').modal('hide');
                                toastr.warning('Course Insert Fail');
                                getCourses();
                            }
                        }
                    })
                    .catch(function (error) {
                        $('#courseInsertModal').modal('hide');
                        toastr.error('Something Went Wrong');
                        getCourses();
                    })
            }
        }




        function courseDetailsView(Id) {
            axios.post('course-details',{id:Id})
                .then(function (response) {
                    if(response.status==200){
                        var Data = response.data;

                        $('#viewCourseTitle').html(Data.course_title);
                        $('#viewCourseDetails').html(Data.course_desc);
                        $('#viewCourseEnroll').html(Data.total_enroll);
                        $('#viewCourseTotalClass').html(Data.total_class);
                        $('#viewCourseFee').html(Data.course_fee);
                        $('#viewCourseLink').html(Data.course_link);
                        $('#viewCourseThumb').attr('src',Data.course_thumb);
                    }else{
                        $('#viewWrong').removeClass('d-none');
                        $('#edit-body').addClass('d-none');
                    }
                })
                .catch(function (error) {
                    $('#editWrong').removeClass('d-none');
                    $('#edit-body').addClass('d-none');
                })
        }


        function courseDetails(courseId) {
            axios.post('course-details',{id:courseId})
                .then(function (response) {
                    if(response.status==200){
                        var courseData = response.data;

                        $('#courseTitle').val(courseData.course_title);
                        $('#courseDetails').val(courseData.course_desc);
                        $('#courseEnroll').val(courseData.total_enroll);
                        $('#courseTotalClass').val(courseData.total_class);
                        $('#courseFee').val(courseData.course_fee);
                        $('#courseLink').val(courseData.course_link);
                        $('#courseThumb').val(courseData.course_thumb);
                    }else{
                        $('#editWrong').removeClass('d-none');
                        $('#edit-body').addClass('d-none');
                    }
                })
                .catch(function (error) {
                    $('#editWrong').removeClass('d-none');
                    $('#edit-body').addClass('d-none');
                })
        }


        //course update........
        function courseUpdate(id, title, desc, classes, enroll, link, thumb, fee) {
            if(id == 0){
                toastr.error('Course ID Cannot Be Zero');
            }else if(title.length == 0){
                toastr.warning('Course Title Cannot Be Empty');
            }else if(desc.length == 0){
                toastr.warning('Course Description Cannot Be Empty');
            }else if(classes.length == 0){
                toastr.warning('Course Classes Cannot Be Empty');
            }else if(link.length == 0){
                toastr.warning('Course Link Cannot Be Empty');
            }else if(enroll.length == 0){
                toastr.warning('Course Enroll Number Cannot Be Empty');
            }else if(thumb.length == 0){
                toastr.warning('Course Thumb Cannot Be Empty');
            }else if(fee.length == 0){
                toastr.warning('Course Fee Cannot Be Empty');
            }else{

                $('#confirmCourseUpdate').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
                axios.post('course-update',{
                    id: id,
                    courseTitle: title,
                    courseDesc: desc,
                    courseClass: classes,
                    studentEnroll: enroll,
                    courseLink: link,
                    courseThumb: thumb,
                    courseFee: fee,
                })
                    .then(function (response) {
                        $('#confirmCourseUpdate').html('Update');
                        if(response.status==200){
                            if(response.data == 1){
                                $('#courseEditModal').modal('hide');
                                toastr.success('Course Updated Successful');
                                getCourses();
                            }else{
                                $('#courseEditModal').modal('hide');
                                toastr.warning('Course Update Fail');
                                getCourses();
                            }
                        }
                    })
                    .catch(function (error) {
                        $('#courseEditModal').modal('hide');
                        toastr.warning('Course Update Fail');
                        getCourses();
                    })
            }
        }



        function courseDelete(courseId) {
            $('#confirmCourseDelete').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
            axios.post('course-delete',{id:courseId})
                .then(function (response) {
                    $('#confirmCourseDelete').html('Yes');
                    if(response.status == 200){
                        if(response.data == 1){
                            $('#courseDeleteModal').modal('hide');
                            toastr.success('Course Removed');
                            getCourses();
                        }else{
                            $('#courseDeleteModal').modal('hide');
                            toastr.warning('Course Remove Failed');
                            getCourses();
                        }
                    }
                })
                .catch(function (error) {
                    $('#courseDeleteModal').modal('hide');
                    toastr.error('Something Went Wrong');
                    getCourses();
                })
        }

    </script>
@endsection
