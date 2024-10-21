<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class RoleController extends Controller
{
    public function getDataRole()
    {
        try {
            $data = DB::table('roles')
                ->select('name')
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

    public function createDataRole(Request $req)
    {
        $data = [
            'name' => $req->name,
        ];

        try {
            DB::beginTransaction();

            DB::table('roles')
                ->insert($data);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Create Data Role Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => "error",
                "message" => "Failed to Crate Data Role",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }

    public function editDataRole(Request $req)
    {
        try {
            $data = DB::table('roles')
                ->select('name')
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
                "message" => "Failed to Edit Data"
            ], 400);
        }
    }

    public function updateDataRole(Request $req)
    {
        $data = [
            'name' => $req->name,
        ];

        try {
            DB::beginTransaction();

            DB::table('roles')
                ->where('id', $req->id)
                ->update($data);

            DB::commit();

            return response()->json([
                "status" => "success",
                "message" => "Update Role Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => "error",
                "message" => "Failed to Update Data Role",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }

    public function deleteDataRole(Request $req)
    {
        DB::beginTransaction();

        try {
            Role::where('id', $req->id)
                ->delete();

            DB::commit();
            return response()->json([
                "status" => "success",
                "message" => "Delete Data Role Successfully"
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => "error",
                "message" => "Failed to Delete Data Role",
                "errormessage" => $e->getMessage()
            ], 400);
        }
    }
}
