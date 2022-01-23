<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">

        {{-- {{print_r($record)}} --}}
   {{-- {{$record->course_name}} --}}

        <h1>Update Course</h1>
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>