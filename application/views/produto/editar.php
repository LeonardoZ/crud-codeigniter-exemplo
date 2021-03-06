<?php $this->load->view('template/header')?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produtos
        <small>Editar produto</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Produtos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Produto <?php echo $produto['nome'] ?></h3>
        </div>
        <div class="box-body">
          <?php $this->load->view('template/messages')?>
          <form class="form form-produto" action="<?php echo base_url() ?>produtos/atualizar" method="POST">
            <?php $this->load->view("produto/form")?>
            <input type="hidden" name="id" value="<?php echo set_value("id", $produto["id"]) ?>" />
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-plus-square"></i> Atualizar</button>
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
