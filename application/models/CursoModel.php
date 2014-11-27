<?php

/**
 * Classe CursoModel
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class CursoModel extends CI_Model {

    private $tbl = "cursos";

    public function __construct() {
        parent::__construct();
    }

    /**
     * cadastra um determinado curso
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
     * realiza a listagem dos cursos
     * se for informado o id, lista pelo id
     * se não, irá listar todos cadastrados
     * @param type $id
     * @return type
     */
    public function listar($id = null) {
        try {
            if ($id != null) {
                $this->db->where('id_curso', $id);
                return $this->db->get($this->tbl)->row();
            }
            $this->db->order_by('nome_curso');
            return $this->db->get($this->tbl)->result();
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * realiza a edição do curso
     * @param type $id
     * @param type $data(um array de campos, associados a valores recebidos do form
     * @return type
     * @throws Exception
     */
    public function editar($id, $data) {
        try {
            $this->db->where('id_curso', $id);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * realiza a exclusão do curso
     * @param type $id
     * @return type
     * @throws Exception
     */
    public function excluir($id) {
        try {
            $this->db->where('id_curso', $id);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}
