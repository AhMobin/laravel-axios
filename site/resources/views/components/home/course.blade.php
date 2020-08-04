
<div class="container section-marginTop text-center">
    <h1 class="section-title">Our Courses</h1>
    <h1 class="section-subtitle">We Take IT Related Courses Based On Projects</h1>
    <div class="row">

        @foreach($courses as $course)
        <div class="col-md-4 thumbnail-container">
                <img src="{{ $course->course_thumb }}" alt="Avatar" class="thumbnail-image ">
                <div class="thumbnail-middle">
                    <h1 class="thumbnail-title"> {{ $course->course_title }} </h1>
                    <h1 class="thumbnail-subtitle">{{ $course->course_desc }}</h1>
                    <a href="{{ $course->course_link }}" class="normal-btn btn">Enroll Now</a>
                </div>
        </div>
        @endforeach
    </div>
</div>