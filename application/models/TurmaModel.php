<?php

/**
 * Classe Turma
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class TurmaModel extends CI_Model {

    private $tbl = "turmas";

    public function __construct() {
        parent::__construct();
    }

    /**
     * cadastrar
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
     * realiza a listagem 
     * se for informado o id, lista pelo id
     * se não, irá listar todos cadastrados
     * @param type $id
     * @return type
     */
    public function listar($id = null) {
        try {
            $this->db->select('turmas.*,cursos.*');
            $this->db->from($this->tbl);
            $this->db->join('cursos','cursos.id_curso = turmas.id_curso_turma ');
            if ($id != null) {
                $this->db->where('id_turma', $id);
                return $this->db->get()->row();
            }
            $this->db->order_by('turmas.nome_turma');
            $this->db->order_by('cursos.nome_curso');
            return $this->db->get()->result();
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
            $this->db->where('id_turma', $id);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * realiza a exclusão
     * @param type $id
     * @return type
     * @throws Exception
     */
    public function excluir($id) {
        try {
            $this->db->where('id_turma', $id);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}
