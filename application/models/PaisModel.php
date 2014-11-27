<?php

/**
 * Classe PaisModel
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class PaisModel extends CI_Model {

    private $tbl = "paises";

    public function __construct() {
        parent::__construct();
    }

    /**
     * cadastra um determinado país
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
    public function listar($idPais = null) {
        try {
            if ($idPais != null) {
                $this->db->where('id_pais', $idPais);
                return $this->db->get($this->tbl)->row();
            }
            $this->db->order_by('nome_pais');
            return $this->db->get($this->tbl)->result();
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
  /**
   * realiza a edição do país
   * @param type $idPais
   * @param type $data(um array de campos, associados a valores recebidos do form
   * @return type
   * @throws Exception
   */
    public function editar($idPais, $data) {
        try {
            $this->db->where('id_pais', $idPais);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    /**
     * realiza a exclusão do país
     * @param type $idPais
     * @return type
     * @throws Exception
     */
    public function excluir($idPais){
        try {
            $this->db->where('id_pais', $idPais);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        } 
    }

}
