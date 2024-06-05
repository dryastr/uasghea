<?php

namespace App\Controllers;

use App\Models\PostModels;

class Home extends BaseController
{
    protected $m_posts;

    public function __construct()
    {
        $this->m_posts = new PostModels();
        helper("global_fungsi_helper");
    }

    function tanggal_indonesia($parameter)
    {
        //2022-03-11 07:27:32
        //tahun-bulan-hari waktu
        $split1 = explode(" ", $parameter);
        $parameter1 = $split1[0]; //2022-03-11
        $bulan = [
            '1' => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'
        ];
        $hari = [
            '1' => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Ahad'
        ];
        $num = date('N', strtotime($parameter1)); //jumat => 5
        $split2 = explode("-", $parameter1); //2022, 03, 11
        return $hari[$num] . ", " . $split2[2] . " " . $bulan[(int)$split2[1]] . " " . $split2[0];
    }

    function post_penulis($username)
    {
        $model = new \App\Models\PostModels;
        $data = $model->getData($username);
        return $data['nama_lengkap'];
    }

    public function index()
    {
        $data = [];
        $post_type = 'article';
        $jumlahBaris = 3;
        $katakunci = '';
        $group_dataset = 'dt';

        $hasil = $this->m_posts->listPost($post_type, $jumlahBaris, $katakunci, $group_dataset);
        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];

        echo view("dashboard/v_template_header", $data);
        echo view("dashboard/v_home", $data);
        echo view("dashboard/v_template_footer", $data);
    }

}
