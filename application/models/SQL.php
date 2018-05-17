<?php

class SQL extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }

    function getBDD($table, $where = null, $jointure = null, $order = null, $limit = null)
    {

        if($jointure !== null) {
            $this->db->join($jointure['table'], $table.'.id ='.$jointure['table'].'.'.$jointure['champs']);
        }

        if ($where !== null)
            $this->db->where($table.'.'.$where['champs'], $where['value']);

        if ($limit !== null)
            $this->db->limit($limit);

        $query = $this->db->get($table);
        
        if ($query->num_rows() >= 1)
            return $query->result();

        return false;
    }



}
