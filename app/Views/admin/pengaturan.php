<?= $this->extend('layout/index') ?>
<?= $this->section('page-content') ?>

<div class="container-fluid">
    <!-- session -->
    <?php if (session()->get('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6> Data berhasil <?= session()->getFlashdata('pesan') ?></h6>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <!-- <p class="mb-4">Data Santri Pondok Pesantren Al-Jihad Surabaya</a>.</p> -->
    <!-- End of Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="alert alert-info" role="alert">
                <i class="fa fw fa-info-circle mr-2"></i> Harga Khusus ditujukan untuk santri yang kurang mampu
            </div>
            <form action="/admin/tagihan/pengaturan/save" method="post">
                <?= csrf_field() ?>

                <div class="row justify-content-center mt-3 mb-4">
                    <div class="col-md-4">
                        <label for="harga_normal" class="form-label">Harga Normal</label>
                        <div class="input-group has-validation">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right" id="harga_normal" name="harga_normal" placeholder="" value="<?= $pengaturan["harga_normal"] ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">/bulan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row justify-content-center mt-3 mb-4">
                    <div class="col-md-4">
                        <label for="harga_khusus" class="form-label">Harga Khusus</label>
                        <div class="input-group has-validation">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right" id="harga_khusus" name="harga_khusus" placeholder="" value="<?= $pengaturan["harga_khusus"] ?>" required>
                            <div class="input-group-append">
                                <span class="input-group-text">/bulan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
