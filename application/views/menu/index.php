<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('urutan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('pesan'); ?>
        <a href="" class="btn btn-<?= $warna['warna'] ?> mb-3" data-toggle="modal" data-target="#tambahMenuModal"><i class="fas fa-plus"></i> Tambah Menu</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Urutan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataMenu as $menu) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $menu['menu']; ?></td>
                        <td><?= $menu['urutan']; ?></td>
                        <td>
                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editMenuModal<?= $menu['id'] ?>">edit</a>
                            <a href="<?= base_url('menu/delete/' . $menu['id']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal tambah menu baru -->
<div class="modal fade" id="tambahMenuModal" tabindex="-1" role="dialog" aria-labelledby="tambahMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Menu</label>
                        <input type="text" class="form-control" placeholder="" required value="<?= set_value('menu') ?>" name="menu">
                    </div>
                    <div class="form-group">
                        <label for="">Urutan</label>
                        <input type="number" class="form-control" placeholder="" required value="<?= set_value('urutan') ?>" name="urutan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-<?= $warna['warna'] ?>">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit menu -->
<?php foreach ($dataMenu as $menu) { ?>
    <div class="modal fade" id="editMenuModal<?= $menu['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/edit/' . $menu['id']) ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $menu['id'] ?>">
                        <div class="form-group">
                            <label for="">Menu</label>
                            <input type="text" class="form-control" placeholder="" required value="<?= $menu['menu'] ?>" name="menu">
                        </div>
                        <div class="form-group">
                            <label for="">Urutan</label>
                            <input type="number" class="form-control" placeholder="" required value="<?= $menu['urutan'] ?>" name="urutan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-<?= $warna['warna'] ?>">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>