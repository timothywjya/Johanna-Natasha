<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view('users');
    }

    public function getDataUser()
    {
        try {
            $data = DB::table('users')
                ->select('name', 'username', 'id')
                ->get();

            return response()->json([
                "status" => "success",
                "data" => $data,
                "message" => "Get Data Successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "errormessage" => $e->getMessage(),
                "message" => "Failed to Get Data"
            ], 400);
        }
    }

    public function createDataUser(Request $req)
    {
        $data = [
            'name' => $req->name,
            "username" => $req->username,
            "role_id" => $req->role_id,
            "password" => bcrypt($req->password)
        ];

        try {
            DB::beginTransaction();

            DB::table('users')
                ->insert($data);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Create User Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => "error",
                "message" => "Failed to Crate Data User",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }

    public function editDataUser(Request $req)
    {
        try {
            $data = DB::table('users')
                ->select('name', 'username')
                ->where('id', $req->ids)
                ->get();

            return response()->json([
                "status" => "success",
                "data" => $data,
                "message" => "Get Data Successfully"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "errormessage" => $e->getMessage(),
                "message" => "Failed to Get Data"
            ], 400);
        }
    }

    public function updateDataUser(Request $req)
    {
        $data = [
            'name' => $req->name,
            "username" => $req->username,
            "role_id" => $req->role_id,
            "password" => bcrypt($req->password)
        ];

        try {
            DB::beginTransaction();

            DB::table('users')
                ->where('id', $req->id)
                ->update($data);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Update User Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => "error",
                "message" => "Failed to Update Data User",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }

    public function deleteDataUser(Request $req)
    {
        DB::beginTransaction();

        try {
            User::where('id', $req->id)
                ->delete();

            DB::commit();
            return response()->json([
                "status" => "success",
                "message" => "Delete Data User Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => "error",
                "message" => "Failed to Delete Data User",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }

    public function restoreDataUser(Request $req)
    {
        DB::beginTransaction();

        try {
            User::where('id', $req->id)
                ->restore();

            DB::commit();
            return response()->json([
                "status" => "success",
                "message" => "Restore User Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => "error",
                "message" => "Failed to Restore Data User",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }
}
