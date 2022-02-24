@extends('layouts.main')

@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2>Solicitudes de inscripción a mis cursos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($userEnrollments as $enrollment)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{ optional($enrollment->course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @foreach($enrollment->course->teachers as $teacher)
                                <a href="{{ route('courses.index') }}?teacher={{ $teacher->id }}" class="btn_4 mr-1 mb-1">{{ $teacher->name }}</a>
                            @endforeach
                            <h4>{{ $enrollment->course->getPrice() }}</h4>
                            <a href="{{ route('courses.show', $enrollment->course->id) }}"><h3>{{ $enrollment->course->name }}</h3></a>
                            <p>{{ Str::limit($enrollment->course->description, 100) }}</p>
                            <div class="author_info">
                                <p>Status:</p>
                                <h5>{{ App\Enrollment::STATUS_RADIO[$enrollment->status] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="float-right">
                    {{ $userEnrollments->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection