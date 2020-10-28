<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::where(function ($q) {
        if (request()->input('search')) {
            $q->where('name', 'like', '%' . request()->search . '%');
        }
    })->paginate(10);

        return view('admins.clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $clients =[
            'name' => 'required',
            'mobile' => 'required',
        ];
        $message =[
            'name.required'=>'The client_name is Required',
            'mobile.required'=>'The mobile is Required',
        ];
        $this->validate($request,$clients,$message);
        $data = Client::create($request->all());
        $data->save();
        //flash()->success("تم الاضافه بنجاح");
        return redirect(url('admin/client  '))->with('success','تم الاضافه بنجاح');
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
    public function edit(Request $request, $id)
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

        $data = Client::findOrFail($id);


        $clients = $this->validate(request(),[
            'name' => 'required',
            'mobile' => 'required',

        ]);
        $data->update($request->all());

        $data->save();

        return redirect(url('admin/client  '))->with('success','تم التعديل بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Client::findOrFail($id);
        $data->delete();
        return redirect(route('client.index'))->with('success', 'تم الحذف بنجاح');
    }

    public function stopClient(Request $request, $id)
    {
//        dd($request->all());
        $data = Client::findOrFail($id);
        $data->update(['stop'=>$request->status]);

        return redirect(url('admin/client'))->with('success','تمت العمليه بنجاح');
    }

}
