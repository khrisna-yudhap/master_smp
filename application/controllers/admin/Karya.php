<?php
class Karya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url('administrator');
            redirect($url);
        };
        $this->load->model('M_karya');
        $this->load->library('upload');
    }

    function index()
    {
        $this->data['data'] = $this->M_karya->get_all_karya();

        $this->data['breadcrumb']  = 'Data Karya Tulis';

        $this->data['main_view']   = 'admin/v_karya';

        $this->load->view('theme/admintemplate', $this->data);
    }

    function add_karya()
    {
        $this->data['breadcrumb']  = 'Tambah Karya Tulis';

        $this->data['main_view']   = 'admin/v_karya_add';

        $this->load->view('theme/admintemplate', $this->data);
    }

    function simpan_karya()
    {
        $judul_karya = $this->input->post('judul_karya');
        $isi_karya = $this->input->post('isi_karya');
        $nama_penulis = $this->input->post('nama_penulis');
        $jenis_karya = $this->input->post('jenis_karya');
        $this->M_karya->simpan_karya($judul_karya, $isi_karya, $nama_penulis, $jenis_karya);
        echo $this->session->set_flashdata('msg', 'success');
        redirect('admin/karya');
    }
    function edit_karya($id)
    {

        $this->data['data'] = $this->M_karya->getKaryaById($id);

        $this->data['breadcrumb']  = 'Ubah Karya';

        $this->data['main_view']   = 'admin/v_karya_edit';


        $this->load->view('theme/admintemplate', $this->data);
    }

    function update_karya()
    {
        $karya_id = $this->input->post('karya_id');
        $judul_karya = $this->input->post('judul_karya');
        $isi_karya = $this->input->post('isi_karya');
        $nama_penulis = $this->input->post('nama_penulis');
        $jenis_karya = $this->input->post('jenis_karya');

        $this->M_karya->update_karya($karya_id, $judul_karya, $isi_karya, $nama_penulis, $jenis_karya);
        redirect('admin/karya');
    }

    function hapus_karya()
    {
        $id = strip_tags($this->input->post('karya_id'));
        $this->M_karya->hapus_karya($id);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('admin/karya');
    }

    //comment control

    function comment_control()
    {
        $data['comment_data'] = $this->M_karya->get_all_comment();
        $data['breadcrumb'] = 'Kelola Komentar - Karya Tulis';
        $data['main_view'] = 'admin/v_karya_comment';

        $this->load->view('theme/admintemplate', $data);
    }

    function add_comment()
    {
    }

    function update_comment()
    {
        $comment_id = $this->input->post('komentar_id');
        $comment_active = $this->input->post('comment_active');

        $this->M_karya->update_comment($comment_id, $comment_active);
        redirect('admin/karya/comment_control');
    }

    function delete_comment($comment_id)
    {
        $this->M_karya->delete_comment($comment_id);

        redirect('admin/karya/comment_control');
    }
}
