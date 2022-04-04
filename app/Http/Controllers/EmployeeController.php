<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
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

    public function adminIndex()
    {
        $staff = Employee::get();

        $staff->map(function ($item) {
            $item->editRoute = '/admin/employees/' . $item->id . '/edit';
            $item->deleteRoute = '/admin/employees/' . $item->id;
        });

        return view("admin.pages.staff.index", ["staff" => $staff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.staff.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'category' => 'required|numeric',
        ]);

        if (! $request->file('image'))
            abort(500, 'Could not upload image :(');

        $employee = Employee::create($request->all());

        $image = $request->file('image');
        $input['imagename'] = $employee->id.'.jpg';

        $destinationPath = public_path('/img/staff');
        $img = Image::make($image->getRealPath());
        $img->resize(640, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $request->flash();

        return redirect("/admin/employees")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view("admin.pages.staff.create", ["old" => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = $employee->id . '.jpg';

            $destinationPath = public_path('/img/staff');
            $img = Image::make($image->getRealPath());
            $img->resize(480, 480, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);
        }

        return redirect()->to("/admin/employees")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back()->with("success", "Операция успешно выполнена!")->withInput();
    }
}
