<?php

class Darah_model {
    private $table = 'darah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

public function getAllDarah(){
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
}
public function getDatabyGoldar($goldar){
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE goldar = :goldar');
    $this->db->bind('goldar',$goldar);
    return $this->db->single();
}

public function ubahDataStok($data)
{
    $query = "UPDATE darah SET stok = :stok WHERE goldar = :goldar";
    $this->db->query($query);
    $this->db->bind('stok',$data['stok']);
    $this->db->bind('goldar',$data['goldar']);

    $this->db->execute();

    return $this->db->rowCount();

}


}