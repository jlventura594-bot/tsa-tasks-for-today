<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            $username = trim((string) $this->request->getPost('username'));
            $password = (string) $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if (
                $user &&
                !empty($user['password']) &&
                password_verify($password, $user['password'])
            ) {
                session()->regenerate(true);
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'logged_in' => true,
                ]);

                return redirect()->to('/');
            }

            return redirect()->back()->with('error', 'Invalid username or password.');
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}