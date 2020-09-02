<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\Providers\RouteServiceProvider;
    use App\User;
    use Illuminate\Foundation\Auth\RegistersUsers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Validation\Rule;

    class RegisterController extends Controller {
        use RegistersUsers;

        protected $redirectTo = RouteServiceProvider::EVAL;

        public function __construct() {
            $this->middleware('guest');
        }

        protected function validator(array $data) {
            return Validator::make($data, [
                'name' => '',
                'dob' => ['required', 'date', 'before:16 years ago'],
                'genero' => ['required', 'alpha', Rule::in(['f', 'm', 'o', 'p'])],
                'pais' => ['required', 'string', 'max:255'],
                'ciudad' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'terminos' => ['required', 'accepted'],
            ]);
        }

        protected function create(array $data) {
            return User::create([
                'name' => 'anon',
                'dob' => $data['dob'],
                'genero' => $data['genero'],
                'pais' => $data['pais'],
                'ciudad' => $data['ciudad'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
    }
