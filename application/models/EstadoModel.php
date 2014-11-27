<?php

/**
 * Classe EstadoModel
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class EstadoModel extends CI_Model {

    private $tbl = "estados";

    public function __construct() {
        parent::__construct();
    }

    /**
     * cadastra um determinado estado
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
     * realiza a listagem dos países
     * se for informado o id, lista pelo id
     * se não, irá listar todos cadastrados
     * @param type $idPais
     * @return type
     */
    public function listar($id = null) {
        try {
            $this->db->select('estados.*,paises.*');
            $this->db->from($this->tbl);
            $this->db->join('paises','paises.id_pais = estados.id_pais_estado');
            if ($id != null) {
                $this->db->where('id_estado', $id);
                return $this->db->get()->row();
            }
            return $this->db->get()->result();
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
  /**
   * realiza a edição do estado
   * @param type $id
   * @param type $data(um array de campos, associados a valores recebidos do form
   * @return type
   * @throws Exception
   */
    public function editar($id, $data) {
        try {
            $this->db->where('id_estado', $id);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    /**
     * realiza a exclusão do estado
     * @param type $id
     * @return type
     * @throws Exception
     */
    public function excluir($id){
        try {
            $this->db->where('id_estado', $id);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        } 
    }

}
