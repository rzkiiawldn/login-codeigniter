<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/' . $user['foto']) ?>" alt="profil" class="img-fluid">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title text-capitalize"><?= $user['nama']; ?></h5>
                <p class="card-text"><?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Member since : <?= date('d M Y', $user['date_created']); ?></small></p>
                <a href="" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
</div>