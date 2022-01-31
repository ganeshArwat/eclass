<?php

namespace App\Http\Controllers;

use App\Models\TeacherInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeacherInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $Teachers=TeacherInfo::all();
        $data=compact('Teachers');
        // echo'<pre>';
        // foreach($Teachers as $t){
        //     var_dump($t);
        // }

            
        return view('admin.teacher.addTeacherInfo')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo 'adding teacher';
       
        // echo '<pre>';
        // print_r($request->all());
        // // print($request->file('profile_pic'));

        $destination_path='public/photos';
        $image=$request->file('profile_pic');
        $image_name= time().$image->getClientOriginalName();
        $img=$request->file('profile_pic')->storeAs($destination_path , $image_name );
       
       $userName=$request->first_name." ".$request->last_name;
       $userMail=((string)rand(1000, 9999)).$request->first_name.$request->last_name."@eclass.com";
       $password=$request->first_name.$request->last_name."@1234";

    //    echo $userName;
    //    echo '<hr>';
    //    echo $userMail;
    //    echo '<hr>';
    //    echo $password;
    //    echo '<hr>';
    //    echo bcrypt($password);
       
        $table= new TeacherInfo;

        $table->first_name =$request->first_name;
        $table->middle_name=$request->middle_name;
        $table->last_name=$request->last_name;
        $table->email=$request->email;
        $table->phone_no=$request->phone_no;
        $table->profile_img=$image_name;
        $table->dob=$request->dob;
        $table->gender=$request->gender;
        $table->address=$request->adress;
        $table->place_of_birth=$request->birth_place;
        $table->user_name =$userName;
        $table->user_mail = $userMail;
        $table->password = $password;
        $table->save();
   

        $user_table =new User;
        $user_table->name = $userName;
        $user_table->email = $userMail;
        $user_table->c_email =$request->email;
        $user_table->password  = bcrypt($password);
        $user_table->role_id =2;
        $user_table->save();

       return redirect(route('teacherInfo.index')); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo $id."deleted";

        $record=TeacherInfo::find($id);

        $userMail=$record->user_mail;
        echo $userMail;
        $users = DB::table('users')->where('email', '=', $userMail)->get();
   
        $user_id='';
        foreach ($users as $user) {
            echo '<hr>';
            echo $user->name;
            echo '<hr>';
            $user_id= $user->id;
            echo $user_id;

           
        }

        $user=User::find($user_id);

        $record->delete();

        $user->delete();

       return redirect(route('teacherInfo.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id."updated";

        $record=TeacherInfo::find($id);
        // echo '<pre>';
        // var_dump($record);
        $data=compact('record');
        return view('admin.teacher.updateTeacherInfo')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  echo '<pre>';
        // print_r($request->all());

        if($request->hasfile('profile_pic')){

            echo 'new image is there ';
            $destination_path='public/photos';
            $image=$request->file('profile_pic');
            $image_name= time().$image->getClientOriginalName();
            $img=$request->file('profile_pic')->storeAs($destination_path , $image_name );
            echo $image_name;

        }
        else{

            $image_name=$request->profile_pic_old;
            echo $image_name;
            // echo ' no new image is there ';

        }
        

        
       
       $userName=$request->first_name." ".$request->last_name;
       $userMail=$request->user_mail_old;
       $password=$request->user_password_old;


       if($request->user_name_old != $userName){
        $userMail=((string)rand(1000, 9999)).$request->first_name.$request->last_name."@eclass.com";
        $password=$request->first_name.$request->last_name."@1234";

        echo '<hr>';
        echo $userName;
        echo '<hr>';
        echo $userMail;
        echo '<hr>';
        echo $password;
        echo '<hr>';
        
    }else{
        $userName=$request->user_name_old;

        echo '<hr>';
        echo $userName;
        echo '<hr>';
        echo $userMail;
        echo '<hr>';
        echo $password;
        echo '<hr>';
    }
      

    //    echo $userName;
    //    echo '<hr>';
    //    echo $userMail;
    //    echo '<hr>';
    //    echo $password;
    //    echo '<hr>';
    //    echo bcrypt($password);
       
            $record=TeacherInfo::find($id);

            $record->first_name =$request->first_name;
            $record->middle_name=$request->middle_name;
            $record->last_name=$request->last_name;
            $record->email=$request->email;
            $record->phone_no=$request->phone_no;
            $record->profile_img=$image_name;
            $record->dob=$request->dob;
            $record->gender=$request->gender;
            $record->address=$request->adress;
            $record->place_of_birth=$request->birth_place;
            $record->user_name =$userName;
            $record->user_mail = $userMail;
            $record->password = $password;
            $record->save();


        if($request->user_name_old == $userName){
            echo "no user login modification ";
        }else{


            echo "user login modification required";

            $users = DB::table('users')->where('name', '=', $request->user_name_old)->get();
            // $users =User::where('name', '=', $request->user_name_old);
            // echo $users->name;
            $user_id='';
            foreach ($users as $user) {
                echo '<hr>';
                echo $user->name;
                echo '<hr>';
                $user_id= $user->id;

               
            }

            $user=User::find($user_id);

            $user->name = $userName;
            $user->email = $userMail;
            $user->c_email =$request->email;
            $user->password  = bcrypt($password);
            $user->role_id =2;
            $user->save();
    
        }

        return redirect(route('teacherInfo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
