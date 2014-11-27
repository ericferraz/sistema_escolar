<?php

/**
 * Classe MunicipioModel
 *
 * @author Eric<ciencias_exatas@hotmail.com.br>
 * @date   13/11/2014
 * @version 1.0
 */
class MunicipioModel extends CI_Model {

    private $tbl = "municipios";

    public function __construct() {
        parent::__construct();
    }

    /**
     * cadastra um determinado municipio
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
     * realiza a listagem dos municipios
     * se for informado o id, lista pelo id
     * se não, irá listar todos cadastrados
     * @param type $id
     * @return type
     */
    public function listar($id = null) {
        try {
            $this->db->select('municipios.*,estados.*');
            $this->db->from($this->tbl);
            $this->db->join('estados', 'estados.id_estado = municipios.id_estado_municipio ');
            if ($id != null) {
                $this->db->where('id_municipio', $id);
                return $this->db->get()->row();
            }
             $this->db->order_by('estados.nome_estado');
             $this->db->order_by('municipios.nome_municipio');
            return $this->db->get()->result();
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
   /**
    * lista os municipios de acordo com o codigo do estado
    * @param type $idEstado
    * @throws Exception
    */
    public function listarPorIdEstado($idEstado) {
        try {
            $this->db->where('id_estado_municipio',$idEstado);
            $this->db->order_by('nome_municipio');
            return $this->db->get($this->tbl)->result();
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * realiza a edição do municipio
     * @param type $id
     * @param type $data(um array de campos, associados a valores recebidos do form
     * @return type
     * @throws Exception
     */
    public function editar($id, $data) {
        try {
            $this->db->where('id_municipio', $id);
            return $this->db->update($this->tbl, $data);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

    /**
     * realiza a exclusão do país
     * @param type $id
     * @return type
     * @throws Exception
     */
    public function excluir($id) {
        try {
            $this->db->where('id_municipio', $id);
            return $this->db->delete($this->tbl);
        } catch (Exception $exc) {
            throw $exc;
        }
    }

}
