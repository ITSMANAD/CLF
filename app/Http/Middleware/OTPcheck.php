<?php

namespace App\Http\Middleware;

use App\Models\codes;
use App\Models\User;
use Closure;
use Cryptommer\Smsir\Classes\Smsir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class OTPcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $smsir;

    public function __construct(){
        $this->smsir = new Smsir();
    }
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (\auth()->check()){
            if (\auth()->user()->active == 0){
            $codes = codes::all()->whereIn('UserID',\auth()->user()->id);
            if (count($codes) == 0){
                $mobile = $user->phone;
                $code_number = rand(1,9999);
                $parameter = new \Cryptommer\Smsir\Objects\Parameters('CODE', $code_number);
                $parameters = array($parameter) ;
                $response = $this->smsir->Send()->Verify($mobile, 289653, $parameters);
                $code = new codes();
                $code->UserID = $user->id;
                $code->Code = $code_number;
                $code->Status = $response->Status;
                $code->save();
            }

            if ($request->is('OTP*')) {

            }else{
                if (!$user || !$user->active) {
                    // اگر کاربر احراز هویت نکرده باشد یا احراز هویت نکرده باشد، به صفحه OTP هدایت شود
                    return redirect('/OTP');
                }
            }
            }
        }

        return $next($request);


    }
}
