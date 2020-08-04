@extends('master.layout')
@section('title','Photo Gallery')

@section('content')


    <div id="contentDiv" class="d-none">

        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5">
                    <button class="btn btn-danger btn-sm my-3" id="addNewPhotoBtn" >Add New</button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row photoRow">

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
                    <button type="submit" id="photoSave" class="btn btn-danger btn-sm">Save</button>
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

        loadPhotos();


        $('#addNewPhotoBtn').click(function () {
            $('#photoInsertModal').modal('show');
        });


        $('#newPhoto').change(function () {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function (e) {
                var imgSource = e.target.result;
                $('#imgPreview').attr('src',imgSource);
            }
        });


        $('#photoSave').click(function () {

            $('#photoSave').html("<div class='spinner-border spinner-border-sm' role='status'></div>")

            var imgFile = $('#newPhoto').prop('files')[0];
            var formData = new FormData();
            formData.append('photo',imgFile);

            axios.post('photo-upload',formData)
            .then(function (response) {
                $('#photoSave').html("Save");
                if(response.status == 200){
                    $('#photoInsertModal').modal('hide');
                    toastr.success('Image Upload Successful');

                }else{
                    $('#photoInsertModal').modal('hide');
                    toastr.warning('Image Upload Failed');
                }
            })
            .catch(function (error) {
                $('#photoSave').html("Save");
                $('#photoInsertModal').modal('hide');
                toastr.error('Something Went Wrong');
            })
        });


        function loadPhotos() {


            $('.photoRow').empty();

            axios.get('photos')
            .then(function (response) {

                $('#loaderDiv').addClass('d-none');
                $('#contentDiv').removeClass('d-none');

                $.each(response.data, function (i,item) {
                    $("<div class='col-md-3 p-1'>").html(
                    "<img src="+ item.location +" class='imgShow'>"
                    ).appendTo('.photoRow');
                })
            })
            .catch(function (error) {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            })
        }

    </script>

@endsection
