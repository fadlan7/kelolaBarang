<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function index()
    {
        $data['barang'] = $this->m_barang->get_all_data()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_barang',$data);
        $this->load->view('templates/footer');
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi_barang'),
            'gambar' => $this->input->post('gambar_barang'),
        );

        $this->m_barang->add($data, 'tb_barang');
        redirect('barang/index');
    }

    //Update one item
    public function update($id = NULL)
    {
    }

    //Delete one item
    public function delete($id_barang = NULL)
    {
        //delete images
        $barang = $this->m_barang->get_data($id_barang);
        if ($barang->gambar_barang != "") {
            unlink('./assets/img/barang/' . $barang->gambar_barang);
        }

        $data = array('id_barang' => $id_barang);
        $this->m_barang->delete($data);
        $this->session->set_flashdata('messages', 'Barang has been deleted successfully !!');
        redirect('barang');
    }
}
