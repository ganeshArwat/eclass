<?php

namespace App\Http\Controllers;

use App\Models\courses;
use App\Models\semister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class semcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $course=courses::all();
        
        $record = DB::table('semister_tabel')->join('courses', 'semister_tabel.course_id', '=', 'courses.course_id')
        ->select('semister_tabel.*', 'courses.course_name')
        ->get();
        // echo '<pre>';
        // var_dump(array($record));
        $data=compact('course','record');
        return view('admin.semister.addsem')->with($data);
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
        // var_dump($request->all());

        $table=new semister;
        $table->sem_no=$request->sem_no;
        $table->total_no_subject=$request->total_subject;
        $table->course_id=$request->course_id;
        $table->save();
        return redirect(route('sem.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record=semister::find($id);
        $record->delete();
        return redirect(route('sem.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $course=courses::all();
        
        $record = DB::table('semister_tabel')->join('courses', 'semister_tabel.course_id', '=', 'courses.course_id')
        ->select('semister_tabel.*', 'courses.course_name')->where('semister_tabel.sem_id', '=', $id)
        ->get();
        // echo '<pre>';
        // var_dump(array($record));
        $data=compact('course','record');
        return view('admin.semister.updatesem')->with($data);
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
        // echo '<pre>';
        // var_dump($request->all());
        $record=semister::find($id);
        $record->sem_no=$request->sem_no;
        $record->total_no_subject=$request->total_subject;
        $record->course_id=$request->course_id;
        $record->save();
        return redirect(route('sem.index'));
        
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
