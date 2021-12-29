<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     * DELETE {{base_url}}/api/users/14
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->delete()) {
                return response()->json(['status' => 'success', 'message' => 'User deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
