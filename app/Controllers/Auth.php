<?php
namespace App\Controllers;

class Auth extends BaseController
{
    public function check()
    {
        if(session()->get('isLoggedIn')) {
            if(session()->get('role') == 'admin'){
                return redirect()->to(base_url('/admin_dashboard'));
            }else{
                return redirect()->to(base_url('/farmer_dashboard'));
            }
        }
        return view('pages/login');
    }

    public function login()
    {
        $usermodel = model('UserModel');

        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $user  = $usermodel->where('email', $data['email'])->first();

        if($user){
            if(password_verify($data['password'], $user['password'])){
                session()->set('isLoggedIn', true);
                session()->set('role', $user['role']);
                session()->set('user_id', $user['user_id']);

                $this->check();
            }else{
                session()->setFlashdata('error', 'Incorrect password');
                return redirect()->back()->withInput();
            }
        }else{
            session()->setFlashdata('error', 'User not found');
            return redirect()->back()->withInput();
        }
    }

    public function register()
    {
        return view('pages/register');
    }
}
?>