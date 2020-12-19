<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {
        $students = Student::all();

        return view( 'student.index', ['students' => $students] );
    }

    public function create() {
        return view( 'student.create' );
    }

    public function store( Request $request ) {
        $this->validate( $request, [
            'name'  => 'required',
            'email' => 'required',
        ] );
        $name  = $request->name;
        $email = $request->email;

        if ( Student::whereEmail( $email )->count() > 0 ) {
            session()->flash( 'unsuccess', 'This Email Address Already Taken!' );

            return redirect()->back();
        }

        Student::create( [
            'name'  => $name,
            'email' => $email,
        ] );

        session()->flash( 'success', 'Student Created Successfully' );

        return redirect()->back();
    }

    public function edit( $id ) {
        $student = Student::find( $id );

        return view( 'student.edit', ['student' => $student] );
    }

    public function update( Request $request, $id ) {
        $this->validate( $request, [
            'name'  => 'required',
            'email' => 'required',
        ] );
        if ( session()->where( 'email', $request->email )->where( 'id', '!=', $id )->count() > 0 ) {
            session()->flash( 'unsuccess', 'This Email Address Already Taken!' );

            return redirect()->back();
        }
        $student = Student::find( $id );

        $student->name  = $request->name;
        $student->email = $request->email;
        $student->save();

        session()->flash( 'success', 'Student Updated Successfully' );

        return redirect()->back();
    }

    public function delete( $id ) {
        $student = Student::find( $id )->delete();

        session()->flash( 'success', 'Student Deleted Successfully' );

        return redirect()->back();
    }
}
