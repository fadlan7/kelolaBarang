<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public function get_all_data()
    {
        return $this->db->get('tb_barang');
    }

    public function get_data($id_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function input_data($data)
    {
        $this->db->insert('tb_barang', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->delete('tb_barang', $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
