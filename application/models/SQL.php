<?php

class SQL extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
    }

    // Fonction permettant de faciliter les requêtes
    function getBDD($sql)
    {
        if (isset($sql['select']))
            $this->db->select($sql['select']);

        if (isset($sql['join'])) {
            foreach($sql['join'] as $j) {
                $champsTable = (isset($j['champsTable'])) ? $j['champsTable'] : 'id';
                $this->db->join($j['table'], $sql['table'].'.'.$champsTable.'='.$j['table'].'.'.$j['champs']);
            }
        }

        if (isset($sql['where']) && $sql['where'])
            foreach($sql['where'] as $w)
                if(strpos($w['champs'], '(') > 1)
                    $this->db->where($w['champs'], $w['value']);
                else
                    $this->db->where($sql['table'].'.'.$w['champs'], $w['value']);

        if (isset($sql['group']))
            foreach($sql['group'] as $g)
                $this->db->group_by($g['champs']);

        if (isset($sql['order']))
            foreach($sql['order'] as $o)
                $this->db->order_by($o['champs'], $o['order']);

        if (isset($sql['limit']))
            $this->db->limit($sql['limit']);

        $query = $this->db->get($sql['table']);

        if ($query->num_rows() == 1)
            return $query->row();
        elseif ($query->num_rows() >= 1)
            return $query->result();

        return false;
    }

    // Fonction permettant de limiter le nombre de retour (à 50 par défaut)
    function getLimit($limit) 
    { 
       return ($limit !== null) ? $limit : '50';
    }

    // Fonction permetant la récupération de la date, par jours, mois et année
    function getDate($date) 
    { 
       return ($date !== null) ? explode("-", $this->get('date')) : array(date("Y"), date("m"), date("d"));
    }

    // Fonction permettant de rechercher par id ou symbol
    function getWhere($id, $symbol = null)
    {
        if ($id) {
            $where = array(
                0 => array(
                    'champs' => 'id',
                    'value' => $id
                ),
            );
        } elseif ($symbol) {
            $where = array(
                0 => array(
                    'champs' => 'symbol',
                    'value' => strtoupper($symbol)
                ),
            ); 
        }

        return (isset($where)) ? $where : false;
    }

    // Fonction pour le cache
    function getCache($name, $sql) 
    {
        if (!$data = $this->cache->get($name)) {
            $data =$this->sql->getBDD($sql);
            $this->cache->save($name, $data, 300);
        }

        return $data;
    }

    // Fonction d'insertion dans la BDD
    function insertBDD($table, $data) 
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }

    // Fonction d'Update de la BDD
    function updateBDD($table, $id, $data)
    {        
        $query = $this->db->where('id', $id)
                    ->update($table, $data);

        return true;
    }

}
