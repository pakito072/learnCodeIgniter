<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';

  protected $useTimestamps = true;

  protected $allowedFields = ['name', 'email', 'password', 'created_at', 'rol'];

  public function findByEmail(string $email){
    return $this->where('email', $email)->first();
  }
}