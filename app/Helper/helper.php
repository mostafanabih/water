<?php

function isActiveRoute($route, $output = 'active')
{
    if (Route::currentRouteName() == $route) {
        return $output;
    }
}

function sendNoteClient($tokens = [], $contents, $data = [])
{
    //FCM api URL
    $url = 'https://fcm.googleapis.com/fcm/send';
    //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
    $server_key = 'AIzaSyDNq2dB4oPmpUlQPUd1oLRTLXMDbnIv4u0';

    //header with content_type api key
    $headers = array(
        'Content-Type:application/json; charset=utf-8',
        'Authorization:key='.$server_key
    );

    $notification = [
        'body' => $contents,
        'click_action' => 'MAIN_ACTIVITY',
        'sound' => true,
    ];

    $fields = [
        'registration_ids' => $tokens, //multple token array
//        'to'        => $tokens, //single token
        'notification' => $notification,
        'data' => $data
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

function sendNoteRep($tokens = [], $contents, $data = [])
{
    //FCM api URL
    $url = 'https://fcm.googleapis.com/fcm/send';
    //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
    $server_key = 'AIzaSyBHAIVOuRMHUJ3JTvk41Tz909uPr8dm4WE';

    //header with content_type api key
    $headers = array(
        'Content-Type:application/json; charset=utf-8',
        'Authorization:key='.$server_key
    );

    $notification = [
        'body' => $contents,
        'click_action' => 'MAIN_ACTIVITY',
        'sound' => true,
    ];

    $fields = [
        'registration_ids' => $tokens, //multple token array
//        'to'        => $tokens, //single token
        'notification' => $notification,
        'data' => $data
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}