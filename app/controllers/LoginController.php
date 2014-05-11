<?php



class LoginController extends BaseController
{
    public function __construct() {
    }

    public function getIndex() {
        return View::make('login');
    }

    public function login() {
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'));

        if (Auth::attempt($user)) {
            return Redirect::to('/');
        }
        // authentication failure! lets go back to the login page
        return Redirect::route('login')->with('error', '!!Your username/password combination was incorrect.')->withInput();
    }

    public function logout() {
        // todo: cleanup session
        Redirect::to('/');
    }
}