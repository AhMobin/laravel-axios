@extends('master.layout')
@section('title','Services')

@section('content')


<div id="contentDiv" class="container d-none">
<div class="row">
<div class="col-md-12 p-5">
    <button class="btn btn-danger btn-sm my-3" id="addNewServiceBtn" >Add New</button>
<table id="serviceDt" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Image</th>
	  <th class="th-sm">Name</th>
	  <th class="th-sm">Description</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="serviceTable">

{{--   services data fetched by axios.....--}}

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




<!-- Service Add Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body" id="edit-body">
                <h5 class="modal-title text-center mb-4" id="exampleModalLabel">Add New Service</h5>

                <input type="text" id="addServiceName" class="form-control mb-4" placeholder="Service Name">
                <textarea id="addServiceDetails" class="form-control mb-4" placeholder="Service Description"></textarea>
                <input type="text" id="addServiceImage" class="form-control mb-4" placeholder="Service Image Link">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmInsert" class="btn btn-danger btn-sm">Add New</button>
            </div>
        </div>
    </div>
</div>



<!-- Service Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="edit-body">
                <span id="serviceEditID" class="d-none"></span>
                <input type="text" id="serviceName" class="form-control mb-4" placeholder="Service Name">
                <textarea id="serviceDetails" class="form-control mb-4" placeholder="Service Description"></textarea>
                <input type="text" id="serviceImage" class="form-control mb-4" placeholder="Service Image Link">
            </div>

            <h5 id="editWrong" class="text-center my-5 d-none">Something Went Wrong!</h5>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" id="confirmEdit" data-id="" class="btn btn-danger btn-sm">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Service Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-3 text-center">
                <h5 class="mt-4">Are You Sure!! You Want To Delete?</h5>
                <span id="serviceDeleteID" class="d-none"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                <button type="button" id="confirmDelete" data-id="" class="btn btn-danger btn-sm">Yes</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

    <script type="text/javascript">
        getServices();



        //get services data........
        function getServices() {
            axios.get('services-data')
                .then(function (response) {
                    if(response.status == 200){

                        $('#contentDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');

                        $('#serviceDt').DataTable().destroy();
                        $('#serviceTable').empty();

                        var serviceData = response.data;

                        $.each(serviceData, function (i, item) {
                            $('<tr>').html(

                                "<td class='th-sm'> <img class='table-img' src="+ serviceData[i].service_img +"> </td>>" +
                                "<td class='th-sm'>"+ serviceData[i].service_name +"</td>>" +
                                "<td class='th-sm'>"+ serviceData[i].service_desc +"</td>>" +
                                "<td class='th-sm'> <a class='serviceEdit' data-id="+ serviceData[i].id +"><i class='fas fa-edit'></i></a> </td>>" +
                                "<td class='th-sm'> <a class='serviceDelete' data-id="+ serviceData[i].id +"><i class='fas fa-trash-alt'></i></a> </td>>"

                            ).appendTo('#serviceTable');
                        });


                        $('.serviceEdit').click(function () {
                            var id = $(this).data('id');

                            $('#serviceEditID').html(id);
                            $('#editModal').modal('show');
                            serviceDetails(id);
                        });


                        $('.serviceDelete').click(function () {
                            var id = $(this).data('id');

                            // $('#confirmDelete').attr('data-id',id);
                            $('#serviceDeleteID').html(id);
                            $('#deleteModal').modal('show');

                        });


                        $('#serviceDt').DataTable();
                        $('.dataTables_length').addClass('bs-select');

                    }else{
                        $('#wrongDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');
                    }
                })
                .catch(function (error) {
                    $('#wrongDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');
                })
        }


        //show details in service edit modal
        function serviceDetails(detailsId) {
            axios.post('service-details',{id:detailsId})
                .then(function (response){
                    if(response.status == 200){
                        var serviceDetails = response.data;
                        $('#serviceName').val(serviceDetails.service_name);
                        $('#serviceDetails').val(serviceDetails.service_desc);
                        $('#serviceImage').val(serviceDetails.service_img);
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


        //service confirm update button.........
        $('#confirmEdit').click(function () {
            var id = $('#serviceEditID').html();
            var name = $('#serviceName').val();
            var desc = $('#serviceDetails').val();
            var img = $('#serviceImage').val();
            serviceUpdate(id, name, desc, img);
        });

        //service data edit............
        function serviceUpdate(serviceID, serviceName, serviceDesc, serviceImg) {

            if(serviceID==0){
                toastr.error('Failed To Update');

            }else if(serviceName.length==0){
                toastr.warning('Service Name Cannot Be Empty');

            }else if(serviceDesc.length==0){
                toastr.warning('Service Description Cannot Be Empty');

            }else if(serviceImg.length==0){
                toastr.warning('Service Image Cannot Be Empty');

            }else{
                $('#confirmEdit').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
                axios.post('service-update',{
                    id:serviceID,
                    service_name: serviceName,
                    service_desc: serviceDesc,
                    service_img: serviceImg,
                })
                    .then(function (response) {
                        if(response.status==200){
                            $('#confirmEdit').html("Update"); //animation
                            if(response.data == 1){
                                $('#editModal').modal('hide');
                                toastr.success('Service Item Updated');
                                getServices();
                            }else{
                                $('#editModal').modal('hide');
                                toastr.warning('Failed To Update');
                                getServices();
                            }
                        }else{
                            $('#editModal').modal('hide');
                            toastr.error('Something Went Wrong');
                            getServices();
                        }
                    })
                    .catch(function (error) {
                        $('#editModal').modal('hide');
                        toastr.error('Something Went Wrong');
                        getServices();
                    });
            }
        }



        //service confirm delete button.........
        $('#confirmDelete').click(function () {
            // var id = $(this).data('id');
            var id = $('#serviceDeleteID').html();
            serviceDelete(id);
        });

        //service data delete........
        function serviceDelete(deleteItem){
            $('#confirmDelete').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
            axios.post('service-delete',{id:deleteItem})
                .then(function (response) {
                    $('#confirmDelete').html("Yes");
                    if(response.status==200){
                        if(response.data == 1){
                            $('#deleteModal').modal('hide');
                            toastr.success('Service Item Deleted');
                            getServices();
                        }else{
                            $('#deleteModal').modal('hide');
                            toastr.warning('Failed To Delete');
                            getServices();
                        }
                    }else{
                        toastr.error('Something Went Wrong');
                    }
                })
                .catch(function (error) {
                    $('#wrongDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');
                });
        }



        //add new service modal show...............
        $('#addNewServiceBtn').click(function () {
            $('#addServiceModal').modal('show');
        });


        //service confirm update button.........
        $('#confirmInsert').click(function () {
            var name = $('#addServiceName').val();
            var desc = $('#addServiceDetails').val();
            var img = $('#addServiceImage').val();

            addNewService(name, desc, img);
        });


        //add new service..............
        function addNewService(name, desc, img) {
            if(name.length==0){
                toastr.warning('Service Name Cannot Be Empty');
                $('#confirmInsert').html('Add New');
            }else if(desc.length==0){
                toastr.warning('Service Description Cannot Be Empty');

            }else if(img.length==0){
                toastr.warning('Service Image Cannot Be Empty');

            }else {
                $('#confirmInsert').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //animation
                axios.post('service-added', {
                    name: name,
                    desc: desc,
                    img: img,
                })
                    .then(function (response) {
                        $('#confirmInsert').html("Add New");
                        if(response.status==200){
                            if(response.data == 1){
                                $('#addServiceModal').modal('hide');
                                toastr.success('Service Insert Successful');
                                getServices();
                            }else{
                                $('#addServiceModal').modal('hide');
                                toastr.warning('Failed To Insert');
                                getServices();
                            }
                        }else{
                            $('#addServiceModal').modal('hide');
                            toastr.warning('Failed To Insert');
                            getServices();
                        }
                    })
                    .catch(function (error) {
                        $('#addServiceModal').modal('hide');
                        toastr.warning('Failed To Insert');
                        getServices();
                    })
            }
        }

    </script>
@endsection
