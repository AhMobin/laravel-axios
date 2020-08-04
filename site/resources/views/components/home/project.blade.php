
<div class="container section-marginTop text-center" id="project">
        <h1 class="section-title">Projects</h1>
        <h1 class="section-subtitle">We Develop Web And Mobile Application</h1>
        <div class="row">

            <div id="one" class="owl-carousel mb-4 owl-theme">

                @foreach($projects as $project)
                    <div class="item m-1 card">
                        <div class="text-center">
                            <img class="w-100" src="{{ $project->project_thumb }}" alt="Card image cap">
                            <h5 class="service-card-title mt-4">{{ $project->project_name }}</h5>
                            <h6 class="service-card-subTitle p-0 m-0">{{ $project->project_desc }}</h6>
                            <a href="{{ $project->project_link }}" class="normal-btn-outline mt-2 mb-4 btn">Details</a>
                        </div>
                    </div>
                @endforeach

            </div>    

        </div>

        <div class="d-inline ml-2">
            <i id="customPrevBtn" class="btn normal-btn"><</i>
            <i id="customNextBtn" class="btn normal-btn">></i>
            <button class="normal-btn  btn">সব গুলো </button>
        </div>
    </div>
</div>