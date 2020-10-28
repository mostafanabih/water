<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::where('admin_agree', 'not_agree')->paginate(10);
        return view('admins.company_register',compact('companies'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::findOrFail($id);
        $data->delete();
        return redirect(route('company_register.index'))->with('success', 'تم الحذف بنجاح');
    }

    public function agreeComp(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $msg = 'تمت عدم الموافقة على طلب التسجيل بنجاح';
        $active = 'not_active';
        if($request->status == 'agree'){
            $msg = 'تمت الموافقة على طلب التسجيل بنجاح';
            $active = 'active';
        }
        $company->update([
            'admin_agree'=>$request->status,
            'active'=>$active
        ]);
        $Representatives = Representative::where('company_id', $id)->get();
        foreach($Representatives as $Representative){
            $Representative->update(['active'=>$active]);
        }

        return redirect('admin/company_register')->with('success', $msg);
    }
}
