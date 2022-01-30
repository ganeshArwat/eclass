@extends('admin.layouts.app')

@section('content')
    <h2 class="text-center p-3">Add subject</h2>

    <div class="container">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">subject name</th>
            <th scope="col">sem  no</th>
            <th scope="col">course name</th>
            <th scope="col">action</th>
  
          </tr>
        </thead>
        <tbody>
          @php $i=1; @endphp
          @while ($i<count(array($record))+1)  
          @foreach ($record as $r )
          <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$r->subject_name}}</td>
            <td>{{$r->sem_no}}</td>
            <td>{{$r->course_name}}</td>
            <td>
              <a name="" id="" class="btn btn-primary" href="{{route('subject.edit', ['subject' => $r->subject_id])}}" role="button">update</a>
              <a name="" id="" class="btn btn-warning" href="{{route('subject.show', ['subject'=> $r->subject_id])}}" role="button">delete</a>
            </td>
          </tr>
          @php $i++; @endphp
          @endforeach
          @endwhile
      
        </tbody>
      </table>

    </div>

    <div class="container">
      <h2>subjects</h2>

      <form action="" method="POST">

        @csrf

        <div class="mb-3">                
            <label for="course_id" class="form-label">select course</label>
            <select class="form-select"  id='course_id'  name="course_id" >
                <option >selsect the course</option>
              @foreach ($course as $c )
              <option value="{{$c->course_id}}">{{$c->course_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="sem_id" class="form-label">select sem no</label>
            <select class="form-select"  id='sem_id'  name="sem_id" >
              <option value="">selsect the sem</option>
            </select>
          </div>

        <div class="mb-3">
            <label for="Sem_no" class="form-label">subject name</label>
            <input type="text" name="subject_name" id="subject_name" class="form-control" placeholder="" >
        </div>

     


      <button type="submit" class="btn btn-primary">Add Course</button>

  </form>

  </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


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

@endsection