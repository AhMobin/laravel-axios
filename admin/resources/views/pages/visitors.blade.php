@extends('master.layout')
@section('title','Visitors Data')

@section('content')

<div id="contentDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">
        <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">NO</th>
                    <th class="th-sm">IP</th>
                    <th class="th-sm">Date & Time</th>
                </tr>
            </thead>

            <tbody id="visitorTable">

{{--             visitors data fetched by axios.....--}}

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

@endsection

@section('script')
    <script type="text/javascript">
        getVisitors();


        // get visitors data............
        function getVisitors() {
            axios.get('visitors-data')
                .then(function (response) {
                    if(response.status == 200){
                        $('#contentDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');

                        $('#VisitorDt').DataTable().destroy();

                        var visitorData = response.data;
                        $.each(visitorData, function (i, item) {
                            $('<tr>').html(
                                "<td class='th-sm'>"+ visitorData[i].id +"</td>" +
                                "<td class='th-sm'>"+ visitorData[i].ip_address +"</td>" +
                                "<td class='th-sm'>"+ visitorData[i].visit_time +"</td>"
                            ).appendTo('#visitorTable');
                        })


                        $('#VisitorDt').DataTable();
                        $('.dataTables_length').addClass('bs-select');

                    }else{
                        $('#wrongDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');
                    }
                })
                .catch(function (error) {
                    $('#wrongDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');
                });
        }
    </script>
@endsection
