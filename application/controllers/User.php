<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be same as current!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function testing()
    {
        echo $this->session->userdata['user_id'];
    }

    public function dataKeluarga()
    {
        $data['title'] = 'Data Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_model', 'users');

        $data['dataKeluarga'] = $this->users->getKeluargaById();
        $data['users'] = $this->db->get('data_keluarga')->result_array();

        $data['kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['agama'] = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $data['pendidikan'] = ['Tidak/Belum Sekolah', 'Tidak Tamat SD/Sederajat', 'Tamat SD/Sederajat', 'SLTP/Sederajat', 'SLTA/Sederajat', 'Diploma I/II', 'Akademi/Diploma III/Sarjana Muda', 'Diploma IV/Strata I', 'Strata II', 'Strata III'];
        $data['status'] = ['Kepala Keluarga', 'Istri', 'Anak'];

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/datakeluarga', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'nik' => $this->input->post('nik'),
                'kelamin' => $this->input->post('kelamin'),
                'tempatlahir' => $this->input->post('tempatlahir'),
                'tanggallahir' => $this->input->post('tanggallahir'),
                'alamat' => $this->input->post('alamat'),
                'agama' => $this->input->post('agama'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status' => $this->input->post('status'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                'user_id' => $this->session->userdata('user_id'),
            ];

            $this->db->where('email', $this->session->userdata('email'));
            $this->db->insert('data_keluarga', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Keluarga Added!</div>');
            redirect('user/datakeluarga');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Details Data Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['detail'] = $this->db->get_where('data_keluarga', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_keluarga');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('user/datakeluarga/');
    }

    public function editDataKeluarga($id)
    {
        $data['title'] = 'Edit Data Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['editDataKeluarga'] = $this->db->get_where('data_keluarga', ['id' => $id])->row_array();

        $data['kelamin'] = ['Laki-Laki', 'Perempuan'];
        $data['agama'] = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $data['pendidikan'] = ['Tidak/Belum Sekolah', 'Tidak Tamat SD/Sederajat', 'Tamat SD/Sederajat', 'SLTP/Sederajat', 'SLTA/Sederajat', 'Diploma I/II', 'Akademi/Diploma III/Sarjana Muda', 'Diploma IV/Strata I', 'Strata II', 'Strata III'];
        $data['status'] = ['Kepala Keluarga', 'Istri', 'Anak'];

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-data-keluarga', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'nik' => $this->input->post('nik'),
                'kelamin' => $this->input->post('kelamin'),
                'tempatlahir' => $this->input->post('tempatlahir'),
                'tanggallahir' => $this->input->post('tanggallahir'),
                'alamat' => $this->input->post('alamat'),
                'agama' => $this->input->post('agama'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'status' => $this->input->post('status'),
                'kewarganegaraan' => $this->input->post('kewarganegaraan'),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('data_keluarga', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Keluarga Berhasil Di Updated!</div>');
            redirect('user/datakeluarga');
        }
    }

    public function home()
    {
        $data['title'] = 'Home Information';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/home', $data);
        $this->load->view('templates/footer');
    }

    public function panduanKTP()
    {
        $data['title'] = 'Panduan Membuat KTP (Kartu Tanda Penduduk)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-ktp', $data);
        $this->load->view('templates/footer');
    }

    public function panduanSIM()
    {
        $data['title'] = 'Panduan Membuat SIM (Surat Izin Mengemudi)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-sim', $data);
        $this->load->view('templates/footer');
    }

    public function panduanSKCK()
    {
        $data['title'] = 'Panduan Membuat SKCK (Surat Keterangan Catatan Kepolisian)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-skck', $data);
        $this->load->view('templates/footer');
    }

    public function panduanPaspor()
    {
        $data['title'] = 'Panduan Membuat Paspor';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-paspor', $data);
        $this->load->view('templates/footer');
    }

    public function panduanKK()
    {
        $data['title'] = 'Panduan Membuat Kartu Keluarga (KK)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-kk', $data);
        $this->load->view('templates/footer');
    }

    public function panduanKartuKuning()
    {
        $data['title'] = 'Panduan Membuat Kartu Kuning';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-kartukuning', $data);
        $this->load->view('templates/footer');
    }

    public function panduanAktaKelahiran()
    {
        $data['title'] = 'Panduan Membuat Akta Kelahiran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-aktakelahiran', $data);
        $this->load->view('templates/footer');
    }

    public function panduanAktaKematian()
    {
        $data['title'] = 'Panduan Membuat Akta Kematian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-aktakematian', $data);
        $this->load->view('templates/footer');
    }

    public function panduanAktaPernikahan()
    {
        $data['title'] = 'Panduan Membuat Akta Pernikahan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-aktapernikahan', $data);
        $this->load->view('templates/footer');
    }

    public function panduanBPJSKesehatan()
    {
        $data['title'] = 'Panduan Membuat BPJS Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-bpjskesehatan', $data);
        $this->load->view('templates/footer');
    }

    public function panduanKIPKuliah()
    {
        $data['title'] = 'Panduan Membuat KIP Kuliah Merdeka';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-kipkuliah', $data);
        $this->load->view('templates/footer');
    }

    public function panduanPindahDomisili()
    {
        $data['title'] = 'Panduan Membuat Surat Pindah Domisili';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-pindahdomisili', $data);
        $this->load->view('templates/footer');
    }

    public function panduanNPWP()
    {
        $data['title'] = 'Panduan Membuat Nomor Pokok Wajib Pajak (NPWP)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-npwp', $data);
        $this->load->view('templates/footer');
    }

    public function panduanTidakMampu()
    {
        $data['title'] = 'Panduan Membuat Surat Keterangan Tidak Mampu (SKTM)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-tidakmampu', $data);
        $this->load->view('templates/footer');
    }

    public function panduanSKU()
    {
        $data['title'] = 'Panduan Membuat Surat Keterangan Usaha (SKU)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/panduan-sku', $data);
        $this->load->view('templates/footer');
    }
}
