<!doctype html>
<html lang="en">
  <head>
    <title>add course</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">

        <h2 class="text-center">Add Course</h2>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">sr no</th>
                <th scope="col">course name</th>
                <th scope="col">course duration</th>
                <th scope="col">no of sem in course</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @php $i=1; @endphp 
                @while ($i<count($course)+1)
                @foreach ($course as $c ) 
              <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$c->course_name}}</td>
                <td>{{$c->duration_year}}</td>
                <td>{{$c->total_no_sem}}</td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="{{route('course.edit', ['course' => $c->course_id])}}" role="button">update</a>
                    <a name="" id="" class="btn btn-warning" href="{{route('course.show', ['course'=> $c->course_id])}}" role="button">delete</a>
                   
                </td>
              </tr>

              @php $i++; @endphp
              @endforeach
              @endwhile
            </tbody>
          </table>

      </div>


      <div class="container">

        <h1>Add Course</h1>
      <form action="{{route('course.store')}}" method="POST">

            @csrf

        <div class="mb-3">
            <label for="" class="form-label">course name</label>
            <input type="text" name="course_name" id="course_name" class="form-control" placeholder="" >
          </div>

          <div class="mb-3">
            <label for="" class="form-label">course duration (in year)</label>
            <input type="text" name="course_duration" id="course_duration" class="form-control" placeholder="">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">total no semister</label>
            <input type="text" name="total_sem" id="total_sem" class="form-control" placeholder="">
          </div>

          <button type="submit" class="btn btn-primary">Add Course</button>

      </form>

      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>