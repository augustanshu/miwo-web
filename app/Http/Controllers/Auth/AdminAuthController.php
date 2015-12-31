<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use User;

class AdminAuthController extends Controller
{
	 use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	 
	  /**
     * Redirect path after login or register.
     */
    protected $redirectPath = 'admin';

    /**
     * Redirect path after unsucessful attempt.
     */
    protected $loginPath = 'auth/admin/login';

    /**
     * Create a new password controller instance.
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	   public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->setupTheme(config('cms.themes.admin.theme'), config('cms.themes.admin.layout'));
    }
    /**
     * Show the login form.
     *
     * @return HTML
     */
    public function getLogin()
    {
        $this->theme->layout('blank');

        return $this->theme->of('admin::user.login')->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getLogout()
    {
        User::logout();
        event('user.logout');
        return redirect()->to($this->loginPath);
		
    }
}
