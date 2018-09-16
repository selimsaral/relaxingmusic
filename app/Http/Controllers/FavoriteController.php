<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Songs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class FavoriteController extends Controller
{
    public function favoriteList(User $user)
    {
        try {

            $favorite_list = $user->FavoriteList()->get();

            return response()->json([
                'errorCode'    => 0,
                'errorMessage' => "",
                'result'       => $favorite_list
            ]);

        } catch (\Exception $exception) {

            return response()->json([
                'errorCode'    => 1,
                'errorMessage' => "Bilinmeyen Bir Sorun Oluştu",
                'result'       => ""
            ]);

        }
    }

    public function removeFavorite(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'song_id' => 'required|exists:songs,id',
        ]);

        if (!$validator->fails()) {
            try {
                $data = array(
                    'user_id' => $user->id,
                    'song_id' => $request->input('song_id')
                );

                Favorites::where($data)->delete();

                return response()->json([
                    'errorCode'    => 0,
                    'errorMessage' => "",
                    'result'       => "Bu Müzik Favori Listenizden Kaldırıldı"
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

    public function addFavorite(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'song_id' => 'required|exists:songs,id',
        ]);

        if (!$validator->fails()) {
            try {

                $data = array(
                    'user_id' => $user->id,
                    'song_id' => $request->input('song_id')
                );

                Favorites::firstOrNew($data);

                return response()->json([
                    'errorCode'    => 0,
                    'errorMessage' => "",
                    'result'       => "Bu Müzik Favori Listenize Eklendi"
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
