<h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
    <div class="row">
        <div class="col-md-6 mt-3">
            <form action="<?= base_url('admin/edit/' . $warna['id']) ?>" method="post">
                <input type="hidden" name="id" value="<?= $warna['id'] ?>">
                <select name="warna" class="form-control">
                    <option value="">- pilih warna -</option>
                    <option value="primary">Biru</option>
                    <option value="success">hijau</option>
                    <option value="warning">kuning</option>
                    <option value="danger">merah</option>
                    <option value="dark">abu tua</option>
                    <option value="secondary">abu muda</option>
                    <option value="info">biru muda</option>
                </select>
                <button type="submit" class="btn btn-<?= $warna['warna'] ?> float-right mt-3">Simpan</button>
            </form>
        </div>
    </div>
</h1>