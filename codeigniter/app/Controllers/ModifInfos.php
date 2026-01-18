<?php

namespace App\Controllers;

use App\Models\DbUserModel;
use App\Models\DbProductModel;
use CodeIgniter\Database\Exceptions\DataException;

class ModifInfos extends BaseController
{
    function index($error = null) {

        $dbUser = new DbUserModel();
        $dbProduct = new DbProductModel();

        $id = session()->get('id');
        $user = $dbUser->find($id);

        $data['categories'] = $dbProduct->getCategories();
        $data['user'] = $user;
        $data['error'] = $error;

        return view('modif_infos_view', $data);
    }

    function modifInfos() {
        $mail = session()->get('mail');
        $nv_mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $ancien_mdp = $_POST['ancien_mdp'];
        $nv_mdp = $_POST['nv_mdp'];
        $confirm_mdp = $_POST['confirm_mdp'];

        if ($nv_mail == "" || $nom == "" || $prenom == "") {
            return redirect()->to(base_url('ModifInfos/index/incomplet'));
        }

        $dbUser = new DbUserModel();
        $user = $dbUser->where('mail', $mail)->first();

        $user->nom = $nom;
        $user->mail = $nv_mail;
        $user->prenom = $prenom;

        if ($nv_mdp != null) {

            if ($ancien_mdp != $user->mdp) {
                return redirect()->to(base_url('ModifInfos/index/mdp'));
            } else if ($nv_mdp != $confirm_mdp) {
                return redirect()->to(base_url('ModifInfos/index/confirm'));
            } else {
                $user->mdp = $nv_mdp;
            }
        }

        try {
            $dbUser->update($user->id, $user);
        } catch (DataException $e) {}


        session()->set('nom', $user->nom);
        session()->set('prenom', $user->prenom);
        session()->set('mail', $user->mail);
        session()->set('role', $user->role);

        return redirect()->to(base_url('ModifInfos/index/ok'));
    }
}