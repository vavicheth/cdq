<?php

namespace App\Http\Controllers\Api\V1;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStaffRequest;
use App\Http\Requests\Admin\UpdateStaffRequest;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
    public function index()
    {
        return Staff::all();
    }

    public function show($id)
    {
        return Staff::findOrFail($id);
    }

    public function update(UpdateStaffRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        

        return $staff;
    }

    public function store(StoreStaffRequest $request)
    {
        $staff = Staff::create($request->all());
        

        return $staff;
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return '';
    }
}
