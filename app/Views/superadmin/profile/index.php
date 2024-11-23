<?= $this->extend('superadmin/layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Profile SuperAdmin</h2>

    <!-- Alert Messages -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')) : ?>
        <?php $errors = session()->getFlashdata('errors'); ?>
        <?php if (is_array($errors)) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else : ?>
            <div class="alert alert-danger"><?= esc($errors) ?></div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Profile Display and Edit Form -->
    <div class="card">
        <div class="card-body">
            <form action="/superadmin/profile/update" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        value="<?= old('name', esc($user['name'] ?? '')) ?>" 
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        value="<?= old('email', esc($user['email'] ?? '')) ?>" 
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 