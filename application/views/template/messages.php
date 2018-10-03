<div class="row">
  <div class="col-xs-12">
        <?php if (isset($validationErrors) && $validationErrors) { ?>
                <div class="callout callout-danger">
                    <h4>Erros no formulário</h4>
                    <p><?php echo $validationErrors?></p>
                </div>
        <?php } else {
                if ($this->session->flashdata('success_msg')) {?>
                    <div class="callout callout-success">
                        <h4>Sucesso</h4>
                        <p><?php echo $this->session->flashdata('success_msg')?></p>
                    </div>
            <?php } else if ($this->session->flashdata('error_msg')) { ?>
                    <div class="callout callout-danger">
                        <h4>Erro na operação</h4>
                        <p><?php echo $this->session->flashdata('error_msg')?></p>
                    </div>
            <?php } ?> 
        <?php }?>
  </div>
</div>