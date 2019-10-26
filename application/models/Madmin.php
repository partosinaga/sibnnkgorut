<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Madmin extends CI_Model
{

    function update($table_name, $where = array(), $data = array())
    {
        $this->db->where($where);
        $this->db->update($table_name, $data);
    }

    function getPengaduanList($is_count = false, $where = array(), $like = array(), $order_by = "", $limit_row = 0, $limit_start = 0)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        if (count($where) > 0) {
            $this->db->where($where);
        }
        if (count($like) > 0) {
            $this->db->like($like);
        }
        if ($order_by != "") {
            $this->db->order_by($order_by);
        }
        if ($limit_row > 0) {
            $this->db->limit($limit_row, $limit_start);
        }
        if ($is_count) {
            return $this->db->count_all_results();
        } else {
            return $this->db->get();
        }
    }

    function getPengaduan($tgl_awal, $tgl_ahir)
    {
        $this->db->select("p.*, f.file_name ");
        $this->db->from("pengaduan p");
        $this->db->join("files f", " p.id = f.idPengaduan ");
        $this->db->where("p.tanggal >=", $tgl_awal);
        $this->db->where("p.tanggal <=", $tgl_ahir);
        return $this->db->get();
    }
    function getHead($tgl_awal, $tgl_ahir)
    {
        $this->db->select("p.*");
        $this->db->from("pengaduan p");
        $this->db->where("p.tanggal >=", $tgl_awal);
        $this->db->where("p.tanggal <=", $tgl_ahir);
        return $this->db->get();
    }
    function getFiles()
    {
        $this->db->select("*");
        $this->db->from("files");
        return $this->db->get();
    }
    function getMarkers()
    {
        $this->db->select("*");
        $this->db->from("peta_rawan");
        return $this->db->get();
    }

    function getSummarize(){
        $data = $this->db->query("select count(id) as total, kecamatan from peta_rawan GROUP BY kecamatan");
        return $data->result();
    }

    function getPetaRawanList($is_count = false, $where = array(), $like = array(), $order_by = "", $limit_row = 0, $limit_start = 0)
    {
        $this->db->select('*');
        $this->db->from('peta_rawan');
        if (count($where) > 0) {
            $this->db->where($where);
        }
        if (count($like) > 0) {
            $this->db->like($like);
        }
        if ($order_by != "") {
            $this->db->order_by($order_by);
        }
        if ($limit_row > 0) {
            $this->db->limit($limit_row, $limit_start);
        }
        if ($is_count) {
            return $this->db->count_all_results();
        } else {
            return $this->db->get();
        }
    }
}
