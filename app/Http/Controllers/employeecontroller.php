<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\employee;

class employeecontroller extends Controller
{
    public function index()
    {   
        $employees = employee::get();

        return view ('employee.index', compact('employees'));
    }

    public function create()
    {
        return view ('employee.create');
    }


        
            // employee::findOrFail($id)->update($request->all());
            // return redirect ()->back()->with('status','Employee Updated Successfully!');
            // }

        
    public function edit(int $id){
        $employees = employee::find($id);
        return view('employee.edit',compact('employees'));
    }


    public function update(Request $request, int $id){
        $request->validate([

            //FIELDS HERE
        ]);
            employee::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            }

    
    public function destroy(int $id){
        $employees = employee::findOrFail($id);
        $employees = delete();
        return redirect()->back()->with('status','Employee Deleted');
    }

}
