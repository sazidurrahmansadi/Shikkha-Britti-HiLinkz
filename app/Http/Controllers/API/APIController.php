<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use app\models\Test;
use App\Models\TestStudent;
use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowTestStudents($id = null)
    {
        if ($id == '') {
            $testUser = TestStudent::get();
            return response()->json(['testUser' => $testUser]);
        } else {
            $testUser = TestStudent::find($id);
            return response()->json(['testUser' => $testUser]);
        }
    }

    public function addTestStudent(Request $request)
    {
        if ($request->ismethod('POST')) {
            $data = $request->all();

            $rules = [
                'name' => 'required|unique:test_students',
                'profession' => 'required',
                'age' => 'required',
            ];
            $customMessage =[
                'name.required' =>'Name is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            $testUser = new TestStudent();
            $testUser->name = $request->name;
            $testUser->profession = $request->profession;
            $testUser->age = $request->age;

            $testUser->save();

            return response()->json([
                'message'=>'Test Student Successfully Added'
            ], 201);
        }
    }


    //post API for adding multiple users
    public function addStudentMultiple(Request $request)
    {
        if ($request->ismethod('POST')) {
            $data = $request->all();

            $rules = [
                'students.*.name' => 'required|unique:test_students',
                'students.*.profession' => 'required',
                'students.*.age' => 'required',
            ];
            $customMessage = [
                'students.*.name.required' =>'Name is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if($validator->fails()){
                return response()->json($validator->errors(),422);
            }

            foreach($data['students'] as $add_student){

                $student = new TestStudent();
                $student->name = $add_student['name'];
                $student->profession = $add_student['profession'];
                $student->age = $add_student['age'];
    
                $student->save();   
            }
            return response()->json([
                'message'=>'Test Student Successfully Added'
            ], 201);
            
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
