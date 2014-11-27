<?php

/**
 * Classe Matricula
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   14/11/2014
 * @version 1.0
 */
class Matricula extends CI_Controller {

    private $dirView = "matricula/";
    private $dirTemplate = "templates/template";

    public function __construct() {
        parent::__construct();
        $this->load->model('alunoModel');
        $this->load->model('turmaModel');
        $this->load->model('matriculaModel');
        require 'fpdf/fpdf.php';
    }

    /**
     * método principal do controller
     */
    public function index() {
        $data = array();
        try {
            $data['alunos'] = $this->alunoModel->listar();
            $data['turmas'] = $this->turmaModel->listar();
        } catch (Exception $e) {
            $data['erro'] = "Falha ao listar estados" . $e->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-matricula', $data);
    }

    public function matricular() {
        $this->regras();
        if ($this->form_validation->run()) {
            try {
                $data = array(
                    "data_matricula" => $this->input->post('data_matricula'),
                    "id_aluno_matricula" => $this->input->post('id_aluno_matricula'),
                    "id_turma_matricula" => $this->input->post('id_turma_matricula')
                );
                if ($this->matriculaModel->cadastrar($data)) {
                    $data['sucesso'] = " cadastrado com sucesso";
                } else {
                    $data['erro'] = "Falha ao cadastrar ";
                }
            } catch (Exception $ext) {
                $data['erro'].=", erro:" . $ext->getMessage();
            }
        }

        try {
            $data['alunos'] = $this->alunoModel->listar();
            $data['turmas'] = $this->turmaModel->listar();
        } catch (Exception $e) {
            $data['erro'] = "Falha ao listar dados" . $e->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'cadastrar-matricula', $data);
    }

    /**
     * listar
     */
    public function listar() {
        try {
            $data['matriculas'] = $this->matriculaModel->listar();
        } catch (Exception $e) {
            echo "Falha ao listar" . $e->getMessage();
        }
        $this->template->load($this->dirTemplate, $this->dirView . 'listar-matricula', $data);
    }

    /**
     * utilizado na requisição ajax para preencher a combo 
     * @param type $nome
     */
    public function listarAlunoPorNome($nome) {
        $nome = strip_tags(trim($nome));
        try {
            $alunos = $this->alunoModel->listarAlunoPorNome($nome);
            if (empty($alunos)) {
                echo '<option value="">Nenhum aluno encontrado</option>';
            } else {
                foreach ($alunos as $a) {
                    echo '<option value="' . $a->id_aluno . '">' . $a->nome_aluno . '</option>';
                }
            }
        } catch (Exception $ex) {
            echo "Erro" . $ex->getMessage();
        }
    }

    public function buscarAluno($nome) {
        try {
            $alunos = $this->alunoModel->listarAlunoPorNome($nome);
            if (!empty($alunos)) {
                echo $alunos[0]->nome_aluno;
            }
        } catch (Exception $ex) {
            echo "Erro" . $ex->getMessage();
        }
    }

    /**
     * editar
     * @param type $id
     */
    public function editar($id) {
        if (empty($id) || !is_numeric($id)) {
            redirect('matricula/listar');
        }

        $this->regras();

        if ($this->form_validation->run()) {
            try {
                $data = array(
                    "data_matricula" => $this->input->post('data_matricula'),
                    "id_aluno_matricula" => $this->input->post('id_aluno_matricula'),
                    "id_turma_matricula" => $this->input->post('id_turma_matricula')
                );
                if ($this->matriculaModel->editar($id, $data)) {
                    $data['sucesso'] = " editado com sucesso";
                } else {
                    $data['erro'] = "Falha ao editar ";
                }
            } catch (Exception $ext) {
                $data['erro'].=", erro:" . $ext->getMessage();
            }
        }
        try {
            $data['alunos'] = $this->alunoModel->listar();
            $data['turmas'] = $this->turmaModel->listar();
            $data['matriculas'] = $this->matriculaModel->listar($id);
        } catch (Exception $e) {
            echo "Falha ao listar" . $e->getMessage();
        }

        $this->template->load($this->dirTemplate, $this->dirView . 'editar-matricula', $data);
    }

    public function excluir($id) {
        try {
            $this->matriculaModel->excluir($id);
        } catch (Exception $exc) {
            echo "Falha ao excluir " . $exc->getMessage();
        }
    }

    public function relatorio() {
        try {
            $data['matriculas'] = $this->matriculaModel->filtrar();
            if ($this->input->post('relatorio')) {
                if (!empty($data['matriculas'])) {
                    $pdf = new FPDF();
                    $pdf->AddPage('P', 'A4');
                   
                    //CABEÇALHO DO RELATÓRIO
                    $pdf->SetFont('Arial', 'B', 15);
                    $pdf->Cell(80);
                    //'matrículas' centralizado no meio da página
                    $pdf->Cell(30, 10,  utf8_decode('Matrículas'), 0, 0, 'C'); 
                    $pdf->Ln(20);

                    //CABEÇALHO DA TABELA
                    $pdf->SetFont('Arial', 'B', 10);
                    $pdf->Cell(30, 7, 'Aluno', 1);
                    $pdf->Cell(30, 7, utf8_decode('Município-UF'), 1);
                    $pdf->Cell(65, 7, 'Curso', 1);
                    $pdf->Cell(48, 7, 'Turma', 1);
                    $pdf->Cell(20, 7, 'Dt. mat.', 1);
                    $pdf->Ln();

                    //POPULANDO A TABELA
                    $pdf->SetFont('Arial', '', 10);
                    foreach ($data['matriculas'] as $row) {
                        $pdf->Cell(30, 6, utf8_decode($row->nome_aluno), 1);
                        $pdf->Cell(30, 6, utf8_decode($row->nome_municipio . '-'.$row->sigla_estado), 1);
                        $pdf->Cell(65, 6, utf8_decode($row->nome_curso), 1);
                        $pdf->Cell(48, 6, utf8_decode($row->nome_turma), 1);
                        $pdf->Cell(20, 6, parseDateBancoToUser($row->data_matricula), 1);
                        $pdf->Ln();
                    }
                    $pdf->Output('relatorio_matriculas_' . date('d/m/Y H:i:s') . '.pdf', 'D');
                } else {
                    $data['erro'] = "Nenhuma matrícula disponível para gerar relatório";
                }
            }
        } catch (Exception $e) {
            echo "Falha ao listar" . $e->getMessage();
        }

        $this->template->load($this->dirTemplate, $this->dirView . 'relatorio-matricula', $data);
    }

    /**
     * método para setar uma única vez as regras de validação
     */
    private function regras() {
        $this->form_validation->set_rules('data_matricula', 'Data da matrícula', 'required');
        $this->form_validation->set_rules('id_aluno_matricula', 'Aluno', 'required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('id_turma_matricula', 'Turma', 'required|min_length[1]|max_length[11]');
    }

}
