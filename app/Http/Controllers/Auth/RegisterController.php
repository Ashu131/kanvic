<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Models\Address;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/';
    protected function redirectTo()
    {
        Log::info(URL::previous());
        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            //'last_name' => 'required|string|max:255',
            'mobile' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
           // 'terms' => 'required',
            'user_email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        try {
            Mail::to($data['user_email'])->send(new UserRegistered($data['first_name']));
            //$this->CallAPI($data['mobile'], 'Thanks+for+registering+with+RATAN JAIPUR.+Start+an+exciting+shopping+journey+http://www.ratanjaipur.com');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        /*$user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['user_email'],
            'mobile' => $data['mobile'],
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
            'role' => 2,
            'password' => bcrypt($data['password']),
        ]);*/
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = '';
        $user->gender = $data['gender'];
        $user->email = $data['user_email'];
        $user->mobile = $data['mobile'];
        $user->address1 = $data['address1'];
        //$user->address2 = $data['address2'];
        $user->city = $data['city'];
        $user->state = strtolower($data['state']);
        $user->pincode = $data['pincode'];
        $user->role = 2;
        $user->password = bcrypt($data['password']);
        $user->save();


        $address = new Address();
        $address->user_id = $user->id;
        $address->name = $data['first_name'];
        $address->mobile = $data['mobile'];
        $address->address1 = $data['address1'];
        $address->gender = $data['gender'];
       // $address->address2 = $data['address2'];
        $address->city = $data['city'];
        $address->state = strtolower($data['state']);
        $address->country = '';
        $address->pincode = $data['pincode'];
        $address->default = 1;
        $address->save();

        return $user;
    }


    private function CallAPI($mobile, $message)
    {
        /*$url = "http://sms.b2bsms.co.in/API/WebSMS/Http/v1.0a/index.php?username=codesilver&password=Hc58Xd58&sender=CDSLVR";
        $url .= "&to=" . $mobile . "&message=" . $message . "&reqid=1&format={json|text}&route_id=60&sendondate=" . date("Y/m/d");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;*/
    }
}
