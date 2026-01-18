<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mail' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'mdp' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'role' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('user');

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nom' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prix' => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'stock' => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'desc' => [
                'type'       => 'text',
                'constraint' => '1000',
            ],
            'vendeur' => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'categorie' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('product');

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'produit' => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'client' => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'quantite' => [
                'type'       => 'INT',
                'constraint' => 9,
            ],
            'etat' => [
                'type'       => 'VARCHAR',
                'constraint' => '20'    
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('commandes');
    }

    public function down()
    {
        $this->forge->dropTable('product');
        $this->forge->dropTable('commandes');
        $this->forge->dropTable('user');
    }
}
