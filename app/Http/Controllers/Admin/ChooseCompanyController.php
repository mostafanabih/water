<?php

namespace App\Http\Controllers\Admin;

use App\ChooseCompany;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChooseCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::selectRaw('id,name')->get();
        $choose_companies = ChooseCompany::get();
        $arr = $choose_companies->pluck('company_id')->toArray();
        return view('admins.choose_companies', compact('choose_companies','companies','arr'));
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
        if($request->has('companies')){
            ChooseCompany::get()->each->delete();

            foreach($request->companies as $company){
                $data[] = ['company_id'=>$company];
            }
            ChooseCompany::insert($data);

            return back()->with('success', 'تم الحفظ بنجاح');
        }
        return back()->with('error', 'يجب اختيار شركة واحدة على الاقل');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChooseCompany  $chooseCompany
     * @return \Illuminate\Http\Response
     */
    public function show(ChooseCompany $chooseCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChooseCompany  $chooseCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(ChooseCompany $chooseCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChooseCompany  $chooseCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChooseCompany $chooseCompany)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChooseCompany  $chooseCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChooseCompany $chooseCompany)
    {
        //
    }
}
