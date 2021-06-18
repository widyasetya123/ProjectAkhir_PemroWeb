<?php

class Pendonor_model {
    private $table = 'pendonor';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

public function getAllPendonor(){
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
}
public function getDatabyDonor($id){
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE pendonorID = :id');
    $this->db->bind('id',$id);
    return $this->db->single();
}

public function tambahDataDonor($data)
{
    $query = "INSERT INTO pendonor VALUES (:id, :nama, :jk, :alamat, :noHP, :goldar, :usia, CURRENT_TIMESTAMP())";
    $this->db->query($query);
    $this->db->bind('id',null);
    $this->db->bind('nama',$data['nama']);
    $this->db->bind('jk',$data['kelamin']);
    $this->db->bind('alamat',$data['alamat']);
    $this->db->bind('noHP',$data['noHP']);
    $this->db->bind('goldar',$data['goldar']);
    $this->db->bind('usia',$data['usia']);


    $this->db->execute();

    return $this->db->rowCount();

}

public function ubahDataDonor($data)
{
    $query = "UPDATE pendonor SET nama = :nama, jk= :jk, alamat= :alamat,noHP= :noHP,goldar= :goldar,usia= :usia WHERE nama = :id";
    $this->db->query($query);
    $this->db->bind('nama',$data['nama3']);
    $this->db->bind('jk',$data['kelamin2']);
    $this->db->bind('alamat',$data['alamat2']);
    $this->db->bind('noHP',$data['noHP2']);
    $this->db->bind('goldar',$data['goldar2']);
    $this->db->bind('usia',$data['usia2']);
    $this->db->bind('id',$data['identitas2']);

    $this->db->execute();

    return $this->db->rowCount();

}


public function hapusDataPendonor($id){
    $this->db->query('DELETE FROM pendonor WHERE pendonorID = :id');
    $this->db->bind('id',$id);
    
    $this->db->execute();

    return $this->db->rowCount();
}

}