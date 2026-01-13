<?php

namespace App\Controllers;

use App\Models\DbUserModel;

class Connexion extends BaseController
{
    public function index($erreur = null)
    {
        $mail = $this->request->getPost('mail');

        $session = \Config\Services::session();

        $session->set('mail', $mail);

        $data['erreur'] = $erreur;
        return view('connexion_view', $data);
    }

    public function connexion() {

        $mail = $this->request->getPost('mail');
        
        $password = $this->request->getPost('password');

        $dbUserModel = new DbUserModel();

        $user = $dbUserModel->where('mail', $mail)->first();

        if ($user == null) {
            return $this->index(true);
        }

        if ($user->mdp != $password) {
            return $this->index(true);
        }

        $session = \Config\Services::session();

        $session->set('id', $user->id);
        $session->set('nom', $user->nom);
        $session->set('prenom', $user->prenom);
        $session->set('mail', $mail);
        $session->set('role', $user->role);

        return redirect()->to(base_url('/'));
    }

    public function forgotPassword() {
        return view('mdp_oubli_view');
    }

    public function verifyInfo() {
        return view('info_a_verifier_view');
    }

    public function deconnexion() {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}