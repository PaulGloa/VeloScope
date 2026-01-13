<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        foreach([
            ["vendeur1@velos.fr", "Dupont", "Jean", "vendeur123", "vendeur"],
            ["vendeur2@velos.fr", "Martin", "Sophie", "vendeur456", "vendeur"],
            ["client1@velos.fr", "Bernard", "Pierre", "client123", "client"],
            ["client2@velos.fr", "Durand", "Marie", "client456", "client"],
            ["client3@velos.fr", "Petit", "Luc", "client789", "client"],
            ["admin1@velos.fr", "Doe", "John", "admin123", "moderateur"],
        ] as [$mail, $nom, $prenom, $mdp, $role]) {

            // Using Query Builder
            $this->db->table("user")->insert([
                "mail" => $mail,
                "nom" => $nom,
                "prenom" => $prenom,
                "mdp" => $mdp,
                "role" => $role,
            ]);

        }

    }
}