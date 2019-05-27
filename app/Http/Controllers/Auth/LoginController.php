<?php
namespace Doomus\Http\Controllers\Auth;
use Doomus\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Doomus\User;
use Doomus\Http\Controllers\CartController;
use Socialite;
use Doomus\Role;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();
        // dd($providerUser);
        $user = User::where('provider_id', $providerUser->getId())->first();

        if (!$user) {
            // add user to database
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'image' => 'user-placeholder.jpg',
                'name' => $providerUser->getName(),
                'provider_id' => $providerUser->getId(),
                'cart_id' => CartController::setCart(),
                'role_id' => Role::$ROLE_CLIENT,
                'provider_name' => $provider
            ]);
        } else {
            // login the user

            Auth::login($user, true);
        }

        return redirect("/");
    }
}