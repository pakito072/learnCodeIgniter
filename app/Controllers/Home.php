<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('custom_view');
    }

    public function getUsers()
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->findAll();
        return view('user_list', ['users'=> $users]);
    }
}
