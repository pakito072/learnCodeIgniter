<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;


/**
 * AuthController class handles user authentication, including login, registration, and session management.
 * It provides functionality for validating user credentials, creating new accounts, and managing user sessions.
 * This controller ensures that users can securely log in and out, while also handling the creation of new user accounts.
 * 
 * 
 * @package  App\Controllers
 * @category Authentication
 */
class AuthController extends BaseController
{


  /**
   * Displays the registration form view.
   * This method is responsible for rendering the view where users can register a new account.
   * It doesn't handle any form submission or validation, it simply returns the view for the registration page.
   *
   * @return string The rendered view of the registration page.
   */
  public function register(): string
  {
    return view('register');
  }

  /**
   * @return ResponseInterface|string
   */
  public function processRegister(): ResponseInterface|string
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
      'name' => formatText($this->request->getPost('name')),
      'email' => $this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'rol' => 'Admin',
    ]);

    return redirect()->to('/login')->with('success', 'Usuario registrado correctamente.');
  }

  /**
   * @return string
   */
  public function login(): string
  {
    return view('login');
  }


  /**
   * @return ResponseInterface|string
   */
  public function processLogin(): ResponseInterface|string
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

    return redirect()->to('/login');
  }

  /**
   * @return ResponseInterface
   */
  public function logout(): ResponseInterface
  {
    $session = session();
    $session->destroy();

    return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
  }

  /**
   * @return string
   */
  public function dashboard(): string
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
