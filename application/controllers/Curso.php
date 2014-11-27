<?php

/**
 * Classe Curso
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class Curso extends CI_Controller {

    private $dirView = "curso/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('cursoModel');
    }

    /**
     * método principal do sistema
     */
    public function index() {
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-curso');
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
                    "nome_curso" => $this->input->post('nome_curso')
                );
                if ($this->cursoModel->cadastrar($data)) {
                    $data['sucesso'] = 'Cadastrado com sucesso ';
                } else {
                    $data['erro'] = 'Falha ao cadastrar  ';
                }
            } catch (Exception $exc) {
                $data['erro'].= ', erro ' . $exc->getMessage();
            }
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-curso', $data);
    }

    /**
     * listagem 
     */
    public function listar() {
        $data = array();
        try {
            $data['cursos'] = $this->cursoModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha na listagem:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-curso', $data);
    }

    /**
     * realiza a edição 
     * @param type $id
     */
    public function editar($id) {
        $data = array();
        $this->regras();
        if (empty($id) || !is_numeric($id)) {
            redirect('curso/listar');
        }

        if ($this->form_validation->run()) {
            try {
                //preenche um array associativo de campos(do bd) com valores do form
                $data = array(
                    "nome_curso" => $this->input->post('nome_curso')
                );
                if ($this->cursoModel->editar($id, $data)) {
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
            $data['cursos'] = $this->cursoModel->listar($id);
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao editar:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'editar-curso', $data);
    }

    /**
     * realiza a exclusão
     * @param type $id
     */
    public function excluir($id) {
        try {
            $this->cursoModel->excluir($id);
        } catch (Exception $exc) {
            echo "Falha na exclusão" . $exc->getMessage();
        }
    }

    /**
     * seta as regras de validação
     */
    private function regras() {
        $this->form_validation->set_rules('nome_curso', 'Curso', 'required|min_length[3]|max_length[150]|is_unique[cursos.nome_curso]');
    }

}
