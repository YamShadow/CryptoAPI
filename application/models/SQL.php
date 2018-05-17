<?php

class SQL extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }

    function getBDD($table, $where = null, $limit = null)
    {
        if ($where !== null)
            $this->db->where($where['champs'], $where['value']);

        if ($limit !== null)
            $this->db->limit($limit);

        $query = $this->db->get($table);
        
        if ($query->num_rows() >= 1)
            return $query->result();

        return false;
    }



}
