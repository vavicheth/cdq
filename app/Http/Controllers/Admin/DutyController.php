<?php

namespace App\Http\Controllers\Admin;


use App\Datadefault;
use App\Department;
use App\Duty;
use App\Http\Requests\Admin\StoreDutiesRequest;
use App\Http\Requests\Admin\UpdateDutiesRequest;
use App\Staff;
use App\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duties=Duty::orderBy('date','desc')->get();
        $staff=Staff::all();

        return view('admin.duty.index', compact('duties','staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::orderBy('name_kh','asc')->pluck('name_kh', 'id');
        $datadefault=Datadefault::all();

        return view('admin.duty.create', compact('staff','datadefault'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDutiesRequest $request)
    {

//        dd($request->all());
        $duty=$request->all();

        $duty['date']= date('Y-m-d', strtotime($request->date));

        $duties=Duty::create($duty);
        $duties->staff()->attach($request->duty_staff);

        return redirect('admin/duty');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $duty= Duty::findOrFail($id);
//        $statistics=$duty->statistic;

        $statistics=$duty->statistic()->with('department')->get()
            ->sortBy(function ($statistic){
                return $statistic->department->order;
            });

        $departments = Department::where('beds','>','0')-> orderBy('order','asc')->pluck('name', 'id');

//        dd($statistics);

        return view('admin.duty.show', compact('duty','statistics','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $duties = Duty::find($id);
//        $staffs = Staff::orderBy('name_kh','asc')->pluck('name_kh', 'id');
        $staffm=Staff::orderBy('name_kh','asc')->get();
        $staffs = $staffm->pluck('name_kh', 'id');

        return view('admin.duty.edit', compact('duties','staffs','staffm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDutiesRequest $request, $id)
    {
        $duty= Duty::findOrFail($id);
        $request['date']=date('Y-m-d',strtotime($request->date));
        $duty->Update($request->all());
        $duty->staff()->sync($request->duty_staff);
        return redirect()->route('admin.duty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $duty=Duty::findOrFail($id);
        $duty->delete();

        return redirect('/admin/duty');
    }


    public function print($id)
    {
        $duty= Duty::findOrFail($id);
        $statistics=$duty->statistic()->with('department')->get()
            ->sortBy(function ($statistic){
                return $statistic->department->order;
            });
        $departments = Department::orderBy('name','asc')->pluck('name', 'id');

        /**
         * Total Beds
         */
        $totalBed=Department::all();
        $totalBed=$totalBed->sum('beds');

        return view('admin.duty.print', compact('duty','statistics','departments','totalBed'));


    }

}
