<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function categoryList(Request $request)
    {
        try {

            $category_list = Categories::all();

            return response()->json([
                'errorCode'    => 0,
                'errorMessage' => "",
                'result'       => $category_list
            ]);

        } catch (\Exception $exception) {
            \Log::info($exception);

            return response()->json([
                'errorCode'    => 1,
                'errorMessage' => "Bilinmeyen Bir Sorun Oluştu",
                'result'       => ""
            ]);

        }
    }

    public function categoryDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if (!$validator->fails()) {
            try {
                $song_list = Songs::where('category_id', $request->input('category_id'))->get();

                return response()->json([
                    'errorCode'    => 0,
                    'errorMessage' => "",
                    'result'       => $song_list
                ]);
            } catch (\Exception $exception) {
                \Log::info($exception);

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
