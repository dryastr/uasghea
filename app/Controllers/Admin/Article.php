<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\AdminModels;
use App\Models\PostModels;

class Article extends BaseController 
{
    function __construct()
    {
        $this->m_admin = new AdminModels();
        $this->m_posts = new PostModels();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {

        $model = new AdminModels();
        
        // Coba mengambil data
        // $data = $model->findAll();

        // echo "<pre>";
        // print_r( $data);
        // echo "</pre>";
   


       $data = [];
       $data['templateJudul']= 'Halaman artikel';
       echo view('v_template_header', $data);
       echo view('v_article', $data);
       echo view('v_template_footer', $data);
    }

    function tambah()
    {
        $data = [];
        if ($this->request->getMethod() == 'POST') {
            $data = $this->request->getVar(); #setiap yang di input akan dikembalikan ke View
            $rule = [
                'post_title' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul harus diisi'
                    ],
                ],
                'post_content' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Konten harus diisi'
                    ],
                ],
                'post_thumbnail' => [
                    'rules' => 'is_image[post_thumbnail]',
                    'errors' => [
                        'is_image' => 'Hanya gambar yang diperbolehkan untuk diupload'
                    ]
                ]
            ];
            $file = $this->request->getFile('post_thumbnail');
            if (!$this->validate($rule)) {
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $post_thumbnail = '';
                if ($file->getName()) {
                    $post_thumbnail = $file->getRandomName();
                }
                $record = [
                    'username' => session()->get('akun_username'),
                    'post_title' => $this->request->getVar('post_title'),
                    'post_status' => $this->request->getVar('post_status'),
                    'post_thumbnail' => $post_thumbnail,
                    'post_description' => $this->request->getVar('post_description'),
                    'post_content' => $this->request->getVar('post_content')

                ];
                $aksi = $this->m_posts->insertPost($record, $post_type = 'article');
                if ($aksi != false) {
                    $page_id = $aksi;
                    if ($file->getName()) {
                        $lokasi_direktori = "upload";
                        $file->move($lokasi_direktori, $post_thumbnail);
                    }
                    session()->setFlashdata("success", 'Data Berhasil Dimasukkan');
                    return redirect()->to('admin/article/tambah');
                } else {
                    session()->setFlashdata("warning", ['Gagal memasukkan data']);
                    return redirect()->to('admin/article/tambah');
                }
            }
        }
        $data['templateJudul'] = "Halaman Article";
        /** Header */
        echo view('v_template_header', $data);
        /** Body */
        echo view('v_article_tambah', $data);
        /** Footer */
        echo view('v_template_footer', $data);

    }
    
    public function edit($id)
    {
        $articleModel = new PostModels();
        $data['article'] = $articleModel->find($id);
    
        if ($this->request->getMethod() == 'POST') {
            // Debugging: cek data yang dikirim
            $postData = $this->request->getPost();
            // echo '<pre>';
            // print_r($postData);
            // echo '</pre>';
            // Hentikan eksekusi untuk memeriksa data
    
            // Data yang akan di-update
            $updateData = [
                'post_title' => $postData['post_title'] ?? $data['article']['post_title'],
                'post_status' => $postData['post_status'] ?? $data['article']['post_status'],
                'post_description' => $postData['post_description'] ?? $data['article']['post_description']
            ];
    
            $articleModel->update($id, $updateData);
            return redirect()->to('admin/article/tambah');
        }
    
        return view('v_edit_article', $data);
    }
    

    public function delete($id)
    {
        $articleModel = new PostModels();
        $articleModel->delete($id);
        return redirect()->to('admin/article');
    }
    
    
}