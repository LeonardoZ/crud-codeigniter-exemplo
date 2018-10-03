<?php $this->load->view('template/header');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Produtos
        <small>Listagem de todos produtos do sistema</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Produtos</a></li>
        <li class="active">Listagem</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Produtos</h3>
        </div>
        <div class="box-body">
          <?php $this->load->view('template/messages') ?>
          <a class="btn btn-primary" href="<?php echo base_url()?>produtos/novo"><i class="fa fa-plus-square"></i> Novo Produto</a>
          <hr/>
        <table class="table table-bordered table-hover data-table">
          <thead>
            <tr>
              <th>Produto</th>
              <th>Nome</th>
              <th>Preço de compra</th>
              <th>Preço de venda</th>
              <th>Categoria</th>
              <th>Criado em</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!isset($produtos)) { ?>
              <div class="alert alert-warning">
                Nenhum produto registrado!
              </div>
            <?php } ?>
            <?php foreach($produtos as $produto) { ?>
              <tr>
                <td><?php echo $produto["id"]?></td>
                <td><?php echo $produto["nome"]?></td>
                <td><?php echo "R$ " . number_format($produto["valor_compra"], 2, ",", "."); ?></td>
                <td><?php echo "R$ " . number_format($produto["valor_venda"], 2, ",", "."); ?></td>
                <td><?php echo $produto["categoria_descricao"]?></td>
                <td><?php echo date("d/m/Y H:i:s", strtotime($produto["criado_em"]));?></td>
                <td>
                  <a class="btn btn-warning" 
                    href="<?php echo base_url()?>produtos/editar/<?php echo $produto["id"]?>">
                      <i class="fa fa-pencil"></i> Editar</a>
                  <button data-toggle="modal"
                    data-registro-url="<?php echo base_url()?>produtos/remover/<?php echo $produto["id"]?>" 
                    data-registro-nome="<?php echo $produto["nome"]?>"
                    data-tipo-registro="Produto"
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
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('template/modal-remover');?>
<?php $this->load->view('template/footer');?>
