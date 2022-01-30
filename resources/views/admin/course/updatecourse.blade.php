@extends('admin.layouts.app')

@section('content')
    <div class="container">

        {{-- {{print_r($record)}} --}}
   {{-- {{$record->course_name}} --}}

        <h1 class="text-center p-3">Update Course</h1>
      <form action="{{route('course.update', ['course' => $record->course_id]);}}" method="POST">

            @csrf
            <input type="hidden" name="_method" value="put" />
        <div class="mb-3">
            <label for="" class="form-label">course name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" placeholder="" value="{{$record->course_name}}" >
          </div>

          <div class="mb-3">
            <label for="" class="form-label">course duration (in year)</label>
            <input type="text" name="course_duration" id="course_duration" class="form-control" placeholder="" value="{{$record->duration_year}}">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">total no semister</label>
            <input type="text" name="total_sem" id="total_sem" class="form-control" placeholder="" value="{{$record->total_no_sem}}">
          </div>

          <button type="submit" class="btn btn-primary">Update Course</button>

      </form>
      </div>


@endsection