<?php

namespace App\Http\Controllers\Admin;

use App\FixedPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\New_;

class FixedPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = FixedPage::where(function ($q) {
            if (request()->input('search')) {
                $q->where('name', 'like', '%' . request()->search . '%');
            }
        })->paginate(10);
        return view('admins.page.index',compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages =[
            'title.required'=>'العنوان مطلوب',
            'body.required'=>'المحتوي مطلوب',
        ];
        $rules =[
            'title' => 'required|unique:fixed_pages',
            'body' => 'required',
        ];
        $this->validate($request,$rules,$messages);

        $slug = Str::slug($request->title, '-');

        $data = New FixedPage();
        $data->title = $request->input('title');
        $data->slug = $slug;
        $data->body = $request->input('body');
        $data->save();

        return redirect(url('/admin/page '))->with('success','تم الاضافه بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $page = FixedPage::findOrFail($id);

        return view('admins.page.display',compact('page'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = FixedPage::findOrFail($id);
        return view('admins.page.edit',compact('model'));
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
        $data = FixedPage::findOrFail($id);

        $this->validate($request,[
            'title' => 'required|unique:fixed_pages,title,'.$data->id,
            'body' => 'required',
        ]);

        $slug = Str::slug($request->title, '-');
        $request->merge(['slug'=>$slug]);

        $data->update($request->except('files'));

        return redirect(route('page.index'))->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FixedPage::findOrFail($id);
        $data->delete();

        return redirect(route('page.index'))->with('success','تم الحذف بنجاح');
    }



}
