<?php

namespace App\Http\Controllers\Admin;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStaffRequest;
use App\Http\Requests\Admin\UpdateStaffRequest;

class StaffController extends Controller
{
    /**
     * Display a listing of Staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('staff_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('staff_delete')) {
                return abort(401);
            }
            $staff = Staff::onlyTrashed()->get();
        } else {
            $staff = Staff::all();
        }

        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating new Staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('staff_create')) {
            return abort(401);
        }
        
        $titles = \App\Title::get()->pluck('title_kh', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $department_codes = \App\Department::get()->pluck('name_kh', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.staff.create', compact('titles', 'department_codes'));
    }

    /**
     * Store a newly created Staff in storage.
     *
     * @param  \App\Http\Requests\StoreStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        if (! Gate::allows('staff_create')) {
            return abort(401);
        }
        $staff = Staff::create($request->all());



        return redirect()->route('admin.staff.index');
    }


    /**
     * Show the form for editing Staff.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('staff_edit')) {
            return abort(401);
        }
        
        $titles = \App\Title::get()->pluck('title_kh', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $department_codes = \App\Department::get()->pluck('name_kh', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $staff = Staff::findOrFail($id);

        return view('admin.staff.edit', compact('staff', 'titles', 'department_codes'));
    }

    /**
     * Update Staff in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, $id)
    {
        if (! Gate::allows('staff_edit')) {
            return abort(401);
        }
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());



        return redirect()->route('admin.staff.index');
    }


    /**
     * Display Staff.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('staff_view')) {
            return abort(401);
        }
        $staff = Staff::findOrFail($id);

        return view('admin.staff.show', compact('staff'));
    }


    /**
     * Remove Staff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('staff_delete')) {
            return abort(401);
        }
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('admin.staff.index');
    }

    /**
     * Delete all selected Staff at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('staff_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Staff::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Staff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('staff_delete')) {
            return abort(401);
        }
        $staff = Staff::onlyTrashed()->findOrFail($id);
        $staff->restore();

        return redirect()->route('admin.staff.index');
    }

    /**
     * Permanently delete Staff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('staff_delete')) {
            return abort(401);
        }
        $staff = Staff::onlyTrashed()->findOrFail($id);
        $staff->forceDelete();

        return redirect()->route('admin.staff.index');
    }
}
