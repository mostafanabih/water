<?php
/**
 * Created by PhpStorm.
 * User: Sohib
 * Date: 5/19/16
 * Time: 9:03 PM
 */

namespace Moyasar;


class Invoice
{
    const AMOUNT = "amount";
    const CURRENCY = "currency";
    const DESCRIPTION = "description";
    const CALLBACK_URL = "callback_url";
    const LOGO_URL = "logo_url";

    public static function create($amount, $description, $currency = "SAR")
    {
        $url = 'https://gitlab.com/';
        $shop = \DB::table('badr_shop')->where('serial_id', session('shop_id'))->first();
        $logo = config('app.badrshop_url') . $shop->logo_path;
        $data = [
            self::AMOUNT => $amount,
            self::DESCRIPTION => $description,
            self::CURRENCY => $currency,
            self::CALLBACK_URL => $url,
            self::LOGO_URL => $logo,

        ];

        return json_decode(Client::post("https://api.moyasar.com/v1/invoices", $data));
    }

    public static function fetch($id){
        return json_decode(Client::get("https://api.moyasar.com/v1/invoices/$id"));
    }

    public static function all(){
        return json_decode(Client::get("https://api.moyasar.com/v1/invoices"));
    }

    public static function update($id,$parameter = [] ){
	    return json_decode(Client::put("https://api.moyasar.com/v1/invoices/$id", $parameter));
    }

    public static function cancel($id){
	    return json_decode(Client::put("https://api.moyasar.com/v1/invoices/$id/cancel"));
    }
}
