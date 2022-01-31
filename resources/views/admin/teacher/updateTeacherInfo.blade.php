@extends('admin.layouts.app')

@section('content')


    <div class="container">
            {{-- {{print_r($record)}} --}}
   {{-- {{$record->first_name}} --}}
      
        
        <h1 class="text-center p-3">update Teacher</h1>
             <form action="{{route('teacherInfo.update', ['teacherInfo' => $record->teacher_id]);}}" method="POST" enctype="multipart/form-data">
  
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
                <img src="{{asset('storage/photos/'.$record->profile_img)}}" alt="profile pic" width="100" height="100">
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
            
            <button type="submit" class="btn btn-primary">Update Teacher</button>
  
        </form>

    </div>
 @endsection