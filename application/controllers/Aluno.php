<?php

/**
 * classe  Aluno 
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class Aluno extends CI_Controller {

    private $dirView = "aluno/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('alunoModel');
        $this->load->model('estadoModel');
        $this->load->model('municipioModel');
    }

    /**
     * método principal do controller
     */
    public function index() {
        $data = array();
        try {
            $data['estados'] = $this->estadoModel->listar();
        } catch (Exception $e) {
            $data['erro'] = "Falha ao listar estados" . $e->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-aluno', $data);
    }

    /**
     * esse método é chamado por uma requisição ajax
     * então o id do estado é recuperado e é realizada a consulta de todos
     * municipios relacionadas aquele estado
     */
    public function listarMunicipio($idEstado) {
        try {
            $municipios = $this->municipioModel->listarPorIdEstado($idEstado);
            if (empty($municipios)) {
                echo '<option value="">Nenhum município encontrado</option>';
            } else {
                foreach ($municipios as $m) {
                    echo '<option value="' . $m->id_municipio . '">' . $m->nome_municipio . '</option>';
                }
            }
        } catch (Exception $ex) {
            echo "Erro" . $ex->getMessage();
        }
    }

    public function cadastrar() {
        $this->regras();
        $this->form_validation->set_rules('registro_matricula', 'Matrícula', 'required|min_length[3]|max_length[45]|is_unique[alunos.registro_matricula]');
        if ($this->form_validation->run()) {
            try {
                $data = array(
                    "registro_matricula" => $this->input->post('registro_matricula'),
                    "data_nascimento" => $this->input->post('data_nascimento'),
                    "nome_pai" => $this->input->post('nome_pai'),
                    "nome_mae" => $this->input->post('nome_mae'),
                    "id_municipio_aluno" => $this->input->post('id_municipio_aluno'),
                    "nome_aluno" => $this->input->post('nome_aluno')
                );
                if ($this->alunoModel->cadastrar($data)) {
                    $data['sucesso'] = " cadastrado com sucesso";
                } else {
                    $data['erro'] = "Falha ao cadastrar ";
                }
            } catch (Exception $ext) {
                $data['erro'].=", erro:" . $ext->getMessage();
            }
        }

        try {
            $data['estados'] = $this->estadoModel->listar();
        } catch (Exception $e) {
            $data['erro'] = "Falha ao listar estados" . $e->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-aluno', $data);
    }

    /**
     * listar
     */
    public function listar() {
        try {
            $data['alunos'] = $this->alunoModel->listar();
        } catch (Exception $e) {
            echo "Falha ao listar" . $e->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-aluno', $data);
    }

    /**
     * editar
     * @param type $id
     */
    public function editar($id) {
        if (empty($id) || !is_numeric($id)) {
            redirect('aluno/listar');
        }

        $this->regras();
        $this->form_validation->set_rules('registro_matricula', 'Matrícula', 'required|min_length[3]|max_length[45]');

        //significa que  passou nas regras de validação
        if ($this->form_validation->run()) {
            try {
                $data = array(
                    "registro_matricula" => $this->input->post('registro_matricula'),
                    "data_nascimento" => $this->input->post('data_nascimento'),
                    "nome_pai" => $this->input->post('nome_pai'),
                    "nome_mae" => $this->input->post('nome_mae'),
                    "id_municipio_aluno" => $this->input->post('id_municipio_aluno'),
                    "nome_aluno" => $this->input->post('nome_aluno')
                );
                if ($this->alunoModel->editar($id, $data)) {
                    $data['sucesso'] = " editado com sucesso";
                } else {
                    $data['erro'] = "Falha ao editar ";
                }
            } catch (Exception $ext) {
                $data['erro'].=", erro:" . $ext->getMessage();
            }
        }

        try {
            $data['estados'] = $this->estadoModel->listar();
            $data['alunos'] = $this->alunoModel->listar($id);
        } catch (Exception $e) {
            echo "Falha ao listar" . $e->getMessage();
        }

        $this->template->load($this->dirTemplate, $this->dirView . 'editar-aluno', $data);
    }

    public function excluir($id) {
        try {
            $this->alunoModel->excluir($id);
        } catch (Exception $exc) {
            echo "Falha ao excluir " . $exc->getMessage();
        }
    }

    /**
     * método para setar uma única vez as regras de validação
     */
    private function regras() {
        $this->form_validation->set_rules('nome_aluno', 'Nome do aluno', 'required|min_length[3]|max_length[60]');
        $this->form_validation->set_rules('data_nascimento', 'Data da nascimento', 'required');
        $this->form_validation->set_rules('nome_pai', 'Nome do pai');
        $this->form_validation->set_rules('nome_mae', 'Nome da mãe', 'required|min_length[3]|max_length[60]');
        $this->form_validation->set_rules('id_municipio_aluno', 'Município', 'required|min_length[1]|max_length[11]');
    }

}
