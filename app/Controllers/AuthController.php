<?php

namespace App\Controllers;

use App\Models\UserModel;


class AuthController extends BaseController
{

  public function register()
  {
    return view('register');
  }

  public function processRegister()
  {
    helper(['form', 'url']);

    $rules = [
      'name' => 'required|min_length[3]|max_length[50]',
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required|min_length[6]',
      'password_confirm' => 'required|matches[password]',
    ];

    if (!$this->validate($rules)) {
      return view('register', ['validation' => $this->validator]);
    }

    $userModel = new UserModel();
    $userModel->save([
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'rol' => 'Admin',
    ]);

    return redirect()->to('/login')->with('success', 'Usuario registrado correctamente.');
  }

  public function login()
  {
    return view('login');
  }


  public function processLogin()
  {
    helper(['form', 'url']);
    $session = session();

    $rules = [
      'email' => 'required|valid_email',
      'password' => 'required'
    ];

    if (!$this->validate($rules)) {
      return view('login', [
        'validation' => $this->validator,
      ]);
    }

    $userModel = new UserModel();
    $user = $userModel->findByEmail($this->request->getPost('email'));

    if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
      $session->set([
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'rol' => $user['rol'],
        'isLoggedIn' => true,
        'created_at' => $user['created_at'],
      ]);

      return redirect()->to('/dashboard')->with('success', 'Inicio de sesión exitoso.');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();

    return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
  }

  public function dashboard()
  {
    $session = session();
    $data = [
      'id' => $session->get('id'),
      'name' => $session->get('name'),
      'email' => $session->get('email'),
      'rol' => $session->get('rol'),
      'created_at' => $session->get('created_at'),
    ];
    return view('dashboard', $data);
  }
}
