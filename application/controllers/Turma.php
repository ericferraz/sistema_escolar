<?php

/**
 * Classe Turma
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class Turma extends CI_Controller {

    private $dirView = "turma/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('cursoModel');
        $this->load->model('turmaModel');
    }

    public function index() {
        $data = array();
        try {
            $data['cursos'] = $this->cursoModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar cursos' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-turma', $data);
    }

    /**
     * cadastra estado
     */
    public function cadastrar() {
        $this->regras();
        if ($this->form_validation->run()) {
            try {
                $data = array(
                    "nome_turma" => $this->input->post('nome_turma'),
                    "id_curso_turma" => $this->input->post('id_curso_turma')
                );
                if ($this->turmaModel->cadastrar($data)) {
                    $data['sucesso'] = 'Cadastrado com sucesso';
                } else {
                    $data['erro'] = 'Falha ao cadastrar ';
                }
            } catch (Exception $exc) {
                $data['erro'].=' ,erro : ' . $exc->getMessage();
            }
        }
        try {
            $data['cursos'] = $this->cursoModel->listar();
            $data['turmas'] = $this->turmaModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar ' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-turma', $data);
    }

    /**
     * realiza a edição 
     * @param type $id
     */
    public function editar($id) {
        $data = array();
        $this->form_validation->set_rules('nome_turma', 'Turma', 'required|min_length[3]|max_length[150]');
        $this->form_validation->set_rules('id_curso_turma', 'Curso', 'required|min_length[1]|max_length[11]');

        if (empty($id) || !is_numeric($id)) {
            redirect('turma/listar');
        }

        if ($this->form_validation->run()) {
            try {
                //preenche um array associativo de campos(do bd) com valores do form
                $data = array(
                    "nome_turma" => $this->input->post('nome_turma'),
                    "id_curso_turma" => $this->input->post('id_curso_turma')
                );
                if ($this->turmaModel->editar($id, $data)) {
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
            $data['cursos'] = $this->cursoModel->listar();
            $data['turmas'] = $this->turmaModel->listar($id);
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao editar:' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'editar-turma', $data);
    }

    /**
     * realiza a exclusão
     * @param type $id
     */
    public function excluir($id) {
        try {
            $this->turmaModel->excluir($id);
        } catch (Exception $exc) {
            echo "Falha na exclusão" . $exc->getMessage();
        }
    }

    /**
     * listagem 
     */
    public function listar() {
        try {
            $data['turmas'] = $this->turmaModel->listar();
        } catch (Exception $exc) {
            $data['erro'] = 'Falha ao listar estados' . $exc->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-turma', $data);
    }

    private function regras() {
        $this->form_validation->set_rules('nome_turma', 'Turma', 'required|min_length[3]|max_length[150]|is_unique[turmas.nome_turma]');
        $this->form_validation->set_rules('id_curso_turma', 'Curso', 'required|min_length[1]|max_length[11]');
    }

}
