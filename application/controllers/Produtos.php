<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categorias_model', 'categorias');
        $this->load->model('Produtos_model', 'produtos');
    }

    public function index()
    {
        $dados['produtos'] = $this->produtos->listarTodos();
        $this->load->view('produto/listar', $dados);
    }

    public function novo()
    {
        $dados['produto'] = array('nome' => '',
            'valor_compra' => 0.0,
            'valor_venda' => 0.0,
            'categoria_id' => -1);
        $dados['categorias'] = $this->categorias->listarTodos();
        $this->load->view('produto/novo', $dados);
    }

    public function salvar()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[130]|is_unique[produtos.nome]');
        $this->form_validation->set_rules('valor_compra', 'Valor de compra', 'required|decimal');
        $this->form_validation->set_rules('valor_venda', 'Valor de venda', 'required|decimal');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');

        if ($this->form_validation->run() == false) {
            $dados['validationErrors'] = validation_errors();
            $dados['produto'] = $this->input->post();
            $dados['categorias'] = $this->categorias->listarTodos();
            $this->load->view('produto/novo', $dados);
        } else {
            $produto = $this->input->post();
            if ($this->produtos->insert($produto) > 0) {
                $this->session->set_flashdata('success_msg', 'Produto registrado com sucesso!');
                redirect('/');
            } else {
                $this->session->set_flashdata('error_msg', 'Produto não pode ser inserido.');
                redirect('/');
            }
        }
    }

    public function editar()
    {
        $id = $this->uri->segment(3);
        $produto = $this->produtos->getProduto($id);
        $dados['produto'] = $produto;
        $dados['categorias'] = $this->categorias->listarTodos();
        $this->load->view('produto/editar', $dados);
    }

    public function atualizar()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[130]');
        $this->form_validation->set_rules('valor_compra', 'Valor de compra', 'required|decimal');
        $this->form_validation->set_rules('valor_venda', 'Valor de venda', 'required|decimal');
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');

        if ($this->form_validation->run() == false) {
            $dados['validationErrors'] = validation_errors();
            $dados['produto'] = $this->input->post();
            $dados['categorias'] = $this->categorias->listarTodos();
            $this->load->view('produto/novo', $dados);
        } else {
            $produto = $this->input->post();
            if ($this->produtos->update($produto['id'], $produto) > 0) {
                $this->session->set_flashdata('success_msg', 'Produto atualizado com sucesso!');
                redirect('/');
            } else {
                $this->session->set_flashdata('error_msg', 'Produto não pode ser atualizado.');
                redirect('/');
            }
        }
    }
    public function remover()
    {
        $id = $this->uri->segment(3);
        try {
            if ($this->produtos->delete($id) > 0) {
                $this->session->set_flashdata('success_msg', 'Produto removida com sucesso.');
                redirect('/');
            } else {
                $this->session->set_flashdata('error_msg', 'Produto não pode ser removida.');
                redirect('/');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_msg', $e->getMessage());
            redirect('/');
        }
    }
}
