<?php

/**
 * Classe Estado
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   12/11/2014
 * @version 1.0
 */
class Estado extends CI_Controller {

    private $dirView = "estado/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('paisModel');
        $this->load->model('estadoModel');
    }

    public function index() {
        $data = array();
        try {
            $data['paises'] = $this->paisModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar países' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-estado', $data);
    }

    /**
     * cadastra estado
     */
    public function cadastrar() {
        $this->regras();
        if ($this->form_validation->run()) {
            try {
                $data = array(
                    "nome_estado" => $this->input->post('nome_estado'),
                    "sigla_estado" => $this->input->post('sigla_estado'),
                    "id_pais_estado" => $this->input->post('id_pais_estado')
                );
                if ($this->estadoModel->cadastrar($data)) {
                    $data['sucesso'] = 'Cadastrado com sucesso';
                } else {
                    $data['erro'] = 'Falha ao cadastrar ';
                }
            } catch (Exception $exc) {
                $data['erro'].=' ,erro : ' . $exc->getMessage();
            }
        }
        try {
            $data['paises'] = $this->paisModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar países' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-estado', $data);
    }

    /**
     * realiza a edição do estado
     * @param type $id
     */
    public function editar($id) {
        $data = array();
        $this->form_validation->set_rules('nome_estado', 'Estado', 'required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('id_pais_estado', 'País', 'required|min_length[1]');
        $this->form_validation->set_rules('sigla_estado', 'Sigla', 'required|min_length[1]|max_length[3]');
        if (empty($id) || !is_numeric($id)) {
            redirect('estado/listar');
        }

        if ($this->form_validation->run()) {
            try {
                //preenche um array associativo de campos(do bd) com valores do form
                $data = array(
                    "nome_estado" => $this->input->post('nome_estado'),
                    "sigla_estado" => $this->input->post('sigla_estado'),
                    "id_pais_estado" => $this->input->post('id_pais_estado')
                );
                if ($this->estadoModel->editar($id, $data)) {
                    $data['sucesso'] = 'Editado com sucesso ';
                } else {
                    $data['erro'] = 'Falha ao editar  ';
                }
            } catch (Exception $exc) {
                $data['erro'].= ', erro ' . $exc->getMessage();
            }
        }

        try {
            //salva o possivel resultado da listagem em um indice do array
            $data['estados'] = $this->estadoModel->listar($id);
            $data['paises'] = $this->paisModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao editar:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'editar-estado', $data);
    }

    /**
     * realiza a exclusão
     * @param type $id
     */
    public function excluir($id) {
        try {
            $this->estadoModel->excluir($id);
        } catch (Exception $exc) {
            echo "Falha na exclusão" . $exc->getMessage();
        }
    }

    /**
     * listagem de estados
     */
    public function listar() {
        try {
            $data['estados'] = $this->estadoModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar estados' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-estado', $data);
    }

    private function regras() {
        $this->form_validation->set_rules('nome_estado', 'Estado', 'required|min_length[3]|max_length[45]|is_unique[estados.nome_estado]');
        $this->form_validation->set_rules('id_pais_estado', 'País', 'required|min_length[1]');
        $this->form_validation->set_rules('sigla_estado', 'Sigla', 'required|min_length[1]|max_length[3]|is_unique[estados.sigla_estado]');
    }

}
