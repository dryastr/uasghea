<div   class="card-header" style="background-color: #1cbbb4;color:white;">
<i class="fas fa-table me-1"></i>
DataTable Example
</div>
<div class="card-body" style="background-color: #1cbbb4;">
    <?php
    $session = \Config\Services::session();
    if ($session->getFlashdata('warning')) {
        ?>
        <div class="alert alert-warning">
            <ul?>
                <?php
                foreach ($session->getFlashdata('warning') as $val) {
                    ?>
                    <li><?php echo $val ?></li>
                    <?php
                }
                ?>
                </ul>
        </div>
        <?php
    }
    if ($session->getFlashdata('success')) {
        ?>
        <div class="alert alert-success"><?php echo $session->getFlashdata('success') ?></div>
        <?php
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label style="color: white;" for="input_post_title"" class="form-label">Judul</label>
            <input style="background-color: #1cbbb4;" type="text" class="form-control" id="input_post_title" name="post_title">
        </div>
        <div class="mb-3">
            <label  style="color: white;"  for="input_post_status" class="form-label">Status</label>
            <select style="background-color: #1cbbb4;"  name="post_status" class="form-select">
                <option  style="color: white;"  style="background-color: #1cbbb4;"  value="active">Aktif</option>
                <option  style="color: white;"  style="background-color: #1cbbb4;"  value="inactive">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label  style="color: white;"  for="input_post_thumbnail" class="form-label">Thumbnail</label>
            <input style="background-color: #1cbbb4;color:white;" type="file" class="form-control" id="input_post_thumbnail"  name="post_thumbnail">
        </div>
        <div class="mb-3">
            <label  style="color: white;"  for="input_post_description" class="form-label">Deskripsi</label>
            <textarea style="background-color: #1cbbb4;"  class="form-control" id="input_post_description" name="post_desripction" rows="2"> </textarea>
        </div>
        <div class="mb-3">
            <label  style="color: white;"  for="input_post_content" class="form-label">Konten</label>
            <textarea style="background-color: #1cbbb4;" class="form-control" id="input_post_content" name="post_content" rows="10"></textarea>
        </div>
        <div>
            <input style="background-color: #1cbbb4;" type="submit" name="submit" value="Simpan Data" class="btn btn-primary">
        </div>
    </form>
</div>