<?php

namespace App\Forms;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TokenForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required',
        ];
    }
    public function generate()
    {
        $validator = Validator::make($this->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);
        $validated = $validator->validated();
        $user = User::where('email', $validated['email'])->first();
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();
        return $user->createToken('bearer_token')->plainTextToken;
    }
}
