<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function johanna()
    {
        return view('birthday');
    }

    public function getDataPictJ()
    {
        try {
            $data = DB::table('pictures')
                ->select('name')
                ->get();

            foreach ($data as $key => $value) {
            }

            return response()->json([
                "status" => "success",
                "data" => $data,
                "message" => "Get Data Successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to GEt Data",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function getDataVidsKJ()
    {
        try {
            $data = DB::table('videos')
                ->select('name')
                ->get();

            foreach ($data as $key => $value) {
            }

            return response()->json([
                "status" => "success",
                "data" => $data,
                "message" => "Get Data Successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to GEt Data",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function getDataSoundJ()
    {
        try {
            $data = DB::table('sounds')
                ->select('name')
                ->get();

            foreach ($data as $key => $value) {
            }

            return response()->json([
                "status" => "success",
                "data" => $data,
                "message" => "Get Data Successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Failed to GEt Data",
                "error" => $e->getMessage()
            ], 400);
        }
    }
}
