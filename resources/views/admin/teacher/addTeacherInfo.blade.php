<!doctype html>
<html lang="en">
  <head>
    <title>Teacher Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class=" col-14">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">sr no</th>
                <th scope="col">first name</th>
                <th scope="col">middle name</th>
                <th scope="col">last name</th>
                <th scope="col">email</th>
                <th scope="col">phone no</th>
                <th scope="col">DOB</th>
                <th scope="col">profile pic</th>
                <th scope="col">Gender</th>
                <th scope="col">adress</th>
                <th scope="col">place of birth</th>
                <th scope="col">user name</th>
                <th scope="col">user mail</th>
                <th scope="col">password</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                @php $i=1; @endphp 
                @while ($i<count($Teachers)+1)
                @foreach ($Teachers as $t ) 
              <tr>
                <td scope="row">{{$i}}</td>
                <td scope="col">{{$t->first_name}}</td>
                <td scope="col">{{$t->middle_name}}</td>
                <td scope="col">{{$t->last_name}}</td>
                <td scope="col">{{$t->email}}</td>
                <td scope="col">{{$t->phone_no}}</td>
                <td scope="col">{{$t->dob}}</td>
                <td scope="col">
                    <img src="{{asset('storage/photos/'.$t->profile_img)}}" alt="profile pic" width="100" height="100">
                </td>
                <td scope="col">
                    @if ($t->gender=="M")
                        Male
                    @elseif ($t->gender=="F")
                        Female
                    @else
                        Other
                    @endif
                </td>
                <td scope="col">{{$t->address}}</td>
                <td scope="col">{{$t->place_of_birth}}</td>
                <td scope="col">{{$t->user_name}}</td>
                <td scope="col">{{$t->user_mail}}</td>
                <td scope="col">{{$t->password}}</td>
                <td>
                    <a name="" id="" class="btn btn-primary" href="" role="button">update</a>
                    <a name="" id="" class="btn btn-warning" href="" role="button">delete</a>
                   
                </td>
              </tr>

              @php $i++; @endphp
              @endforeach
              @endwhile
            </tbody>
          </table>
      </div>

    <div class="container">
      
      
        
        <h1 class="text-center p-3">Add Teacher</h1>
             <form action="" method="POST" enctype="multipart/form-data">
  
              @csrf
  
          <div class="mb-3">
              <label for="" class="form-label">First Name</label>
              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="enter your first name"  required>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">middle Name</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="enter your middle name" required>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="enter your last name" required>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="enter your Email" required>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">phone no</label>
                <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="enter your phone no" required>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">profile picture</label>
                <input type="file" name="profile_pic" id="profile_pic" class="form-control" placeholder="enter your profile picture" required>
              </div>
              
              <div class="mb-3">
                <label for="" class="form-label">Date of Birth</label>
                <input type="date" name="dob" id="dob" class="form-control" placeholder="enter your Date of Birth" required>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="M">
                    <label class="form-check-label" for="gender1">
                      Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="F" >
                    <label class="form-check-label" for="gender2">
                     Female
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender3" value="O" >
                    <label class="form-check-label" for="gender3">
                     Other
                    </label>
                  </div>
              </div>

              <div class="mb-3">
                <label for="Adress" class="form-label">Adress</label>
                <textarea class="form-control" id="adress" name="adress" rows="3" placeholder="enter your Adress" required></textarea>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Place of Birth</label>
                <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="enter your Place of Birth" required>
              </div>
            
            <button type="submit" class="btn btn-primary">Add Teacher</button>
  
        </form>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>