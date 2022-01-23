<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $record = DB::table('subjects')->join('semister_tabel', 'subjects.sem_id', '=', 'semister_tabel.sem_id')->join('courses', 'subjects.course_id', '=', 'courses.course_id')
        ->select('subjects.*','semister_tabel.sem_no', 'courses.course_name')
        ->get();

        // echo '<pre>';
        // var_dump($record);
        $course=courses::all();
        $data= compact('course','record');
        return view('admin.subject.addsubject')->with($data);
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
    //     echo $request->subject_name;
    //    echo $request->sem_id;
    //    echo $request->course_id;

       $table =new subject;

       $table->subject_name=$request->subject_name;
       $table->sem_id=$request->sem_id;
       $table->course_id=$request->course_id;
       $table->save();
       return redirect(route('subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'delete'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = DB::table('subjects')->join('semister_tabel', 'subjects.sem_id', '=', 'semister_tabel.sem_id')->join('courses', 'subjects.course_id', '=', 'courses.course_id')
        ->select('subjects.*','semister_tabel.sem_no', 'courses.course_name')->where('subjects.subject_id', '=', $id)
        ->get();
        
        //   echo '<pre>';
        // var_dump($record);
        // echo 'edit'.$id;
        $course=courses::all();
        $data= compact('course', 'record');
        return view('admin.subject.updatesubject')->with($data);
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
        $record=subject::find($id);

        $record->subject_name=$request->subject_name;
        $record->sem_id=$request->sem_id;
        $record->course_id=$request->course_id;
        $record->save();
        return redirect(route('subject.index'));
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

    public function getsem( Request $request){
        $cid=$request->post('cid');
        // echo "course id is ".$cid;
        // echo "sem no 343";

        $data=DB::table('semister_tabel')->where('course_id',$cid)->get();
        // echo '<pre>';
        // var_dump($data);

        $html='<option value="">selsect the sem</option>selsect the sem</option>';
        foreach($data as $d){
            $html.='<option value="'.$d->sem_id.'">'.$d->sem_no.'</option>';
            
        }

        echo $html;
    }

}
