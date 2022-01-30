@extends('admin.layouts.app')

@section('content')
    
   <div class="container">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">sem no</th>
            <th scope="col">total no of subject in sem</th>
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
            <td>{{$r->sem_no}}</td>
            <td>{{$r->total_no_subject}}</td>
            <td>{{$r->course_name}}</td>
            <td>
                <a name="" id="" class="btn btn-primary" href="{{route('sem.edit', ['sem' => $r->sem_id])}}" role="button">update</a>
                <a name="" id="" class="btn btn-warning" href="{{route('sem.show', ['sem'=> $r->sem_id])}}" role="button">delete</a>            
            </td>
          </tr>
          @php $i++; @endphp
          @endforeach
          @endwhile
        </tbody>
      </table>

   </div>



      <div class="container">

        <h1>Add sem</h1>
      <form action="{{route('sem.store')}}" method="POST">

            @csrf

        <div class="mb-3">
            <label for="Sem_no" class="form-label">sem no</label>
            <input type="int" name="sem_no" id="sem_no" class="form-control" placeholder="" >
          </div>

          <div class="mb-3">
            <label for="course_id" class="form-label">select course</label>
            <select class="form-select"  id='course_id'  name="course_id" >
              <option >selsect the course</option>
                @foreach ($course as $c )
                <option value="{{$c['course_id']}}">{{$c['course_name']}}</option>
                @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="total_subject" class="form-label">total no of subject</label>
            <input type="int" name="total_subject" id="total_subject" class="form-control" placeholder="">
          </div>

          <button type="submit" class="btn btn-primary">Add sem</button>

      </form>

      </div>
    
@endsection