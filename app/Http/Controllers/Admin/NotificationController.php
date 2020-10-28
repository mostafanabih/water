<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Notifications\SystemNoti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{

    public function notify(){
        $clients = Client::select("id","name")->get();
        return view('admins.notifications' , compact('clients'));
    }


    public function notification(Request $request)
    {
        $rules = [
          'client_id' => 'required',
            'text' => 'required',
        ];
        $messages = [
            'client_id.required'=>'مطلوب إدخال إسم العميل',
            'text.required'=>'مطلوب إدخال المحتوي'
        ];
        $notify = $this->validate($request,$rules,$messages);


        if ( $request->optionsRadios == 2 ){

            $client = Client::where('id', $request->client_id)->first();
            if ($client){
                $text = $request->text;
                $client->notify( new SystemNoti()) ;
            }else{
                return back();
            }
        }else{
            $clients = Client::all();
            $n_data = [];
            $n_data['text'] = $request->text;


            foreach ( $clients as $client ){
                $n_data['client_id'] = $request->client_id;
                $text = $request->text;
                $client->notify( new SystemNoti()) ;
            }

//            Notification::send($clients, new SendNotifications($n_data));
        }



//        Notification::create($request->all());
        return back()->with('success','تم الارسال بنجاح');

    }
}
