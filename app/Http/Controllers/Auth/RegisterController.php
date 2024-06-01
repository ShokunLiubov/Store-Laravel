<?php

namespace App\Http\Controllers\Auth;

use App\Dto\Auth\RegisterDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\Service\AuthService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

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
     * Where to redirect users after register.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected AuthService $authService )
    {
        $this->middleware('guest');
    }

    /**
     * @throws UnknownProperties
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $roleId = Role::query()
            ->where('role', \App\Enum\User\Role::USER)
            ->firstOrFail()
            ->id;

        $userDto = new RegisterDto([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roleId' => $roleId
        ]);

        $user = $this->authService->create($userDto);
        event(new Registered($user));
        Auth::login($user);

        return redirect($this->redirectTo);
    }

    public function showRegistrationForm(): View
    {
        $action = 'register';

        return view('page.public.auth', compact('action'));
    }
}
