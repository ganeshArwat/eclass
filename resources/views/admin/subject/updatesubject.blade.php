<!doctype html>
<html lang="en">
  <head>
    <title>update subject</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

    <div class="container">
        <h2>subjects</h2>
  @foreach ( $record as $r )
      
        <form action="{{route('subject.update',['subject'=>$r->subject_id])}}" method="POST">
  
          @csrf
          <input type="hidden" name="_method" value="put" />
          <div class="mb-3">                
              <label for="course_id" class="form-label">select course</label>
              <select class="form-select"  id='course_id'  name="course_id" >
                  <option selected value="{{$r->course_id}}" >{{$r->course_name}}</option>
                @foreach ($course as $c )
                <option value="{{$c->course_id}}">{{$c->course_name}}</option>
                @endforeach
              </select>
            </div>
  
            <div class="mb-3">
              <label for="sem_id" class="form-label">select sem no</label>
              <select class="form-select"  id='sem_id'  name="sem_id" >
                <option value="{{$r->sem_id}}"> {{$r->sem_no}}</option>
              </select>
            </div>
  
          <div class="mb-3">
              <label for="Sem_no" class="form-label">subject name</label>
              <input type="text" name="subject_name" id="subject_name" class="form-control" placeholder=""  value="{{$r->subject_name}}">
          </div>
  
       
  
  
        <button type="submit" class="btn btn-primary">Add Course</button>
  
    </form>
    @endforeach
    </div>
  
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>

  <script>
    $(document).ready(function () {
         $('#course_id').change(function (e) { 
              e.preventDefault();
              var cid = $(this).val();
              // alert(cid);
              $.ajax({
                  type: "post",
                  url: "/getsem",
                  data: "cid="+cid+'&_token={{csrf_token()}}',
                  success: function (response) {
                      $('#sem_id').html(response)
                      // alert(response);
                      // console.console.log(reponse);
                  }
              });
              
          });

          
      });
  </script>
</html>