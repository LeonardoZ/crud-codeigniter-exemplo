<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="nome"
        value="<?php echo set_value("nome", $produto["nome"]) ?>">
</div>

<div class="form-group">
    <label>Valor de compra</label>

    <div class="input-group">
        <span class="input-group-addon"><strong>R$</strong></span>
        <input type="text" class="form-control dinheiro" name="valor_compra"
            value="<?php echo set_value("valor_compra", $produto["valor_compra"]) ?>">
    </div>
</div>

<div class="form-group">
    <label>Valor de venda</label>
    <div class="input-group">
        <span class="input-group-addon"><strong>R$</strong></span>
        <input type="text" class="form-control dinheiro" name="valor_venda"
            value="<?php echo set_value("valor_venda", $produto["valor_venda"]) ?>">
    </div>
</div>

<div class="form-group">
    <label>Categoria</label>
    <select type="text" class="form-control" name="categoria_id">
        <?php foreach ($categorias as $categoria) {?>
            <option value="<?php echo $categoria["id"] ?>"
                <?php echo $produto["categoria_id"] === $categoria["id"] ? "selected" : "" ?>>
                <?php echo $categoria["descricao"] ?>
            </option>
        <?php }?>
    </select>
</div>