@extends('layouts.main')

@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>Cursos</p>
                    <h2>Novedades en cursos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($newestCourses as $course)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @foreach($course->teachers as $teacher)
                                <a href="{{ route('courses.index') }}?teacher={{ $teacher->id }}" class="btn_4 mr-1 mb-1">ddd{{ $teacher->name }}</a>
                            @endforeach
                            <h4>{{ $course->getPrice() }}</h4>
                            <a href="{{ route('courses.show', $course->id) }}"><h3>{{ $course->name }}</h3></a>
                            <p>{{ Str::limit($course->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection