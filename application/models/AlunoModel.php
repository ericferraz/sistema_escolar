<?php

/**
 * class AlunoModel
 * @author Eric
 * @date 03/09/2014 23:45
 */
class AlunoModel extends CI_Model {

    private $tbl = "alunos";

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
     * realiza a edição do aluno
     * @param type $id
     * @param type $data(um array de campos, associados a valores recebidos do form
     * @return type
     * @throws Exception
     */
    public function editar($id, $data) {
        try {
            $this->db->where('id_aluno', $id);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * listar
     * lista os alunos cadastrados no sistema
     * se for informado o id, lista por id, caso contrario
     * lista todos
     * @param type $id
     * @return type
     */
    public function listar($id = null) {
        try {
            $this->db->select('alunos.*,municipios.*,estados.*');
            $this->db->from($this->tbl);
            $this->db->join('municipios', 'municipios.id_municipio = alunos.id_municipio_aluno');
            $this->db->join('estados', 'municipios.id_estado_municipio = estados.id_estado');
            if ($id != null) {
                $this->db->where('id_aluno', $id);
                return $this->db->get()->row();
            }
            return $this->db->get()->result();
        } catch (Exception $exc) {
            throw $e;
        }
    }

    public function excluir($id) {
        try {
            $this->db->where('id_aluno', $id);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    public function listarAlunoPorNome($nome) {
        try {
            $this->db->like('nome_aluno', $nome);
            return $this->db->get($this->tbl)->result();
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}
