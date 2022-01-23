<!doctype html>
<html lang="en">
  <head>
    <title>update sem</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
@foreach ($record as $r)
    
        <h1>update sem</h1>
      <form action="{{route('sem.update', ['sem'=>$r->sem_id])}}" method="POST">
    
            @csrf
            <input type="hidden" name="_method" value="put" />
        <div class="mb-3">
            <label for="Sem_no" class="form-label">sem no</label>
            <input type="int" name="sem_no" id="sem_no" class="form-control" placeholder="" value="{{$r->sem_no}}" >
          </div>
    
          <div class="mb-3">
            <label for="course_id" class="form-label">select course</label>
            <select class="form-select"  id='course_id'  name="course_id" >
              <option selected value="{{$r->course_id}}">{{$r->course_name}}</option>
                @foreach ($course as $c )
                <option value="{{$c['course_id']}}">{{$c['course_name']}}</option>
                @endforeach
            </select>
          </div>
    
          <div class="mb-3">
            <label for="total_subject" class="form-label">total no of subject</label>
            <input type="int" name="total_subject" id="total_subject" class="form-control" placeholder="" value="{{$r->total_no_subject}}">
          </div>
    
          <button type="submit" class="btn btn-primary">Add sem</button>
          @endforeach
      </form>
    
      </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>