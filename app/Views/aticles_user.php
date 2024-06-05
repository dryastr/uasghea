<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>artikel</title>


  <link rel="stylesheet" href="<?php echo base_url('admin/css/welcome.css') ?>">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


</head>
<body>
  


<!-- open navbar -->

<div class="navbar">
      <span>
      <img src="<?php echo base_url('admin/assets/img/poto_profile.png') ?>" alt=""> 
      <?php echo session()->get('akun_nama_lengkap') ?> <br>
      </span>


   <div class="container_ul_navbar" >
            <ul class="ul_navbar  ">
              <li class="">
                <a class=""  href="<?php echo site_url('admin/article') ?>">Dashboard </a>
              </li>
              <li class="">
                <a class=""  href="<?php echo site_url('admin/articlesAll') ?>">Article</a>
            
              </li>
             
            </ul>
            <div class="user_option">
            <?php
                $username = session()->get();
                $akun_nama_lengkap = session()->get('akun_nama_lengkap');

                // Periksa apakah akun_nama_lengkap tidak null
                if ($akun_nama_lengkap != null):
            ?>
                    <!-- Jika pengguna sudah login, tampilkan ini -->
                    <a href="<?= site_url('admin/logout'); ?>">
                        <span>Logout</span>
                    </a>
            <?php
                // Periksa apakah akun_nama_lengkap adalah null
                elseif ($akun_nama_lengkap === null):
            ?>
                    <!-- Jika pengguna belum login, tampilkan ini -->
                    <a href="<?= site_url('admin/login'); ?>">
                        <span>Login</span>
                    </a>
            <?php
            endif;
            ?>
        </div>

          </div>
</div>

<!-- close navbar -->



<!-- open content -->

<div class="container_artikel">

<div class="card-body" >

       <div class="container_judul">
        <h1 class="judul_artikel">Daftar Artikel</h1>
       </div>

        <ul class="article-list">
            <?php
            // Ambil instance dari model di dalam view
            $articleModel = new \App\Models\PostModels();
            // Mencari artikel berdasarkan username yang sedang login
            $username = session()->get('akun_username');
            $articles = $articleModel->findAll();
            ?>
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $article): ?>
                    <li class="article_item">

                  <div>
                  <p class="nama_artikel">Author: <?= $article['username'] ?></p> 
                  <img class="img_content_artikel" src="<?= base_url('upload/' . $article['post_thumbnail']) ?>" alt="Thumbnail" >
                    <h2 class="article_title"><?= $article['post_title'] ?></h2>
                  </div>

                       <div class="container_content_artikel">

                            <div>
                            <div class="deskripsi_artikel">
                                    <p class="article-description"><?= $article['post_description'] ?></p>
                                    <!--<p><?= $article['post_content'] ?></p>-->
                                </div>

                                    <div class="article_meta">
                                        <span>Status: <?= $article['post_status'] ?></span> |
                                        <span>Type: <?= $article['post_type'] ?></span> |
                                        <span>Time: <?= $article['post_time'] ?></span>
                                    </div>
                            </div>
                                
                           
                       </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Tidak ada artikel untuk pengguna ini.</li>
            <?php endif; ?>
        </ul>
    </div>

</div>

    <!-- close content -->

</body>
</html>