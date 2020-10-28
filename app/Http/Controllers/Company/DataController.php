<?php

namespace App\Http\Controllers\company;

use App\City;
use App\CityCompany;
use App\Company;
use App\CompanyDate;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{


    public function index()
    {
        $company_id = auth()->guard('company')->user()->company_id;
        $company = Company::findOrFail($company_id);

        $company_dates = CompanyDate::where('company_id', $company_id)->first();
        $comp_days = [];
        $from_time = null;
        $to_time = null;
        if($company_dates){
            //convert string from database to array//
            $comp_days = explode(',', $company_dates->days);
            $from_time = $company_dates->from_time;
            $to_time = $company_dates->to_time;
        }

        $cities = City::all();
        $city_companies = CityCompany::where('company_id', $company_id)->get()->pluck('city_id')->toArray();

        return view('company.myinformation.index',compact('company', 'company_dates', 'comp_days', 'from_time', 'to_time', 'cities', 'city_companies'));
    }

    public function update(Request $request, $company_id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'cities' => 'required',
            'days' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
        ];
        $company = Company::find($company_id);
        $company->update($data);

        $data2 = [
            'company_id' => $company_id,
            'days' => implode(',', $request->days),
            'from_time' => $request->from_time,
            'to_time' => $request->to_time,
        ];
        CompanyDate::updateOrCreate(['company_id'=>$company_id],$data2);

        if($request->filled('password')){
            $this->validate($request, ['password' => 'required|confirmed|min:6']);

            $rep = Representative::where('company_id', $company_id)
                ->where('role', 'responsible')->first();

            $rep->update([bcrypt($request->password)]);
        }

        /* cities adding */
        $company->CityCompany()->sync($request->cities);

        return redirect(url('company/mydata'))->with('success', 'تم التعديل بنجاح');
    }
}
