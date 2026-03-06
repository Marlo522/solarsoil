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
                return redirect()->to(base_url('/'));
            }
        }
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

                return $this->check();
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
        $usermodel = model('UserModel');
        $data = [
            'role' => $this->request->getPost('role') ?? 'consumer',
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name') ?: null,
            'last_name' => $this->request->getPost('last_name'),
            'suffix' => $this->request->getPost('suffix') ?: null,
            'email' => $this->request->getPost('email'),
            'contact_number' => $this->request->getPost('contact_number'),
            'address' => $this->request->getPost('address'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'confirm_password' => $this->request->getPost('confirm_password'),
        ];
        
        if($data['password'] != $data['confirm_password']){
            session()->setFlashdata('error', 'Passwords do not match');
            return redirect()->back()->withInput();
        }

        $usermodel->insert($data);

        return redirect()->to(base_url('/login'));
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
?>