<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(15);

        return view('employees.list', [
            'employees' => $employees
        ]);
    }

    public function getAvatar($employee, $path)
    {
        return response()->file('../storage/app/avatars/' . $path);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $user = User::create([
            'name' => $request->get('login')
            ,'password' => Hash::make($request->get('password'))
            ,'isAdmin' => $request->get('isAdmin')
        ]);

        $employee = new Employee();
        $employee->email = $request->get('email');
        $employee->name = $request->get('name');
        $employee->phone = $request->get('phone');
        $employee->emailEn = $request->get('emailEn');
        $employee->nameEn = $request->get('nameEn');
        $employee->phoneEn = $request->get('phoneEn');
        $employee->userId = $user->id;


        if ($request->hasFile('image')) {
            $pathImage = $request->file('image')->store('avatars');
            $employee->image = $pathImage;
        } else {
            $employee->image = null;
        }

        $employee->save();

        return redirect(route('employees.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $user = $employee->user;

        if(isset($employee)) {
            return view('employees.edit', [
                'employee' => $employee
                ,'user' => $user
            ]);
        } else {
            return response(view('404'), 404);
        }
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
        $this->validate($request, [
            'password' => 'confirmed',
        ]);

        $employee = Employee::find($id);


        if(isset($employee)) {
            $employee->email = $request->get('email');
            $employee->name = $request->get('name');
            $employee->phone = $request->get('phone');
            $employee->emailEn = $request->get('emailEn');
            $employee->nameEn = $request->get('nameEn');
            $employee->phoneEn = $request->get('phoneEn');

            if ($request->hasFile('image')) {
                $pathImage = $request->file('image')->store('avatars');
                $employee->image = $pathImage;
            }

            $user = $employee->user;
            $user->name = $request->get('login');
            $user->isAdmin = $request->get('isAdmin');
            if ($request->get('password') != null)
                $user->password = Hash::make($request->get('password'));
            $user->save();

            $employee->save();
            return redirect(route('employees.index'));
        } else {
            return response(view('404'), 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if(isset($employee)) {
            $user = $employee->user;
            $employee->delete();
            $user->delete();
            return redirect(route('employees.index'));
        } else {
            return response(view('404'), 404);
        }
    }
}
