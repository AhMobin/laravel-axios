@extends('master.layout')
@section('title','Projects')

@section('content')


    <div id="contentDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5">
                <button class="btn btn-danger btn-sm my-3" id="addNewProjectBtn" >Add New</button>
                <table id="projectDt" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Project Title</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Thumbnail</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="projectTable">

                    {{--   project data fetched by axios.....--}}

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




    <!-- Course Insert Modal -->
    <div class="modal fade" id="projectInsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="text" id="newProjectTitle" class="form-control mb-4" placeholder="Project Title">

                    <textarea id="newProjectDetails" class="form-control mb-4" placeholder="Project Description"></textarea>

                    <input type="text" id="newProjectLink" class="form-control mb-4" placeholder="Project Link">

                    <input type="text" id="newProjectThumbLink" class="form-control mb-4" placeholder="Project Thumb Link">

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
        getProjects();


        function getProjects() {
            axios.get('project-data')
                .then(function (response) {

                    if(response.status == 200){

                        $('#loaderDiv').addClass('d-none');
                        $('#contentDiv').removeClass('d-none');

                        $('#projectDt').DataTable().destroy();
                        $('#projectTable').empty();

                        var projectData = response.data;

                        $.each(projectData, function (i) {
                            $('<tr>').html(

                                "<td class='th-sm'>"+ projectData[i].project_name +"</td>" +
                                "<td class='th-sm'>"+ projectData[i].project_desc +"</td>" +
                                "<td class='th-sm'><img class='table-img' src="+ projectData[i].project_thumb +"></td>" +
                                "<td class='th-sm'><a class='projectEdit' data-id="+ projectData[i].id +"><i class='fas fa-edit'></i></a></td>" +
                                "<td class='th-sm'><a class='projectDelete' data-id="+ projectData[i].id +"><i class='fas fa-trash-alt'></i></a></td>"

                            ).appendTo('#projectTable');
                        });



                        //open project edit modal
                        $('.projectEdit').click(function () {
                            var Id = $(this).data('id');
                            $('#projectEditModal').modal('show');
                            $('#projectEditID').html(Id);
                            projectDetails(Id);
                        });



                        //open project delete modal
                        $('.projectDelete').click(function () {
                            $('#projectDeleteModal').modal('show');
                            var id = $(this).data('id');
                            $('#projectDeleteID').html(id);
                        });



                        $('#projectDt').DataTable({'order':false});
                        $('.dataTables_length').addClass('bs-select');
                    }else{
                        $('#loaderDiv').addClass('d-none');
                        $('#wrongDiv').removeClass('d-none');
                    }

                })
                .catch(function (error) {
                    $('#loaderDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');
                });
        }

        //open project add new model
        $('#addNewProjectBtn').click(function () {
            $('#projectInsertModal').modal('show');
        });


        //Add New Button Click For Adding New Project
        $('#newProjectInsert').click(function () {
            var name = $('#newProjectTitle').val();
            var desc = $('#newProjectDetails').val();
            var link = $('#newProjectLink').val();
            var thumb = $('#newProjectThumbLink').val();
            newProjectAdd(name, desc, link, thumb);
        });


        function newProjectAdd(Title, Desc, Link, Thumb) {

            if(Title.length == 0){
                toastr.warning('Project Title Cannot Be Empty');
            }else if(Desc.length == 0){
                toastr.warning('Project Details Cannot Be Empty');
            }else if(Link.length == 0){
                toastr.warning('Project Thumbnail Cannot Be Empty');
            }else if(Thumb.length == 0){
                toastr.warning('Project Link Cannot Be Empty');
            }else {
                $('#newProjectInsert').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                axios.post('project-added', {
                    projectName: Title,
                    projectDesc: Desc,
                    projectThumb: Thumb,
                    projectLink: Link,
                })
                    .then(function (response) {
                        $('#newProjectInsert').html("Add New");
                        if (response.status == 200) {
                            $('#projectInsertModal').modal('hide');
                            toastr.success('Project Added Successfully');
                            getProjects();
                        } else {
                            $('#projectInsertModal').modal('hide');
                            toastr.warning('Project Added Failed');
                            getProjects();
                        }
                    })
                    .catch(function (error) {
                        $('#projectInsertModal').modal('hide');
                        toastr.error('Something Went Wrong');
                        getProjects();
                    })
            }
        }



        //edit project details - view project details data

        function projectDetails(projectId) {

            axios.post('project-details',{id:projectId})
                .then(function (response) {
                    if(response.status == 200){

                        var projectData = response.data;

                        $('#projectTitleEdit').val(projectData.project_name);
                        $('#projectDetailsEdit').val(projectData.project_desc);
                        $('#projectThumbEdit').val(projectData.project_thumb);
                        $('#projectLinkEdit').val(projectData.project_link);

                    }else{
                        $('#projectWrong').removeClass('d-none');
                        $('#projectBody').addClass('d-none');
                    }

                })
                .catch(function () {
                    $('#projectWrong').removeClass('d-none');
                    $('#projectBody').addClass('d-none');
                })
        }

        //update project details by clicking UPDATE button
        $('#confirmProjectUpdate').click(function () {
            var Id = $('#projectEditID').html();
            var title = $('#projectTitleEdit').val();
            var desc = $('#projectDetailsEdit').val();
            var thumb = $('#projectThumbEdit').val();
            var link = $('#projectLinkEdit').val();
            projectUpdate(Id, title, desc, thumb, link)
        });


        //update project details.....
        function projectUpdate(projectId, projectTitle, projectDesc, projectThumb, projectLink){

            if(projectId == 0){
                toastr.error('Something Went Wrong');
            }else if(projectTitle.length == 0){
                toastr.warning('Project Title Cannot Be Empty');
            }else if(projectDesc.length == 0){
                toastr.warning('Project Details Cannot Be Empty');
            }else if(projectThumb.length == 0){
                toastr.warning('Project Thumbnail Cannot Be Empty');
            }else if(projectLink.length == 0){
                toastr.warning('Project Link Cannot Be Empty');
            }else{
                $('#confirmProjectUpdate').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                axios.post('project-updated',{
                    id:projectId,
                    Title: projectTitle,
                    Desc: projectDesc,
                    Thumb: projectThumb,
                    Link: projectLink,
                })
                    .then(function (response) {
                        $('#confirmProjectUpdate').html("Update");
                        if(response.status == 200){
                            if(response.data == 1){
                                $('#projectEditModal').modal('hide');
                                toastr.success('Project Updated');
                                getProjects();
                            }
                        }else{
                            $('#projectEditModal').modal('hide');
                            toastr.warning('Project Update Failed');
                            getProjects();
                        }
                    })
                    .catch(function (error) {
                        $('#projectEditModal').modal('hide');
                        toastr.error('Something Went Wrong');
                        getProjects();
                    });
            }
        }





        //remove project by clicking YES
        $('#confirmProjectDelete').click(function () {
            var id = $('#projectDeleteID').html();
            removeProject(id);
        });

        function removeProject(Id) {
            $('#confirmProjectDelete').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
            axios.post('project-removed',{id:Id})
                .then(function (response) {
                    $('#confirmProjectDelete').html("Yes");
                    if(response.status == 200){
                        if(response.data == 1){
                            $('#projectDeleteModal').modal('hide');
                            toastr.success('Project Removed');
                            getProjects();
                        }else{
                            $('#projectDeleteModal').modal('hide');
                            toastr.warning('Project Remove Failed');
                            getProjects();
                        }
                    }
                })
                .catch(function (error) {
                    $('#projectDeleteModal').modal('hide');
                    toastr.error('Something Went Wrong');
                    getProjects();
                })
        }

    </script>
@endsection
