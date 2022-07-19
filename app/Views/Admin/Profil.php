<?= $this->extend('/admin/templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container rounded">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle my-2" width="150px" src="<?= base_url(); ?>/img/profile/default.svg"><span class="font-weight-bold"><?= user()->username; ?></span><span class="text-black-50"><?= user()->email; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Username</label><input type="text" class="form-control" placeholder="enter phone number" value="<?= user()->username; ?>" readonly></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?= user()->email; ?>" readonly></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Status</label><input type="text" class="form-control" placeholder="first name" value="admin" readonly></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>