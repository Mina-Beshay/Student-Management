<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\View\View;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $arr['students']=$students;
        return view ('students.index',$arr);
    }
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $input=$request->validate(
                [
                    'name'=>['required','string','max:20'],
                    'phone'=>['required','digits:10'],
                    'class'=>['required','string','max:20'],
                    'marks'=>['required','string','max:20'],
                    'birth_date'=>['required']
                ]
            );
            $student=Student::create($input);
            return redirect()->route('Student.Index');
        }else{
            return view('students.create');
        }

    }
    public function edit(Request $request,$id)
    {
        $students=Student::find($id);
        if ($request->isMethod('post')) {
            $input = $request->validate(
                [
                    'name'=>'required','string','max:20',
                    'phone'=>'required','digits:10',
                    'class'=>'required','string','max:20',
                    'marks'=>'required','string','max:20',
                    'birth_date'=>'required',
                ]);

            $students->update($input);
            return redirect()->route('Student.Index');
        } else {
            $arr['students']=$students;
            return view('students.edit',$arr);
        }
    }
    public function delete( $id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect()->back();

    }

    public function search(Request $request){
        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $query=DB::table('students')->select()
            ->where('birth_date','>=',$fromDate)
            ->where('birth_date','<=',$toDate)
           ->get();
        $arr['students']=$query;
        return view('students.search',$arr,compact('query'));

    }

    public function search_all(Request $request){
        $input=$request->input('search_all');
        $query = Student::where('name','LIKE','%'.$input.'%')
            ->orWhere('class','LIKE','%'.$input.'%')
            ->orWhere('phone','LIKE','%'.$input.'%')
            ->orWhere('marks','LIKE','%'.$input.'%')
            ->orWhere('birth_date','LIKE','%'.$input.'%')->get();
        $arr['students']=$query;
            return view('students.search',$arr,compact('query'));
    }

}
