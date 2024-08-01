<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_gadai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('GadaiModel');
        $this->load->model('BankingModel');
        if ($this->session->userdata('masuk') != "true" || $this->session->userdata('hak_akses') != "jastip") {
            redirect(base_url("login"));
        }
    }


    public function index()
    {
        $data['title'] = 'Form Gadai : Apps JasTip';
        $data['banks'] = json_decode(json_encode($this->BankingModel->get_items()), true);
        $data['customers'] = json_decode(json_encode($this->GadaiModel->get_items()), true);

        // Load view dan kirim data ke view
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('gadai/form_gadai', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function store()
    {
        // Mengambil data dari POST request
        $pelanggan_id = $this->input->post('pelanggan_id');
        $asal_barang_jaminan = $this->input->post('asal_barang_jaminan');
        $status_transaksi = $this->input->post('status_transaksi');
        $cara_pembayaran = $this->input->post('cara_pembayaran');
        $banks_id = $this->input->post('banks_id');
        $pengambilan_uang = $this->input->post('pengambilan_uang');
        $besar_pinjaman = $this->input->post('besar_pinjaman');
        $barang_jaminan_diserahkan = $this->input->post('barang_jaminan_diserahkan');

        // Validasi data jika diperlukan

        $data = array(
            'jastip_id' => $this->session->userdata('id'),
            'pelanggan_id' => $pelanggan_id,
            'asal_barang_jaminan' => $asal_barang_jaminan,
            'status_transaksi' => $status_transaksi,
            'cara_pembayaran' => $cara_pembayaran,
            'banks_id' => $banks_id,
            'pengambilan_uang' => $pengambilan_uang,
            'besar_pinjaman' => $besar_pinjaman,
            'barang_jaminan_diserahkan' => $barang_jaminan_diserahkan
        );

        $result = $this->GadaiModel->insert($data);

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Sukses!<br>Data Berhasil Disimpan!',
                'redirect' => base_url('customers-gadai')
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Gagal menyimpan data.'
            );
        }

        echo json_encode($response);
    }
}

/* End of file Form_gadai.php */
