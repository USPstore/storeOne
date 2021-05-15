<!-- Kita akan kasih tahu bahwa halaman ini akan menggunakan template  -->
<?= $this->extend('layout/template'); ?>
<!-- setelah itu beritahu mana contentnya -->
<?= $this->section('content'); ?>
<?php
$username =
    [
        'name' => 'username',
        'id' => 'username',
        'value' => null,
        'class' => 'form-control'
    ];
$password =
    [
        'name' => 'password',
        'id' => 'password',
        'class' => 'form-control'
    ];
$repeatPassword =
    [
        'name' => 'repeatPassword',
        'id' => 'repeatPassword',
        'class' => 'form-control'
    ];
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>FORM REGISTRASI</h1>
            <?= form_open('Auth/register') ?>
            <div class="form-group">
                <?= form_label('Username', 'username') ?>
                <?= form_input($username) ?>
            </div>
            <div class="form-group">
                <?= form_label('Password', 'password') ?>
                <?= form_password($password) ?>
            </div>
            <div class="form-group">
                <?= form_label('Repeat Password', 'repeatPassword') ?>
                <?= form_password($repeatPassword) ?>
            </div>
            <div class="text-right">
                <?= form_submit('submit', 'Submit', ['class' => 'btn btn-primary']) ?>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>