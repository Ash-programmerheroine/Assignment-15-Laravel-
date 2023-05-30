<?php

namespace App\Http\Controllers;

use App\Rules\MinLength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', new MinLength(2)],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', new MinLength(8)],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Proceed with registration if the validation passes
        // ...
    }
}

