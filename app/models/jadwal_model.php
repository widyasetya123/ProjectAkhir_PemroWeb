<?php

class Jadwal_model {
    private $table = 'jadwal';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

public function getAllJadwal(){
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
}
public function getDatabyJadwal($id){
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jadwalID = :id');
    $this->db->bind('id',$id);
    return $this->db->single();
}

public function tambahDataJadwal($data)
{
    $query = "INSERT INTO jadwal VALUES (:id, :nama, :lokasi, :tanggal)";
    $this->db->query($query);
    $this->db->bind('id',null);
    $this->db->bind('nama',$data['nama']);
    $this->db->bind('lokasi',$data['lokasi']);
    $this->db->bind('tanggal',$data['tanggal']);

    $this->db->execute();

    return $this->db->rowCount();

}
public function ubahDataJadwal($data)
{
    $query = "UPDATE jadwal SET nama = :nama2,  lokasi = :lokasi2, tanggal = :tanggal2 WHERE nama =:id";
    $this->db->query($query);
    $this->db->bind('nama2',$data['nama2']);
    $this->db->bind('lokasi2',$data['lokasi2']);
    $this->db->bind('tanggal2',$data['tanggal2']);
    $this->db->bind('id',$data['identitas']);

    $this->db->execute();

    return $this->db->rowCount();

}


public function hapusDataJadwal($id){
    $this->db->query('DELETE FROM jadwal WHERE jadwalID = :id');
    $this->db->bind('id',$id);
    
    $this->db->execute();

    return $this->db->rowCount();
}

}