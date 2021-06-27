<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function index()
    {
        $data['barang'] = $this->m_barang->get_all_data()->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_barang', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_aksi()
    {
        $gambar_barang = $FILES['gambar_barang'];
        if ($gambar_barang = '') {
        } else {
            $config['upload_path']     = './assets/img/barang';
            $config['allowed_types']   = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar_barang')) {
                echo "Upload Gagal";
                die();
            } else {
                $gambar_barang = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'deskripsi_barang' => $this->input->post('deskripsi_barang'),
            'gambar_barang'  => $gambar_barang
        );

        $this->m_barang->input_data($data, 'tb_barang');
        $this->session->set_flashdata('messages', 'Barang sukses ditambahkan!!');
        redirect('barang/index');
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
        $this->session->set_flashdata('messages', 'Barang sukses dihapus!!');
        redirect('barang');
    }

    public function edit($id_barang)
    {
        $where = array('id_barang' => $id_barang);
        $data['barang'] = $this->m_barang->edit_data($where, ' tb_barang')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_barang_edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'deskripsi_barang' => $this->input->post('deskripsi_barang'),
        );
        $where = array('id_barang' => $this->input->post('id_barang'));
        $this->m_barang->update_data($where, $data, 'tb_barang');
        $this->session->set_flashdata('messages', 'Barang sukses di update!!');
        redirect('barang/index');
    }

    public function detail($id_barang)
    {
        $this->load->model('m_barang');

        $detail = $this->m_barang->detail_data($id_barang);
        $data['detail'] = $detail;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_barang_detail', $data);
        $this->load->view('templates/footer');
    }
}
