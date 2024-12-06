<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'  => 'admin1',
                'email'     => 'admin1@example.com',
                'role'      => 'admin',
                'password'  => password_hash('admin123', PASSWORD_BCRYPT),
            ],
            [
                'username'  => 'teknisi1',
                'email'     => 'teknisi1@example.com',
                'role'      => 'teknisi',
                'password'  => password_hash('teknisi123', PASSWORD_BCRYPT),
            ]
        ];

         // Simple Queries
        //  $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

         // Using Query Builder
         $this->db->table('users')->insertBatch($data);
    }
}