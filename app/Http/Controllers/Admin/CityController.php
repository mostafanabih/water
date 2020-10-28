<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\CityCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::query();
        if($request->filled('search')){
            $cities = $cities->where('name', 'LIKE', '%'.$request->search.'%');
        }
        $cities = $cities->paginate(10);

        return view('admins.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $this->validate($request,['name'=>'required|unique:cities|max:200']);

        City::create($request->all());

        return back()->with('success', 'تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('admins.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request,['name'=>'required|max:200|unique:cities,name,'.$city->id]);

        $city->update($request->all());

        return back()->with('success', 'تم التعديل  بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city_companies = CityCompany::where('city_id', $city->id)->get()->count();
        if($city_companies > 0){
            return back()->with('error', 'لا يمكنك حذف هذه المدينة لوجود تعاملات بها');
        }

        $city->delete();
        return back()->with('success', 'تم الحذف  بنجاح');
    }
}
