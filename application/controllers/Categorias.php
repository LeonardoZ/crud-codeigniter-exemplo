<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categorias extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categorias_model', 'categorias');
    }

    public function listarTodos()
    {
        $data['categorias'] = $this->categorias->listarTodos();
        $this->load->view('categoria/listar', $data);
    }

    public function nova()
    {
        $dados['categoria'] = array('descricao' => '');
        $this->load->view('categoria/nova', $dados);
    }

    public function salvar()
    {
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|max_length[100]|is_unique[categorias.descricao]');

        if ($this->form_validation->run() == false) {
            $dados['validationErrors'] = validation_errors();
            $dados['categoria'] = $this->input->post();
            $this->load->view('categoria/nova', $dados);
        } else {
            $dados = $this->input->post();
            if ($this->categorias->insert($dados) > 0) {
                $this->session->set_flashdata('success_msg', 'Categoria registrada com sucesso!');
                redirect('categorias');
            } else {
                $this->session->set_flashdata('error_msg', 'Categoria não pode ser inserida.');
                redirect('categorias');
            }
        }
    }

    public function editar()
    {
        $id = $this->uri->segment(3);
        $dados['categoria'] = $this->categorias->getCategoria($id);
        $this->load->view('categoria/editar', $dados);
    }

    public function atualizar()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|max_length[100]|is_unique[categorias.descricao]');

        if ($this->form_validation->run() == false) {
            $dados['validationErrors'] = validation_errors();
            $dados['categoria'] = $this->input->post();
            $this->load->view('categoria/editar', $dados);
        } else {
            $dados = $this->input->post();
            if ($this->categorias->update($dados['id'], $dados) > 0) {
                $this->session->set_flashdata('success_msg', 'Categoria atualizada com sucesso!');
                redirect('categorias');
            } else {
                $this->session->set_flashdata('error_msg', 'Categoria não pode ser atualizada.');
                redirect('categorias');
            }
        }
    }

    public function remover()
    {
        $id = $this->uri->segment(3);
        try {
            if ($this->categorias->delete($id) > 0) {
                $this->session->set_flashdata('success_msg', 'Categoria removida com sucesso.');
                redirect('/categorias');
            } else {
                $this->session->set_flashdata('error_msg', 'Categoria não pode ser removida.');
                redirect('/categorias');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_msg', $e->getMessage());
            redirect('/categorias');
        }
    }

}
