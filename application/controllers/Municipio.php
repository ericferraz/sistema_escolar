<?php

/**
 * Classe Municipio
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class Municipio extends CI_Controller {

    private $dirView = "municipio/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('municipioModel');
        $this->load->model('estadoModel');
    }

    /**
     * método principal do sistema
     */
    public function index() {
        $data = array();
        try {
            $data['estados'] = $this->estadoModel->listar();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-municipio', $data);
    }

    /**
     * método cadastrar
     */
    public function cadastrar() {
        $this->regras();
        $data = array();
        //se passou na validação
        if ($this->form_validation->run()) {
            try {
                //preenche um array associativo de campos(do bd) com valores do form
                $data = array(
                    "nome_municipio" => $this->input->post('nome_municipio'),
                    "id_estado_municipio" => $this->input->post('id_estado_municipio')
                );
                if ($this->municipioModel->cadastrar($data)) {
                    $data['sucesso'] = 'Cadastrado com sucesso ';
                } else {
                    $data['erro'] = 'Falha ao cadastrar  ';
                }
            } catch (Exception $exc) {
                $data['erro'].= ', erro ' . $exc->getMessage();
            }
        }
        try {
            $data['estados'] = $this->estadoModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar:' . $exc->getMessage();
        }

        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-municipio', $data);
    }

    /**
     * listagem dos países
     */
    public function listar() {
        $data = array();
        try {
            $data['municipios'] = $this->municipioModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha na listagem:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-municipio', $data);
    }

    /**
     * realiza a edição do país
     * @param type $id
     */
    public function editar($id) {
        $data = array();
        $this->form_validation->set_rules('nome_municipio', 'Nome do município', 'required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('id_estado_municipio', 'Estado', 'required|min_length[1]|max_length[11]');
        if (empty($id) || !is_numeric($id)) {
            redirect('municipio/listar');
        }

        if ($this->form_validation->run()) {
            try {
                //preenche um array associativo de campos(do bd) com valores do form
                $data = array(
                    "nome_municipio" => $this->input->post('nome_municipio'),
                    "id_estado_municipio" => $this->input->post('id_estado_municipio')
                );
                if ($this->municipioModel->editar($id, $data)) {
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
            $data['municipios'] = $this->municipioModel->listar($id);
            $data['estados'] = $this->estadoModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao editar:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'editar-municipio', $data);
    }

    /**
     * realiza a exclusão
     * @param type $id
     */
    public function excluir($id) {
        try {
            $this->municipioModel->excluir($id);
        } catch (Exception $exc) {
            echo "Falha na exclusão" . $exc->getMessage();
        }
    }

    /**
     * seta as regras de validação
     */
    private function regras() {
        $this->form_validation->set_rules('id_estado_municipio', 'Estado', 'required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('nome_municipio', 'Nome do município', 'required|min_length[3]|max_length[45]|is_unique[municipios.nome_municipio]');
    }

}
