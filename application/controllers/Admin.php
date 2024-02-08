<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role'),
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Role Added!</div>');
            redirect('admin/role');
        }
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function managementAccount()
    {
        $data['title'] = 'Management Account';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admins');

        // PAGNINATION
        $this->load->library('pagination');

        // Ambil data searching
        if ($this->input->post('submitaccount')) {
            $data['keywordaccount'] = $this->input->post('keywordaccount');
            $this->session->set_userdata('keywordaccount', $data['keywordaccount']);
        } else {
            $data['keywordaccount'] = $this->session->userdata('keywordaccount');
        }

        //CONFIG
        $this->db->like('name', $data['keywordaccount']);
        $this->db->or_like('email', $data['keywordaccount']);
        $this->db->from('user');
        $config['base_url'] = 'http://localhost:8080/panel-admin/admin/managementaccount';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 2;

        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['managementAccount'] = $this->admins->getAccount($config['per_page'], $data['start'], $data['keywordaccount']);
        $data['managementAccount'] = $this->admins->getRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/managementaccount', $data);
        $this->load->view('templates/footer');
    }

    public function hapusaccount($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account Berhasil Dihapus</div>');
        redirect('admin/managementaccount');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Account';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Role_model', 'role');

        $data['detail'] = $this->role->getRole();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['detail'] = $this->db->get_where('user', ['id' => $id])->row_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function editAccount($id)
    {
        $data['title'] = 'Edit Account';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Role_model', 'role');

        $data['editAccount'] = $this->role->getRole();
        $data['role'] = $this->db->get('user_role')->result_array();

        $data['editAccount'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-account', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
            ];

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

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been updated!</div>');
            redirect('admin/managementaccount');
        }
    }

    public function editRole($id)
    {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['editRole'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        $this->form_validation->set_rules('role', 'Nama Role', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-role', $data);
            $this->load->view('templates/footer');
        } else {
            $role = $this->input->post('role');
           
            $this->db->set('role', $role);
            $this->db->where('id', $id);
            $this->db->update('user_role');
            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Berhasil Di Edit</div>');
            // redirect('admin/editrole');
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Berhasil Di Edit</div>');
                redirect('admin/editrole');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengedit role.</div>');
                redirect('admin/editrole');
            }
        }
    }

    public function hapusrole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Berhasil Dihapus</div>');
        redirect('admin/role');
    }

    public function dataWarga()
    {
        $data['title'] = 'Data Warga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admins');

        // PAGNINATION
        $this->load->library('pagination');

        // Ambil data searching
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        //CONFIG
        $this->db->like('name', $data['keyword']);
        $this->db->or_like('nik', $data['keyword']);
        $this->db->or_like('status', $data['keyword']);
        $this->db->from('data_keluarga');
        $config['base_url'] = 'http://localhost:8080/panel-admin/admin/datawarga';
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        // initialize
        $this->pagination->initialize($config);



        $data['start'] = $this->uri->segment(3);
        $data['dataWarga'] = $this->admins->getDataWarga($config['per_page'], $data['start'], $data['keyword']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datawarga', $data);
            $this->load->view('templates/footer');
        }
    }

    public function detailWarga($id)
    {
        $data['title'] = 'Details Data Warga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['detailWarga'] = $this->db->get_where('data_keluarga', ['id' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/detail-warga', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapusdatawarga($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_keluarga');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Warga Berhasil Dihapus</div>');
        redirect('admin/datawarga');
    }

    public function editDataWarga($id)
    {
        $data['title'] = 'Edit Data Warga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['editDataWarga'] = $this->db->get_where('data_keluarga', ['id' => $id])->row_array();

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
            $this->load->view('admin/edit-data-warga', $data);
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Warga Berhasil Di Updated!</div>');
            redirect('admin/datawarga');
        }
    }
}
