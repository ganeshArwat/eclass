@extends('admin.layouts.app')

@section('content')
    <div class="container">
@foreach ($record as $r)
    
        <h1 class="text-center p-3">update sem</h1>
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
  

@endsection