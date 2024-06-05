<div class="card-header" >
    <i class="fas fa-table me-1"></i>
    DataTable Example
</div>
<div class="card-body" >
    <h1>Daftar Artikel</h1>
    <ul>
        <?php
        // Ambil instance dari model di dalam view
        $articleModel = new \App\Models\PostModels();
        // Mencari artikel berdasarkan username yang sedang login
        $username = session()->get('akun_username');
        $articles = $articleModel->where('username', $username)->findAll();
        ?>

        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                    <h2><?= $article['post_title'] ?></h2>
                    <p><?= $article['post_status'] ?></p>
                    <p><?= $article['post_description'] ?></p>
                    <p><strong>Penulis:</strong> <?= $article['username'] ?></p>
                    <a href="<?= base_url('admin/article/edit/'.$article['post_id']) ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= base_url('admin/article/delete/'.$article['post_id']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Delete</a>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Tidak ada artikel untuk pengguna ini.</li>
        <?php endif; ?>
    </ul>
</div>
