<?php

namespace App\Controllers;

use App\Models\DbUserModel;

class Inscription extends BaseController
{
    public function index($erreur = null) {
        $data['erreur'] = $erreur;
        return view('inscription_view', $data);
    }

    public function inscription() {
        // Récupérer l'instance de la classe Request

        $nom = $this->request->getPost('nom');
        $prenom = $this->request->getPost('prenom');
        $mail = $this->request->getPost('mail'); // faudra vérifier que c'est bien un mail
        $mdp = $this->request->getPost('mdp');
        $confirmMdp = $this->request->getPost('confirmMdp');

        $session = \Config\Services::session();

        $session->set('nom', $nom);
        $session->set('prenom', $prenom);
        $session->set('mail', $mail);
        $session->set('role', 'client');

        $dbUserModel = new DbUserModel();

        // règles de validation
        $rules = [
            'mail' => 'required|valid_email'
        ];

        // vérifie que le mot de passe est bien le même et que l'email n'existe pas déjà
        if ($mdp != $confirmMdp) {

            return $this->index('mdp');

        } else if (!empty($dbUserModel->where('mail', $mail)->findAll())) {

            return $this->index('mail');

        } else if (!$this->validate($rules)) {

            return $this->index('mailInvalide');

        } else {

            $nvUser = new \App\Entities\UserEntity();

            $nvUser->nom = $nom;
            $nvUser->prenom = $prenom;
            $nvUser->mail = $mail;
            $nvUser->mdp = $mdp;
            $nvUser->role = "client";

            $dbUserModel->insert($nvUser);

            $user = $dbUserModel->where('mail', $mail)->first();

            $session->set('id', $user->id);

            return redirect()->to(base_url('/'));
        }
    }

}