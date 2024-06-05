<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'gheakhai',
            'password' => password_hash('5555', PASSWORD_BCRYPT),
            'nama_lengkap' => 'Ghea Khairunnisa',
            'email' => 'gheakhai@gmail.com',
        ];

        $this->db->table('admin')->insert($data);
    }
}
