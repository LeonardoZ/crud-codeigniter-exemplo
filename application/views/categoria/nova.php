<?php $this->load->view('template/header') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorias
        <small>Adicionar nova categoria</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url()?>/categorias">Categorias</a></li>
        <li class="active">Nova</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Categoria</h3>
        </div>
        <div class="box-body">
          <?php $this->load->view('template/messages') ?>
          <form class="form" action="<?php echo base_url() ?>categorias/salvar" method="POST">
            <?php $this->load->view("categoria/form") ?>
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus-square"></i> Salvar</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('template/footer');?>
