<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>
    </div>
<?php elseif ($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger">
        <p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>
    </div>
<?php endif; ?>
<h1 style="text-align: center;">Bem vindo, selecione um item do menu ao lado.</h1>