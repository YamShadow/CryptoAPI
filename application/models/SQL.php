<?php

class SQL extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }

    function getBDD($table, $where = null, $jointure = null, $order = null, $limit = null)
    {

        if($jointure) {
            foreach($jointure as $j)
                $this->db->join($j['table'], $table.'.id ='.$j['table'].'.'.$j['champs']);
        }

        if ($where)
            foreach($where as $w)
                $this->db->where($table.'.'.$w['champs'], $w['value']);

        if($order)
            foreach($order as $o)
                $this->db->order_by($o['champs'], $o['order']);

        if ($limit)
            $this->db->limit($limit);

        $query = $this->db->get($table);
        
        if ($query->num_rows() >= 1)
            return $query->result();

        return false;
    }

    function getLimit($limit) { 
       return ($limit !== null) ? $limit : '50';
    }

    function getWhere($id, $symbol = null) {

        if ($id) {
            $where = array(
                0 => array(
                    'champs' => 'id',
                    'value' => $id
                ),
            );
        } else if ($symbol) {
            $where = array(
                0 => array(
                    'champs' => 'symbol',
                    'value' => strtoupper($symbol)
                ),
            ); 
        }

        return (isset($where)) ? $where : false;
    }

    function getCache($name, $table, $where, $jointure, $order, $limit) {

        if (!$data = $this->cache->get($name)) {
            $data =$this->sql->getBDD($table, $where, $jointure, $order, $limit);
            $this->cache->save($name, $data, 300);
        }

        return $data;
    }

    function insertBDD($table, $data) 
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    function updateBDD($table, $id, $data)
    {        
        $query = $this->db->where('id', $id)
                    ->update($table, $data);

        return true;
        // if($query->affected_rows() >=1)
        //     return true;
        // return false;
    }

}
