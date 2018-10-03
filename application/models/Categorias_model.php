<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias_model extends CI_Model
{

    public function listarTodos()
    {
        return $this->db->get('categorias')->result_array();
    }

    public function getCategoria($id)
    {
        return $this->db->get_where('categorias', array(
            'id' => $id,
        ))->row_array();
    }

    public function insert($dados)
    {
        $this->db->insert("categorias", $dados);
        return $this->db->affected_rows();
    }

    public function update($id, $dados)
    {
        $this->db->set(array(
            'descricao' => $dados['descricao'],
        ));
        $this->db->where(array("id" => $id));
        $this->db->update("categorias");
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where(array("id" => $id));
        $this->db->delete("categorias");
        $error = $this->db->error();
        if ($error['code'] == 1451) {
            throw new Exception('Categoria não pode ser removida.
            Existem outros registros que dependem dessa categoria. Para remover, você precisar deletar todos os itens dependentes
            dessa categoria.');
        }
        return $this->db->affected_rows();
    }
}
