<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('urutan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('pesan'); ?>
        <a href="" class="btn btn-<?= $warna['warna'] ?> mb-3" data-toggle="modal" data-target="#tambahRole"><i class="fas fa-plus"></i> Tambah Role</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataRole as $role) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $role['level']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/roleAkses/' . $role['id_level']) ?>" class="badge badge-warning">Hak akses</a>
                            <a href="#" class="badge badge-success" data-toggle="modal" data-target="#editRole<?= $role['id_level'] ?>">edit</a>
                            <a href="<?= base_url('admin/delete/' . $role['id_level']) ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal tambah Role baru -->
<div class="modal fade" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="tambahRoleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRoleLabel">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" class="form-control" placeholder="" required value="<?= set_value('menu') ?>" name="menu">
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
<?php foreach ($dataRole as $role) { ?>
    <div class="modal fade" id="editRole<?= $role['id_level'] ?>" tabindex="-1" role="dialog" aria-labelledby="editRoleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleLabel">Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/editRole/' . $role['id_level']) ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $role['id_level'] ?>">
                        <div class="form-group">
                            <label for="">Level</label>
                            <input type="text" class="form-control" placeholder="" required value="<?= $role['level'] ?>" name="level">
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