<?php
namespace App\Http\Controllers;
use App\Models\Token;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $user = $request->input('username');
        $password = $request->input('password');
        $login = Login::query()->firstWhere(['username' => $user]);
        if ($login == null){
            return $this->responseHasil(400, false, 'User tidak ditemukan');
        } if (!Hash::check($password, $login->password)){
            return $this->responseHasil(400, false, 'Password tidak valid');
        }
        $auth = Token::create([
            'login_id' => $login->id,
            'auth' => $this->RandomString(), ]);
            if (!$auth) { return $this->responseHasil(401, false, 'Unauthorized');
            } $data = [
                'token' => $auth->auth,
                'user' => ['id' => $login->id,
                ]
            ];
        return $this->responseHasil(200, true, $data);
    }
    private function RandomString($length = 100)
    {
        $karakter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakter);
        $str = '';
        for ($i = 0; $i < $length; $i++){
            $str .= $karakter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }
}
