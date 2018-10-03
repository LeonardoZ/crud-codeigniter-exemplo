<?php $this->load->view('template/header') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produto
        <small>Adicionar novo produto</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Produtos</a></li>
        <li class="active">Novo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Produto</h3>
        </div>
        <div class="box-body">
          <?php $this->load->view('template/messages') ?>
          <form class="form form-produto" action="<?php echo base_url() ?>produtos/salvar" method="POST">
            <?php $this->load->view("produto/form") ?>
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus-square"></i> Salvar</button>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('template/footer');?>
