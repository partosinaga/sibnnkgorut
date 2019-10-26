<?php
defined('BASEPATH') or exit('No direct script access allowed');
// use DomPdf\DomPdf;

class Admin extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        $this->load->view("admin-login");
    }

    // BEGIN OF LOGIN/OUT
    public function valid_login()
    {
        if (isset($_POST)) {
            $where['username'] = trim($_POST['username']);
            // $where['status'] = "active";
            $pass = trim($_POST['password']);

            $query = $this->db->get_where('useraccount', $where);
            // echo $this->db->last_query();
            // exit;
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if ($pass == $row->password) {

                    if ($row->status == 'new') {
                        $this->session->set_flashdata('flash_message_class', 'danger');
                        $this->session->set_flashdata('flash_message', 'Akun anda belum disetujui oleh Admin, silahkan menghubungi Admin segera.');
                        redirect('admin');
                    } else if ($row->status == 'rejected') {
                        $this->session->set_flashdata('flash_message_class', 'danger');
                        $this->session->set_flashdata('flash_message', 'Pendaftaran akun anda tidak disetujui oleh Admin.');
                        redirect('admin');
                    } else if ($row->status == 'inactive') {
                        $this->session->set_flashdata('flash_message_class', 'danger');
                        $this->session->set_flashdata('flash_message', 'Akun anda telah di non-aktifkan, silahkan menghubungi Admin untuk mengaktifkan kembali.');
                        redirect('admin');
                    } else {
                        $newdata = array(
                            'id'                  => $row->id,
                            'fullname'             => $row->fullname,
                            'email'            => $row->email,
                            'phoneNo'            => $row->phoneNo,
                            'address'            => $row->address,
                            'username'            => $row->username,
                            'password'            => $row->password,
                            'role'            => $row->role,
                            'status'            => $row->status,
                            'logged_in'             => TRUE
                        );
                        $this->session->set_userdata($newdata);

                        //Insert to user log
                        $data['user_id'] = $newdata['id'];
                        $data['log_subject'] = 'LOGIN';
                        $data['log_date'] = date('Y-m-d H:i:s');
                        $data['remark'] = '';
                        $this->db->insert('app_log', $data);
                        redirect('admin/home');
                    }
                } else {
                    $this->session->set_flashdata('flash_message_class', 'danger');
                    $this->session->set_flashdata('flash_message', 'Wrong password for user "' . $row->fullname . '".');
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('flash_message_class', 'danger');
                $this->session->set_flashdata('flash_message', 'Wrong Username or Password!');

                redirect('admin');
            }
        }
    }

    public function home()
    {
        $data['page'] = 'template/home';
        $data['page_title'] = "Home Page | BNN Kab. Gorontalo Utara";
        $this->load->view('template/merge_template', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin');
    }
    // END OF LOG IN/OUT

    // BEGIN OF SETUP
    public function setup()
    {
        if ($_GET['id'] == 0) {
            $data['id'] = 0;
            $data['page'] = 'main/setup';
            $data['page_title'] = "Setup Page | BNN Kab. Gorontalo Utara";
            $data['emailList'] = $this->db->get('email_notification');
            $this->load->view('template/merge_template', $data);
        } else {
            $where['id'] = $_GET['id'];
            $getId = $this->db->get_where('email_notification', $where);
            $data['rowEdit'] = $getId->row();
            $data['id'] = $_GET['id'];
            $data['page'] = 'main/setup';
            $data['page_title'] = "Setup Page | BNN Kab. Gorontalo Utara";
            $data['emailList'] = $this->db->get('email_notification');
            $this->load->view('template/merge_template', $data);
        }
    }

    public function addEmail()
    {
        if (isset($_POST)) {
            if ($_POST['id'] > 0) { //update

                $data['email'] = $_POST['email'];
                $result = $this->Madmin->update('email_notification', array('id' => $_POST['id']), $data);

                $this->session->set_flashdata('flash_message_class', 'alert alert-success');
                $this->session->set_flashdata('flash_message', 'Berhasil mengubah email');
            } else { //new entry
                $data["email"] = $_POST['email'];
                $data["created_by"] = $this->session->userdata('id');
                $data["date_created"] = date('Y-m-d H:i:s');

                $result = $this->db->insert("email_notification", $data);

                if ($result) {
                    $this->session->set_flashdata('flash_message_class', 'alert alert-success');
                    $this->session->set_flashdata('flash_message', 'Berhasil menambah email baru');
                } else {
                    $this->session->set_flashdata('flash_message_class', 'alert alert-error');
                    $this->session->set_flashdata('flash_message', 'Gagal, silahkan coba lagi');
                }
            }
            redirect('admin/setup?id=0');
        }
    }
    public function deleteEmail()
    {
        $this->db->delete('email_notification', array('id' => $_POST['id']));
        $this->session->set_flashdata('flash_message_class', 'alert alert-success');
        $this->session->set_flashdata('flash_message', 'Berhasil menghapus email');
    }
    // END OF SETUP

    // BEGIN OF PENGADUAN
    public function pengaduan()
    {
        $dataHeader['page_title'] = "Pengaduan Page | BNN Kab. Gorontalo Utara";
        $data['pengaduan'] = $this->db->get('pengaduan');
        $this->load->view('template/header', $dataHeader);
        $this->load->view('main/pengaduanBackup');
        $this->load->view('template/footer');
    }

    public function ajax_pengaduan()
    {

        $where['id >'] = 0;
        $like = array();

        if (isset($_REQUEST['filter_tgl_awal'])) {
            $rawTawal = $_REQUEST['filter_tgl_awal'];
            $dateTawal = str_replace('/', '-', $rawTawal);
            $tgl_awal = date("Y-m-d H:i:s", strtotime($dateTawal));

            if ($_REQUEST['filter_tgl_awal'] != '') {
                $where['tanggal >='] = $tgl_awal;
            }
        }
        if (isset($_REQUEST['filter_tgl_akhir'])) {
            $rawTakhir = $_REQUEST['filter_tgl_akhir'];
            $dateTakhir = str_replace('/', '-', $rawTakhir);
            $tgl_ahir = date("Y-m-d", strtotime($dateTakhir));

            if ($_REQUEST['filter_tgl_akhir'] != '') {
                $where['tanggal <='] = $tgl_ahir . " 23:59:59";
            }
        }
        if (isset($_REQUEST['filter_nama'])) {
            if ($_REQUEST['filter_nama'] != '') {
                $like['nama'] = $_REQUEST['filter_nama'];
            }
        }
        if (isset($_REQUEST['filter_ttl'])) {
            if ($_REQUEST['filter_ttl'] != '') {
                $like['ttl'] = $_REQUEST['filter_ttl'];
            }
        }
        if (isset($_REQUEST['filter_alamat'])) {
            if ($_REQUEST['filter_alamat'] != '') {
                $like['alamat'] = $_REQUEST['filter_alamat'];
            }
        }
        if (isset($_REQUEST['filter_pekerjaan'])) {
            if ($_REQUEST['filter_pekerjaan'] != '') {
                $like['pekerjaan'] = $_REQUEST['filter_pekerjaan'];
            }
        }
        if (isset($_REQUEST['filter_agama'])) {
            if ($_REQUEST['filter_agama'] != '') {
                $like['agama'] = $_REQUEST['filter_agama'];
            }
        }
        if (isset($_REQUEST['filer_nohp'])) {
            if ($_REQUEST['filer_nohp'] != '') {
                $like['nohp'] = $_REQUEST['filer_nohp'];
            }
        }
        if (isset($_REQUEST['filer_email'])) {
            if ($_REQUEST['filer_email'] != '') {
                $like['email'] = $_REQUEST['filer_email'];
            }
        }


        $iTotalRecords = $this->Madmin->getPengaduanList(true, $where, $like);

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $records = array();
        $records["data"] = array();
        $order = 'id desc ';
        $qry = $this->Madmin->getPengaduanList(false, $where, $like, $order, $iDisplayLength, $iDisplayStart);
        // echo $this->db->last_query();
        // exit;
        $i = $iDisplayStart + 1;
        foreach ($qry->result() as $row) {
            $records["data"][] = array(
                $i . '.',
                date("d/m/Y | H:i", strtotime($row->tanggal)),
                $row->nama,
                $row->ttl,
                $row->alamat,
                $row->pekerjaan,
                $row->agama,
                $row->nohp,
                $row->email,
                // $row->laporan,
                '<div class="btn-group">
                    <a href="' . base_url("admin/detail.bnn?id=$row->id") . '" target="_blank" class="btn green-meadow btn-xs detail">
                        Detail <i class="fa fa-search"></i></a>
                </div>'
            );
            $i++;
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }

    public function detail()
    {
        $where['id'] = $_GET['id'];
        $whereDetail['idPengaduan'] = $_GET['id'];
        $dataHead['page_title'] = "Detail Page | BNN Kab. Gorontalo Utara";
        $data['aduHead'] = $this->db->get_where('pengaduan', $where);
        // echo $this->db->last_query();
        // exit;
        $data['aduDet'] = $this->db->get_where('files', $whereDetail);


        $this->load->view("template/header_no_menu", $dataHead);
        $this->load->view("main/detail_pengaduan", $data);
        $this->load->view("template/footer");
    }

    public function export()
    {

        $dFrom = $_GET['date_from'];
        $dTo = $_GET['date_to'];
        $data["df"] = $dFrom;
        $data["dt"] = $dTo;
        $rawTawal = $dFrom;
        $dateTawal = str_replace('/', '-', $rawTawal);
        $tgl_awal = date("Y-m-d H:i:s", strtotime($dateTawal));


        $rawTakhir = $dTo;
        $dateTakhir = str_replace('/', '-', $rawTakhir);
        $tgl_ahir = date("Y-m-d", strtotime($dateTakhir)) . " 23:59:59";

        // $data["content"] = $this->Madmin->getPengaduan($tgl_awal, $tgl_ahir);
        $data["head"] = $this->Madmin->getHead($tgl_awal, $tgl_ahir);
        $data["files"] = $this->Madmin->getFiles();
        // echo $this->db->last_query();
        // exit;

        // $this->load->view('table_report', $data);

        $this->load->library('Pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar-pengaduan.pdf";
        $this->pdf->load_view('main/export', $data);
    }
    // END OF PENGADUAN

    // PETA RAWAN
    public function peta_rawan()
    {
        $dataHead['page_title'] = "Peta Rawan Page | BNN Kab. Gorontalo Utara";
        $data['summarize'] = $this->Madmin->getSummarize();
        $this->load->view('template/header', $dataHead);
        $this->load->view('main/peta_rawan', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['page'] = 'main/peta_rawan_add';
        $data['page_title'] = "Tambah Lokasi Rawan Page | BNN Kab. Gorontalo Utara";
        $this->load->view('template/merge_template', $data);
    }

    public function addPeta()
    {
        $this->db->trans_begin();
        if (isset($_POST)) {

            if ($_POST['id'] > 0) { //add new
                // upload
                $uploadPath = 'uploads/petarawan/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                // $config['max_widht']             = 1000;
                // $config['max_height']          = 1000;
                $config['file_name'] = $_POST['nama'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('flash_message_class', 'alert alert-danger');
                    $this->session->set_flashdata('flash_message', $this->upload->display_errors('', ''));
                    redirect("admin/add");
                    exit;
                } else {
                    $uploaded = $this->upload->data('file_name');
                }
                // end of upload

                $data['nama'] = $_POST['nama'];

                $dateTakhir = str_replace('/', '-', $_POST['tgl_lahir']);
                $tglLahir = date("Y-m-d", strtotime($dateTakhir));

                $data['tgl_lahir'] = $tglLahir;
                $data['keterangan'] = $_POST['keterangan'];
                $data['foto'] = $uploaded;
                $data['alamat'] = $_POST['alamat'];
                $data['nik'] = $_POST['nik'];
                $data['agama'] = $_POST['agama'];
                $data['pekerjaan'] = $_POST['pekerjaan'];
                $data['jkel'] = $_POST['jkel'];
                $data['kecamatan'] = $_POST['kecamatan'];
                $data['latitude'] = $_POST['latitude'];
                $data['longitude'] = $_POST['longitude'];

                $this->Madmin->update('peta_rawan', array('id' => $_POST['id']), $data);
            } else { //new entry
                // upload
                $uploadPath = 'uploads/petarawan/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                // $config['max_widht']             = 1000;
                // $config['max_height']          = 1000;
                $config['file_name'] = $_POST['nama'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);


                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('flash_message_class', 'alert alert-danger');
                    $this->session->set_flashdata('flash_message', $this->upload->display_errors('', ''));
                    redirect("admin/add");
                    exit;
                } else {
                    $uploaded = $this->upload->data('file_name');
                }
                // end of upload

                $data['nama'] = $_POST['nama'];

                $dateTakhir = str_replace('/', '-', $_POST['tgl_lahir']);
                $tglLahir = date("Y-m-d", strtotime($dateTakhir));

                $data['tgl_lahir'] = $tglLahir;
                $data['keterangan'] = $_POST['keterangan'];
                $data['foto'] = $uploaded;
                $data['alamat'] = $_POST['alamat'];
                $data['nik'] = $_POST['nik'];
                $data['agama'] = $_POST['agama'];
                $data['pekerjaan'] = $_POST['pekerjaan'];
                $data['jkel'] = $_POST['jkel'];
                $data['kecamatan'] = $_POST['kecamatan'];
                $data['latitude'] = $_POST['latitude'];
                $data['longitude'] = $_POST['longitude'];
                $this->db->insert('peta_rawan', $data);
            }



            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('flash_message_class', 'alert alert-danger');
                $this->session->set_flashdata('flash_message', 'Gagal menambahkan/ubah data');
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('flash_message_class', 'alert alert-success');
                $this->session->set_flashdata('flash_message', 'Berhasil menambahkan/ubah data');
                redirect("admin/petarawanlist");
            }
        }
    }
    public function getMarkers()
    {
        $data = $this->Madmin->getMarkers();
        $rawData = $data->result();

        echo json_encode($rawData);
    }

    public function getMarkersDetail()
    {
        $where['id'] = $_GET['id'];
        $data = $this->db->get_where('peta_rawan', $where);
        $rawData = $data->row();
        $dates = str_replace('/', '-',  $rawData->tgl_lahir);
        $tgl_lahir = date("d-m-Y", strtotime($dates));

        $html = '<div class="row">
                    <div  class="col-md-4">
                        <img style="width:100%; heigth:100%" src="' . base_url('uploads/petarawan/' . $rawData->foto . ' ') . '" >
                    </div>
                    <div class="col-md-8">
                        <table>
                        <tr>
                            <th style="width:100px">Nama </th>
                            <th> : </th>
                            <td>' . $rawData->nama . '</td>
                        </tr>
                        <tr>
                            <th style="width:100px">NIK </th>
                            <th> : </th>
                            <td>' . $rawData->nik . '</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir </th>
                            <th> : </th>
                            <td>' . $tgl_lahir . '</td>
                        </tr>
                        <tr>
                            <th style="width:100px">Jenis Kelamin </th>
                            <th> : </th>
                            <td>' . $rawData->jkel . '</td>
                        </tr>
                        <tr>
                            <th style="width:100px">Agama </th>
                            <th> : </th>
                            <td>' . $rawData->agama . '</td>
                        </tr>
                        <tr>
                            <th style="width:100px">Pekerjaan </th>
                            <th> : </th>
                            <td>' . $rawData->pekerjaan . '</td>
                        </tr>
                        <tr>
                            <th style="width:100px">Kecamatan </th>
                            <th> : </th>
                            <td>' . $rawData->kecamatan . '</td>
                        </tr>
                        <tr>
                            <th>Alamat </th>
                            <th> : </th>
                            <td>' . $rawData->alamat . '</td>
                        </tr>
                        <tr>
                            <th>Keterangan </th>
                            <th> : </th>
                            <td>' . $rawData->keterangan . '</td>
                        </tr>
                        </table>
                    </div>
                </div>';

        echo $html;
    }

    public function petarawanlist()
    {
        $data['page'] = 'main/list_peta_rawan';
        $data['page_title'] = "List Page | BNN Kab. Gorontalo Utara";
        $this->load->view('template/merge_template', $data);
    }
    public function ajax_list_pengaduan()
    {
        $where['id >'] = 0;
        $like = array();

        if (isset($_REQUEST['filter_tgl_awal'])) {
            $rawTawal = $_REQUEST['filter_tgl_awal'];
            $dateTawal = str_replace('/', '-', $rawTawal);
            $tgl_awal = date("Y-m-d H:i:s", strtotime($dateTawal));

            if ($_REQUEST['filter_tgl_awal'] != '') {
                $where['tgl_lahir >='] = $tgl_awal;
            }
        }
        if (isset($_REQUEST['filter_tgl_akhir'])) {
            $rawTakhir = $_REQUEST['filter_tgl_akhir'];
            $dateTakhir = str_replace('/', '-', $rawTakhir);
            $tgl_ahir = date("Y-m-d", strtotime($dateTakhir));

            if ($_REQUEST['filter_tgl_akhir'] != '') {
                $where['tgl_lahir <='] = $tgl_ahir . " 23:59:59";
            }
        }
        if (isset($_REQUEST['filter_nama'])) {
            if ($_REQUEST['filter_nama'] != '') {
                $like['nama'] = $_REQUEST['filter_nama'];
            }
        }
        if (isset($_REQUEST['filter_nik'])) {
            if ($_REQUEST['filter_nik'] != '') {
                $like['nik'] = $_REQUEST['filter_nik'];
            }
        }
        if (isset($_REQUEST['filter_alamat'])) {
            if ($_REQUEST['filter_alamat'] != '') {
                $like['alamat'] = $_REQUEST['filter_alamat'];
            }
        }

        if (isset($_REQUEST['filter_kecamatan'])) {
            if ($_REQUEST['filter_kecamatan'] != '') {
                $like['kecamatan'] = $_REQUEST['filter_kecamatan'];
            }
        }

        if (isset($_REQUEST['filter_pekerjaan'])) {
            if ($_REQUEST['filter_pekerjaan'] != '') {
                $like['pekerjaan'] = $_REQUEST['filter_pekerjaan'];
            }
        }
        if (isset($_REQUEST['filter_jenis_kelamin'])) {
            if ($_REQUEST['filter_jenis_kelamin'] != '') {
                $like['jkel'] = $_REQUEST['filter_jenis_kelamin'];
            }
        }
        if (isset($_REQUEST['filter_agama'])) {
            if ($_REQUEST['filter_agama'] != '') {
                $like['agama'] = $_REQUEST['filter_agama'];
            }
        }


        $iTotalRecords = $this->Madmin->getPetaRawanList(true, $where, $like);

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $records = array();
        $records["data"] = array();
        $order = 'id desc ';
        $qry = $this->Madmin->getPetaRawanList(false, $where, $like, $order, $iDisplayLength, $iDisplayStart);
        // echo $this->db->last_query();
        // exit;
        $i = $iDisplayStart + 1;
        foreach ($qry->result() as $row) {
            $records["data"][] = array(
                $i . '.',
                $row->nama,
                date("d/m/Y", strtotime($row->tgl_lahir)),
                $row->nik,
                $row->agama,
                $row->alamat,
                $row->kecamatan,
                $row->pekerjaan,
                $row->jkel,
                // $row->laporan,
                '<div class="btn-group">
                    
                    <a href=" ' . site_url('admin/edit_list?id=') . $row->id . ' "> <button class="btn btn-sm blue"><i class="fa fa-edit"></i></button></a>
                    <a> <button class="btn btn-sm red" type="button" id="' . $row->id . '" onclick="delete_list(this.id)"> <i class="fa fa-trash "></i></button></a>
                        
                </div>'
            );
            $i++;
        }
        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        echo json_encode($records);
    }

    public function deleteList()
    {
        $this->db->trans_begin();
        $where['id'] = $_POST['id'];
        $foto = $this->db->get_where('peta_rawan', $where)->row();
        unlink(FCPATH . "uploads/petarawan/" . $foto->foto);

        $this->db->delete('peta_rawan', array('id' => $_POST['id']));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('flash_message_class', 'alert alert-danger');
            $this->session->set_flashdata('flash_message', 'Gagal menghapus data');
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('flash_message_class', 'alert alert-success');
            $this->session->set_flashdata('flash_message', 'Berhasil menghapus data');
        }
    }
    public function edit_list()
    {
        $data['page'] = 'main/edit_list_peta_rawan';
        $data['page_title'] = "Edit List Page | BNN Kab. Gorontalo Utara";
        $where['id'] = $_GET['id'];
        $data['listData'] = $this->db->get_where('peta_rawan', $where)->row();
        $this->load->view('template/merge_template', $data);
    }
    // END OF PETA RAWAN

    // ADD USER
    public function addUser()
    {
        $data['fullname'] = $_POST['fullname'];
        $data['email'] = $_POST['email'];
        $data['nohp'] = $_POST['nohp'];
        $data['address'] = $_POST['address'];
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['role'] = $_POST['role'];
        $data['status'] = 'new';
        $this->db->insert('useraccount', $data);


        $this->session->set_flashdata('flash_message_class', 'alert alert-success');
        $this->session->set_flashdata('flash_message', 'Berhasil mendaftarkan akun, bisa digunakan jika Admin sudah menyetujui pendaftaran anda! ');
        redirect("admin");
    }

    public function user()
    {
        if ($this->session->userdata('role') == 'admin') {
            $data['user'] = $this->db->get('useraccount');
            $data['page_title'] = "User | BNN Kab. Gorontalo Utara";

            $data['page'] = 'main/user';
            $data['page_title'] = "User Page | BNN Kab. Gorontalo Utara";
            $this->load->view('template/merge_template', $data);
        } else {
            $data['page_title'] = "User | BNN Kab. Gorontalo Utara";
            $this->load->view('template/header', $data);
            $this->load->view('template/invalid');
            $this->load->view('template/footer');
        }
    }

    public function manage_status()
    {
        $id = $_GET['id'];
        $data['status'] = $_GET['mode'];
        $this->Madmin->update('useraccount', array('id' => $id), $data);

        $this->session->set_flashdata('flash_message_class', 'alert alert-success');
        $this->session->set_flashdata('flash_message', 'Berhasil mengubah status user');
        redirect("admin/user");
    }
    public function manage_role()
    {
        $id = $_GET['id'];
        $data['role'] = $_GET['role'];
        $this->Madmin->update('useraccount', array('id' => $id), $data);

        $this->session->set_flashdata('flash_message_class', 'alert alert-success');
        $this->session->set_flashdata('flash_message', 'Berhasil mengubah role user');
        redirect("admin/user");
    }

    public function change_password()
    {
        $id = $_POST['id'];
        $data['password'] = $_POST['newPass'];
        $this->Madmin->update('useraccount', array('id' => $_POST['id']), $data);
        $this->session->set_flashdata('flash_message_class', 'alert alert-success');
        $this->session->set_flashdata('flash_message', 'Berhasil mengubah password, akan berlaku setelah anda login kembali');
    }
    public function deleteUser()
    {
        $this->db->delete('useraccount', array('id' => $_GET['id']));
        $this->db->trans_commit();
        $this->session->set_flashdata('flash_message_class', 'alert alert-success');
        $this->session->set_flashdata('flash_message', 'Berhasil menghapus data');
    }
    // END OF USER ACCOUNT


}
