<?php $this->load->view('template/header');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorias
        <small>Listagem de todas categorias do sistema</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Categorias</h3>
        </div>
        <div class="box-body">
          <?php $this->load->view('template/messages') ?>
          <a class="btn btn-primary" href="<?php echo base_url()?>categorias/nova"><i class="fa fa-plus-square"></i> Nova categoria</a>
          <hr/>
        <table class="table table-bordered table-hover data-table">
          <thead>
            <tr>
              <th>Categoria</th>
              <th>Descrição</th>
              <th>Criado em</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!isset($categorias)) { ?>
              <div class="alert alert-warning">
                Nenhuma categoria registrada!
              </div>
            <?php } ?>
            <?php foreach($categorias as $categoria) { ?>
              <tr>
                <td><?php echo $categoria["id"]?></td>
                <td><?php echo $categoria["descricao"]?></td>
                <td><?php echo date("d/m/Y H:i:s", strtotime($categoria["criado_em"]));?></td>
                <td>
                  <a class="btn btn-warning" 
                    href="<?php echo base_url()?>categorias/editar/<?php echo $categoria["id"]?>">
                      <i class="fa fa-pencil"></i> Editar</a>
                  <button data-toggle="modal"
                    data-registro-url="<?php echo base_url()?>categorias/remover/<?php echo $categoria["id"]?>" 
                    data-registro-nome="<?php echo $categoria["descricao"]?>"
                    data-tipo-registro="Categoria"
                    data-target="#modal-remover-registro"
                    type="button" class="btn btn-danger">
                    <i class="fa fa-trash"></i> 
                  Remover</button>
                </td>
              </tr>
            <?php } ?> 
          </tbody>
        </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('template/modal-remover');?>
<?php $this->load->view('template/footer');?>
