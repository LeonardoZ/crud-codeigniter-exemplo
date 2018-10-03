<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos_model extends CI_Model
{

    public function listarTodos()
    {
        $this->db->select('p.*, c.descricao as categoria_descricao');
        $this->db->from('produtos p');
        $this->db->join('categorias c', 'c.id = p.categoria_id');
        return $this->db->get()->result_array();  
    }

    public function getProduto($id)
    {
        return $this->db->get('produtos', array(
            'id' => $id,
        ))->row_array();
    }

    public function insert($dados)
    {
        $this->db->insert('produtos', $dados);
        return $this->db->insert_id();
    }

    public function update($id, $dados)
    {
        $this->db->set(array(
            'nome' => $dados['nome'],
            'valor_compra' => $dados['valor_compra'],
            'valor_venda' => $dados['valor_venda'],
            'categoria_id' => $dados['categoria_id'],
        ));
        $this->db->where(array('id' => $id));
        return $this->db->update('produtos');
    }

    public function delete($id)
    {
        $this->db->where(array('id' => $id));
        $this->db->delete('produtos');
        $error = $this->db->error();
        if ($error['code'] == 1451) {
            throw new Exception('Produto não pode ser removido.
            Existem outros registros que dependem dessa produto. 
            Para remover, você precisar deletar todos os itens dependentes
            desse produto.');
        }
        return $this->db->affected_rows();
    }

}
