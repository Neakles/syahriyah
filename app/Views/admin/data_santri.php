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
        <h1 class="h3 mb-0 text-gray-800">Data Santri</h1>
    </div>
    <p class="mb-4">Data Santri Pondok Pesantren Al-Jihad Surabaya</a>.</p>
    <!-- End of Page Heading -->

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-end">
            <!-- <a href="/admin/tambah_santri" class="btn btn-warning .btn-icon-split py-1 .col-auto mr-2"><i class="fa-solid fa-file-pdf mr-2"></i>Export PDF</a> -->
            <button type="button" class="btn btn-primary py-1 .col-auto mx-1" data-toggle="modal" data-target="#modal_tambah"><i class="fa-solid fa-fw fa-user-plus mr-2"></i>Tambah Santri</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kamar</th>
                            <th scope="col">Kategori</th>
                            <th scope="col" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listSantri as $key => $santri) : ?>
                            <tr>
                                <th scope="row"><?= ++$key ?></th>
                                <td><?= $santri->nis ?></td>
                                <td class="text-capitalize"><?= $santri->fullname ?></td>
                                <td class="text-lowercase"><?= $santri->email ?></td>
                                <td class="text-capitalize"><?= $santri->gender ?></td>
                                <td class="text-capitalize"><?= $santri->kamar_nama ?></td>
                                <td class="text-capitalize"><?= $santri->kategori ?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="<?= base_url(
                                                    'admin/santri/detail/' . $santri->id
                                                ) ?>" class="btn btn-info rounded-circle mx-1"><i class="fas fa-eye"></i></a>
                                    <!-- <a href="<?= base_url(
                                                        'admin/edit/' . $santri->id
                                                    ) ?>" class="btn btn-warning rounded-circle mx-1"><i class="fas fa-edit"></i></a> -->
                                    <button type="button" class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#modal_edit" id="btn-edit"
                                        data-id="<?= $santri->id ?>"
                                        data-nis="<?= $santri->nis ?>"
                                        data-username="<?= $santri->username ?>"
                                        data-fullname="<?= $santri->fullname ?>"
                                        data-kategori="<?= $santri->kategori ?>"
                                        data-email="<?= $santri->email ?>"
                                        data-no_telp="<?= $santri->no_telp ?>"
                                        data-gender="<?= $santri->gender ?>"
                                        data-m_kamar_id="<?= $santri->m_kamar_id ?>"
                                        data-wali="<?= $santri->wali ?>"
                                        data-no_wali="<?= $santri->no_wali ?>"
                                        data-thn_masuk="<?= $santri->thn_masuk ?>"><i class="fas fa-edit"></i></button>
                                    <a href="<?= base_url(
                                                    'admin/delete/' . $santri->id
                                                ) ?>" class="btn btn-danger rounded-circle mx-1"><i class="fas fa-trash"></i></a>
                                    <!-- <button type="button" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#modal_delete"><i class="fas fa-trash"></i></button> -->
                                </td>
                            </tr>

                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Santri -->
<div id="modal_tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukkan Data Santri</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="/admin/santri/save" method="post">
                            <?= csrf_field() ?>

                            <h5>Data Santri</h5>
                            <hr>
                            <div class="row justify-content-start mt-3 mb-3">
                                <div class="col-6">
                                    <label for="nis" class="form-label">Nomor Induk</label>
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Induk Santri" required>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <label for="fullname" class="form-label">Nama Santri</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan Nama Santri" required>
                                </div>
                                
                                <div class="col-6">
                                    <label for="no_telp" class="form-label">No Telepon Santri</label>
                                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No Telepon Santri" required>
                                </div>
                            </div>

                            <div class="row justify-content-start mb-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select id="kategori" name="kategori" class="form-control" required>
                                            <option value="mampu" selected>Mampu</option>
                                            <option value="tidak mampu">Tidak Mampu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="datepicker" class="form-label">Tahun Masuk</label>
                                    <input type="year" class="form-control" id="datepicker" name="thn_masuk" placeholder="Pilih Tahun Masuk" required>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="m_kamar_id">Kamar</label>
                                        <select id="m_kamar_id" name="m_kamar_id" class="form-control" required>
                                            <option value="laki-laki" selected disabled>-- Pilih Kamar --</option>
                                            <?php foreach($kamar as $key => $val) :?>
                                                <option value="<?= $val["id"] ?>" class="text-capitalize"><?= $val["nama"] ?>
                                                    <span class="text-capitalize">
                                                        (<?= $val["gender"] ?>)
                                                    </span>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <label for="text" class="form-label">Nama Wali Santri</label>
                                    <input type="wali" class="form-control" id="wali" name="wali" placeholder="Masukkan Nama Wali Santri" required>
                                </div>
                                <div class="col">
                                    <label for="no_wali" class="form-label">No Telepon Wali Santri</label>
                                    <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="Masukkan No Telepon Wali Santri" required>
                                </div>
                            </div>

                            <h5>Data Akun</h5>
                            <hr>
                            <div class="row justify-content-center mb-4">
                                <div class="col">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                                </div>
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-fw fa-save mr-1"></i>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Santri -->

<!-- Modal Edit -->
<div id="modal_edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $santri->fullname ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="/admin/santri/update" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" id="id-santri" value="<?= $santri->id ?>">
                            <h5>Data Santri</h5>
                            <hr>
                            <div class="row justify-content-start mt-3 mb-3">
                                <div class="col-6">
                                    <label for="nis" class="form-label">Nomor Induk</label>
                                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan Induk Santri" value="<?= $santri->nis ?>" required>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <label for="fullname" class="form-label">Nama Santri</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan Nama Santri" value="<?= $santri->fullname ?>" required>
                                </div>
                                
                                <div class="col-6">
                                    <label for="no_telp" class="form-label">No Telepon Santri</label>
                                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No Telepon Santri" value="<?= $santri->no_telp ?>" required>
                                </div>
                            </div>

                            <div class="row justify-content-start mb-3">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select id="kategori" name="kategori" class="form-control" required>
                                            <option value="mampu" <?= $santri->kategori == "mampu" ? "selected" : "" ?>>Mampu</option>
                                            <option value="tidak mampu" <?= $santri->kategori == "tidak mampu" ? "selected" : "" ?>>Tidak Mampu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label for="datepicker" class="form-label">Tahun Masuk</label>
                                    <input type="year" class="form-control" id="datepicker" name="thn_masuk" placeholder="Pilih Tahun Masuk" value="<?= $santri->thn_masuk ?>" required>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="laki-laki" selected>Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="m_kamar_id">Kamar</label>
                                        <select id="m_kamar_id" name="m_kamar_id" class="form-control" required>
                                            <?php foreach($kamar as $key => $val) :?>
                                                <option value="<?= $val["id"] ?>" class="text-capitalize"
                                                    <?= $val["id"] == $santri->m_kamar_id ? "selected" : "" ?>
                                                ><?= $val["nama"] ?>
                                                    <span class="text-capitalize">
                                                        (<?= $val["gender"] ?>)
                                                    </span>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <label for="text" class="form-label">Nama Wali Santri</label>
                                    <input type="wali" class="form-control" id="wali" name="wali" placeholder="Masukkan Nama Wali Santri" value="<?= $santri->wali ?>" required>
                                </div>
                                <div class="col">
                                    <label for="no_wali" class="form-label">No Telepon Wali Santri</label>
                                    <input type="number" class="form-control" id="no_wali" name="no_wali" placeholder="Masukkan No Telepon Wali Santri" value="<?= $santri->no_wali ?>" required>
                                </div>
                            </div>

                            <h5>Data Akun</h5>
                            <hr>
                            <div class="row justify-content-center mb-4">
                                <div class="col">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $santri->username ?>" required>
                                </div>
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $santri->email ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-fw fa-save mr-1"></i>
                        Ubah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Edit -->

<!-- Modal Delete -->
<div id="modal_delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Santri</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p>Apakah Anda yakin ingin menghapus <strong><?= $santri->fullname ?></strong>?</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="/admin/delete/<?= $santri->id ?>" class="btn btn-primary"> Yakin</a>
                <?= d($santri->id) ?>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    // TODO parsing data from index to modal
</script>
<!-- End of Modal Delete -->
<?= $this->endSection() ?>
