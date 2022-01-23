<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $course=courses::all();
        $data=compact('course');
        return view('admin.course.addcourse')->with($data);
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
            // echo $request->course_name;
            // echo $request->course_duration;
            // echo $request->total_sem;

        $table=new courses;
        $table->course_name=$request->course_name;
        $table->duration_year=$request->course_duration;
        $table->total_no_sem=$request->total_sem;
        $table->save();
        return redirect(route('course.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo 'hello';
        // echo $id;
        $record=courses::find($id);
        $record->delete();
        return redirect(route('course.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // echo $id;
        $record=courses::find($id);
        // echo '<pre>';
        // var_dump($record);
        $data=compact('record');
        return view('admin.course.updatecourse')->with($data);
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
        // echo $request->course_name;
        // echo $request->course_duration;
        // echo $request->total_sem;
        $record=courses::find($id);
        $record->course_name=$request->course_name;
        $record->duration_year=$request->course_duration;
        $record->total_no_sem=$request->total_sem;
        $record->save();
        return redirect(route('course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo 'hello';
        // echo $id;
        // $record=courses::find($id);
        // $record->delete();
        // return redirect(route('course.index'));
    }
}
