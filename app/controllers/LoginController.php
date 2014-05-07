<?php

class LoginController extends BaseController
{
    public function __construct() {
    }

    public function index() {
    }

    public function login() {
        return View::make('login');
    }

    public function logout() {
        // todo: cleanup session
        Redirect::to('/');
    }
}