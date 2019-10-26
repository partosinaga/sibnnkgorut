<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mfile extends CI_Model{
    function __construct() {
        $this->tableName = 'files';
    }
    
    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function getRows(){
        $data = $this->db->query("select * from files");
        return $data->result_array();
    }
    
    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insert($data = array()){
        $insert = $this->db->insert_batch('files',$data);
        return $insert?true:false;
    }

    public function getDataById($nama, $ttl){
        $data = $this->db->query("SELECT id FROM pengaduan WHERE nama = '$nama' AND ttl = '$ttl' ");
        return $data->row();
    }
    
}