<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\LogineService;
use App\Http\Traits\AuthTrait;
use App\Models\My_Parent;
use App\Models\Teacher;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    protected $logine;

    public function __construct(LogineService $logine)
    {
        $this->logine = $logine;
    }

    public function logineForm($type)
    {
        return view('auth.login', compact('type'));
    }


    public function login(LoginRequest $request)
    {
        if ($request->type == 'student') {

            return $this->logine->logine_student($request);
        } elseif ($request->type == 'parent') {

            return $this->logine->Logine_parent($request);
        } elseif ($request->type == 'teacher') {
            return  $this->logine->logine_teacher($request);
        } else {

            return $this->logine->logine_admin($request);
        }
    }

    public function destroy(Request $request, $guard): RedirectResponse
    {
        Auth::guard($guard)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
