<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="row">
    <div class="col-lg-6">
        <?= $this->session->flashdata('pesan'); ?>
        <h5 class="mb-3">Role : <?= $dataRole['level']; ?></h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col" class="text-center">Akses</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataMenu as $menu) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $menu['menu']; ?></td>
                        <td class="text-center">
                            <div class="form-check">
                                <!-- mengirimkan data ke fungsi userAkses_helper.php yang ada di helper -->
                                <!-- fungsi cek akses untuk fungsi checked -->
                                <!-- data role dan data menu dikirimkan untuk jquery -->
                                <input class="form-check-input" type="checkbox" <?= cek_akses($dataRole['id_level'], $menu['id']); ?> data-level="<?= $dataRole['id_level']; ?>" data-menu="<?= $menu['id']; ?>">
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>