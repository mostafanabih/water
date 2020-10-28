<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Order;
use App\Representative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reps = Representative::where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })
            ->where('role', 'representative')->paginate(10);

        $companies = Company::all();
        return view('admins.representative',compact('reps','companies'));
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
        $reps = Representative::where("company_id",$id)
            ->where('role', 'representative')->paginate(10);
//        return $reps;
        $companies = Company::all();

        return view('admins.representative', compact('reps','companies'));

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

        $data = Representative::findOrFail($id);


        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'company_id' => 'required'

        ]);
//dd($request->all());
        $data->update($request->all());
        $data->save();

        return redirect(url('admin/representative  '))->with('success','تم التعديل بنجاح');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Representatives = Order::where('representative_id', $id)->get()->count();
        if($Representatives > 0){
            return back()->with('error', 'لا يمكن حذف المندوب لوجود تعاملات معه');
        }

        $data = Representative::findOrFail($id);
        $data->delete();
        return back()->with('success','تم الحذف بنجاح');
    }

    public function changePassword(Request $request, $id)
    {

        $rules = [
            'password' => 'required|confirmed',
        ];
        $this->validate($request, $rules);
        $rep = Representative::where(['id'=>$id,'role'=>'responsible'])->first();

        $rep->password = bcrypt($request->input('password'));
        $rep->save();
        return back()->with('success', 'تم تحديث كلمه المرور');
    }
    public function stoprep(Request $request, $id){
        $data = Representative::findOrFail($id);
        $data->update(['active'=>$request->status]);
        return redirect(url('admin/representative'))->with('success','تمت العمليه بنجاح');
    }
}
