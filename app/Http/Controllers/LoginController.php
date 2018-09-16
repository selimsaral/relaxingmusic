<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'appuid'       => 'required|exists:users,appuid',
            'app_version'  => 'required',
            'lang_version' => 'required',
        ]);

        if (!$validator->fails()) {
            try {
                $appuid       = $request->input('appuid');
                $app_version  = $request->input('app_version');
                $lang_version = $request->input('lang_version');

                $new_token = str_random(32);
                $user      = User::where('appuid', $appuid)->first();

                $user->app_version       = $app_version;
                $user->lang_version      = $lang_version;
                $user->token             = $new_token;
                $user->token_expiry_date = Carbon::now()->addHour(24);
                $user->save();

                return response()->json([
                    'errorCode'    => 0,
                    'errorMessage' => "",
                    'result'       => array(
                        'token'                => $new_token,
                        'force_update'         => env('APP_VERSION') > $user->app_version ? 1 : 0,
                        'lang_update'          => env('LANG_VERSION') > $user->lang_version ? 1 : 0,
                        'current_app_version'  => env('APP_VERSION'),
                        'current_lang_version' => env('LANG_VERSION'),
                        'user_app_version'     => $user->app_version,
                        'user_lang_version'    => $user->lang_version,
                    )
                ]);

            } catch (\Exception $exception) {
                return response()->json([
                    'errorCode'    => 1,
                    'errorMessage' => "Bilinmeyen Bir Sorun Oluştu",
                    'result'       => ""
                ]);

            }
        } else {

            return response()->json([
                'errorCode'    => 2,
                'errorMessage' => "Eksik Parametre",
                'result'       => ""
            ]);

        }
    }
}
