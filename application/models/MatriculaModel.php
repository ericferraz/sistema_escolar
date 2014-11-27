<?php

/**
 * Classe MatriculaModel
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   14/11/2014
 * @version 1.0
 */
class MatriculaModel extends CI_Model {
    private $tbl = "matriculas";

    public function __construct() {
        parent::__construct();
    }

    /**
     * cadastra um determinado aluno
     * @param type $data(um array de campos, associados a valores recebidos do form
     * @return type
     * @throws Exception
     */
    public function cadastrar($data) {
        try {
            return $this->db->insert($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * realiza a edição 
     * @param type $id
     * @param type $data(um array de campos, associados a valores recebidos do form
     * @return type
     * @throws Exception
     */
    public function editar($id, $data) {
        try {
            $this->db->where('id_matricula', $id);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * listar
     * lista os alunos matriculados
     * @param type $id
     * @return type
     */
    public function listar($id = null) {
        try {
            $this->db->select('matriculas.*,alunos.*,turmas.*');
            $this->db->from($this->tbl);
            $this->db->join('alunos','alunos.id_aluno = matriculas.id_aluno_matricula');
            $this->db->join('turmas', 'turmas.id_turma = matriculas.id_turma_matricula');
            $this->db->order_by('alunos.nome_aluno');
           
            if ($id != null) {
                $this->db->where('id_matricula', $id);
                return $this->db->get()->row();
            }
            $this->db->order_by('alunos.nome_aluno');
            $this->db->order_by('turmas.nome_turma');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            throw $e;
        }
    }
    
    /**
     * realiza a filtragem por alguns campos
     * @param type $registro_matricula
     * @param type $id_curso
     * @param type $id_turma
     * @return type
     * @throws type
     */
    public function filtrar($nome_aluno=null,$registro_matricula=null,$nome_curso=null,$nome_turma=null){
        try {
            $this->db->select('matriculas.*,alunos.*,turmas.*,cursos.*,municipios.*,estados.sigla_estado,estados.id_estado');
            $this->db->from($this->tbl);
            $this->db->join('alunos','alunos.id_aluno = matriculas.id_aluno_matricula');
            $this->db->join('turmas', 'turmas.id_turma = matriculas.id_turma_matricula');
            $this->db->join('cursos', 'cursos.id_curso = turmas.id_curso_turma');
            $this->db->join('municipios', 'municipios.id_municipio = alunos.id_municipio_aluno');
            $this->db->join('estados', 'estados.id_estado = municipios.id_estado_municipio');
            $this->db->order_by('alunos.nome_aluno');
           
            if ($nome_aluno != null) {
                 $this->db->like('alunos.nome_aluno', $nome_aluno);
            }
            if ($registro_matricula != null) {
                 $this->db->like('alunos.registro_matricula', $registro_matricula);
            }
            if ($nome_curso != null) {
                 $this->db->like('cursos.nome_curso', $nome_curso);
            }
            if ($nome_turma != null) {
                 $this->db->like('turmas.nome_turma', $nome_turma);
            }
            return $this->db->get()->result();
        } catch (Exception $exc) {
            throw $e;
        }
    }

    public function excluir($id) {
        try {
            $this->db->where('id_matricula', $id);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
}
