<?php

use Illuminate\Support\Facades\Route;
// use Vemcogroup\SmsApi\SmsApi;

use Smsapi\Client\Curl\SmsapiHttpClient;
use Smsapi\Client\SmsapiClient;
use Smsapi\Client\Service\SmsapiComService;
use Smsapi\Client\Feature\Sms\Bag\SendSmsBag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    // SmsApi::send('+8801533149024', 'prince', 'HI Prince'); // use Vemcogroup\SmsApi\SmsApi;

    $client = new SmsapiHttpClient();

    $apiToken = env('SMSAPI_TOKEN');

    $service = $client->smsapiComService($apiToken);

    $sms = SendSmsBag::withMessage('+8801533149024', 'Its okay now');
    $sms->from = 'Test';
    $sms->encoding = 'utf-8';

    $service->smsFeature()->sendSms($sms);

    return 'ok';

});
