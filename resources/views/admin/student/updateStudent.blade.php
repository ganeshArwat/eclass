@extends('admin.layouts.app')

@section('content')
      
    <div class="container">
        {{-- {{print_r($record)}} --}}
{{-- {{$record->first_name}} --}}
  
    
    <h1 class="text-center p-3">update student</h1>

    @foreach ($record as $record )
        
  
         <form action="{{route('studentInfo.update', ['studentInfo' => $record->student_id]);}}" method="POST" enctype="multipart/form-data">

          @csrf
          <input type="hidden" name="_method" value="put" />
      <div class="mb-3">
          <label for="" class="form-label">First Name</label>
          <input type="text" name="first_name" id="first_name" class="form-control" placeholder="enter your first name" value=" {{$record->first_name}}" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">middle Name</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="enter your middle name" value=" {{$record->middle_name}}" required>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="enter your last name" value=" {{$record->last_name}}" required>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="enter your Email" value=" {{$record->email}}" required>
            <input type="hidden" name="user_name_old" id="user_mail_old" value="{{$record->user_name}}">
            <input type="hidden" name="user_mail_old" id="user_mail_old" value="{{$record->user_mail}}">
            <input type="hidden" name="user_password_old" id="user_mail_old" value="{{$record->password}}">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">phone no</label>
            <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="enter your phone no" value=" {{$record->phone_no}}" required>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">profile picture</label>
            <img src="{{asset('storage/photos/studentInfo/'.$record->profile_img)}}" alt="profile pic" width="100" height="100">
            <input type="file" name="profile_pic" id="profile_pic" class="form-control" placeholder="enter your profile picture"  value="{{$record->profile_img}}" >
            <input type="hidden" name="profile_pic_old" id="profile_pic_old" value="{{$record->profile_img}}">
          </div>
          
          <div class="mb-3">
            <label for="" class="form-label">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control" placeholder="enter your Date of Birth" value="{{$record->dob}}" required>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender1" value="M"
                @if ($record->gender=="M")
                checked
                @endif
                >
                <label class="form-check-label" for="gender1">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender2" value="F" 
                
                @if ($record->gender=="F")
                checked
                @endif

                >
                <label class="form-check-label" for="gender2">
                 Female
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="gender3" value="O"
                
                @if ($record->gender=="O")
                checked
                @endif

                
                >
                <label class="form-check-label" for="gender3">
                 Other
                </label>
              </div>
          </div>

          <div class="mb-3">
            <label for="Adress" class="form-label">Adress</label>
            <textarea class="form-control" id="adress" name="adress" rows="3" placeholder="enter your Adress"  required>{{$record->address}}</textarea>
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Place of Birth</label>
            <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="enter your Place of Birth"  value=" {{$record->place_of_birth}}"required>
          </div>

          <div class="mb-3">                
            <label for="course_id" class="form-label">select course</label>
            <select class="form-select"  id='course_id'  name="course_id" >
                <option selected value="{{$record->course_id}}" >{{$record->course_name}}</option>
              @foreach ($course as $c )
              <option value="{{$c->course_id}}">{{$c->course_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="sem_id" class="form-label">select sem no</label>
            <select class="form-select"  id='sem_id'  name="sem_id" >
              <option value="{{$record->sem_id}}"> {{$record->sem_no}}</option>
            </select>
          </div>
        
        <button type="submit" class="btn btn-primary">Update student</button>

    </form>
    @endforeach
</div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  
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