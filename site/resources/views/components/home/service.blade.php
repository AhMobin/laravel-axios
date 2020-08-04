<div class="container section-marginTop text-center" id="service">
    <h1 class="section-title">Our Services </h1>
    <h1 class="section-subtitle">We provide IT related courses based on project</h1>
    <div class="row">

        @foreach($services as $ser)
            <div class="col-md-3 p-2 ">
                <div class="card service-card text-center w-100">
                    <div class="card-body">
                        <img class="service-card-logo " src="{{ $ser->service_img }}" alt="Card image cap">
                        <h5 class="service-card-title mt-3">{{ $ser->service_name }}</h5>
                        <h6 class="service-card-subTitle p-0 m-0">{{ $ser->service_desc }}</h6>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
