<?php

/**
 * Classe  Pais
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   12/11/2014
 * @version 1.0
 */
class Pais extends CI_Controller {

    private $dirView = "pais/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('paisModel');
    }

    /**
     * método principal do sistema
     */
    public function index() {
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-pais');
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
                    "nome_pais" => $this->input->post('nome_pais')
                );
                if ($this->paisModel->cadastrar($data)) {
                    $data['sucesso'] = 'Cadastrado com sucesso ';
                } else {
                    $data['erro'] = 'Falha ao cadastrar  ';
                }
            } catch (Exception $exc) {
                $data['erro'].= ', erro ' . $exc->getMessage();
            }
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-pais', $data);
    }

    /**
     * listagem dos países
     */
    public function listar() {
        $data = array();
        try {
            $data['paises'] = $this->paisModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha na listagem:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-pais', $data);
    }

    /**
     * realiza a edição do país
     * @param type $id
     */
    public function editar($id) {
        $data = array();
        $this->regras();
        if (empty($id) || !is_numeric($id)) {
            redirect('pais/listar');
        }

        if ($this->form_validation->run()) {
            try {
                //preenche um array associativo de campos(do bd) com valores do form
                $data = array(
                    "nome_pais" => $this->input->post('nome_pais')
                );
                if ($this->paisModel->editar($id, $data)) {
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
            $data['paises'] = $this->paisModel->listar($id);
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao editar:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'editar-pais', $data);
    }

    /**
     * realiza a exclusão
     * @param type $idPais
     */
    public function excluir($idPais) {
        try {
            $this->paisModel->excluir($idPais);
        } catch (Exception $exc) {
            echo "Falha na exclusão" . $exc->getMessage();
        }
    }

    /**
     * seta as regras de validação
     */
    private function regras() {
        $this->form_validation->set_rules('nome_pais', 'Nome do país', 'required|min_length[3]|max_length[45]|is_unique[paises.nome_pais]');
    }

}
