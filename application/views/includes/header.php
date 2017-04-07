<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro dos Cursos</title>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/DataTables/datatables.min.css')?>">
        <!-- Multi-Select -->
        <link rel="stylesheet" href="<?= base_url('assets/multi-select/css/multi-select.css')?>">
        
        <style>
            a.active { background: #4CAF50; color:#FFF!important;}
        </style>
    </head>
    <body>
        <!-- as classes container-fluid, row e col-md-xx são do GRID do bootstrap -->
        <!-- procure por 'bootstrap grid' e estude-as -->
<div class="container-fluid">
    <div class="row">
        <div id="header" class="col">
            <div id="classclock">
                <h1>Class Clock</h1>
            </div>
            <div id="ifsp">
                <img src="<?= base_url('assets/img/ifsp.jpg')?>" class="logo">
            </div>
        </div>
</div><!--Fecha row-->