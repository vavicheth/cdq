<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Requests\Admin\StoreStatisticsRequest;
use App\Http\Requests\Admin\UpdateStatisticsRequest;
use App\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatisticsRequest $request)
    {
        $b=Department::where('id','=', $request['department_id'])->pluck('beds')->first();
        if($b==null){
            $b=0;
        }
        $request['beds']=$b;
        $request['dispo']=$request['beds'] - ($request['rt_payant'] + $request['rt_gratuit'] + $request['rt_credit'] + $request['rt_bss'] + $request['rt_hef'] + $request['rt_indigent']);
        $stat=$request->all();
        Statistic::create($stat);

        return redirect('admin\duty\\'.$request->duty_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

//        dd('test');

        $statistics = Statistic::find($id);
        $duty=$statistics->where('id','=',$id)->pluck('duty_id')->first();
        $departments = Department::orderBy('name','asc')->pluck('name', 'id');

        return view('/admin/statistic/edit', compact('statistics','departments','duty'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatisticsRequest $request, $id)
    {
//        dd($request->all());
        $statistic= Statistic::findOrFail($id);

        $b=Department::where('id','=', $request['department_id'])->pluck('beds')->first();
        if($b==null){
            $b=0;
        }
        $request['beds']=$b;
        $request['dispo']=$request['beds'] - ($request['rt_payant'] + $request['rt_gratuit'] + $request['rt_credit'] + $request['rt_bss'] + $request['rt_hef'] + $request['rt_indigent']);

        $statistic->Update($request->all());

        return redirect()->action('Admin\DutyController@show',$request->duty_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statistic=Statistic::findOrFail($id);
        $statistic->delete();

        return redirect()->back();
    }
}
