<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operation extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function  __construct()
	{
		parent::__construct();
		// Load session library
		$this->load->library('session');

		// Load file model
		$this->load->model('Mfile');
	}

	public function index()
	{
		$this->load->view('index');
	}
	public function pengaduan()
	{

		// Get files data from the database
		// $data['files'] = $this->Mfile->getRows();
		// Pass the files data to view
		// $this->load->view('form-lapor', $data);
		$this->load->view('form-lapor');
	}
	public function addPengaduan()
	{
		$this->db->trans_begin();
		//1. input data
		$data["tanggal"] = date('Y-m-d H:i:s');
		$data["nama"] = $_POST["nama"];
		$data["ttl"] = $_POST["ttl"];
		$data["alamat"] = $_POST["alamat"];
		$data["pekerjaan"] = $_POST["pekerjaan"];
		$data["agama"] = $_POST["agama"];
		$data["nohp"] = $_POST["nohp"];
		$data["email"] = $_POST["email"];
		$data["laporan"] = addslashes($_POST["laporan"]);
		$this->db->insert('pengaduan', $data);

		//2. select new entryest to get id foreignkey in files purpose
		$id = $this->Mfile->getDataById($_POST["nama"], $_POST["ttl"]);

		//3. input the uploaded files
		$data = array();
		// If file upload form submitted
		$filesCount = count($_FILES['files']['name']);
		for ($i = 0; $i < $filesCount; $i++) {
			$_FILES['file']['name']     = $_FILES['files']['name'][$i];
			$_FILES['file']['type']     = $_FILES['files']['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
			$_FILES['file']['error']     = $_FILES['files']['error'][$i];
			$_FILES['file']['size']     = $_FILES['files']['size'][$i];

			// File upload configuration
			$uploadPath = 'uploads/files/';
			$config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['file_name'] = $id->id . "_" . date('dmY');
			// Load and initialize upload library
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to server
			if ($this->upload->do_upload('file')) {
				// Uploaded file data
				$fileData = $this->upload->data();
				$uploadData[$i]['file_name'] = $fileData['file_name'];
				$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
				$uploadData[$i]['idPengaduan'] = $id->id;
			}
		}

		if (!empty($uploadData)) {
			// Insert files data into the database
			$insert = $this->Mfile->insert($uploadData);
			// Upload status message
			$statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
			$this->session->set_flashdata('flash_message', $statusMsg);
		}



		// SEND EMAIL
		// Konfigurasi email
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://mail.sibnnkgorut.com',
			'smtp_user' => 'pengaduanmasyarakat@sibnnkgorut.com',    // Ganti dengan email gmail kamu
			'smtp_pass' => 'sibnnkgorontaloutara',      // Password gmail kamu
			'smtp_port' => 465,
			'crlf'      => "\r\n",
			'newline'   => "\r\n"
		];

		// Load library email dan konfigurasinya
		$this->load->library('email', $config);

		

		//looping penerima email
		$queryGetEmail = $this->db->get("email_notification");
		foreach($queryGetEmail->result_array() as $row){
			// Email dan nama pengirim
			$this->email->from('no-reply@bnngorontaloutara.com', 'BNN Kabupaten Gorontalo Utara');
			// Email penerima
			$this->email->to($row['email']); // Ganti dengan email tujuan kamu

			// Lampiran email, isi dengan url/path file
			// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

			// Subject email
			$this->email->subject('Pengaduan Baru | BNN Kabupaten Gorontalo Utara');
			$mailbody = "Pengaduan baru telah diterima, berikut detail informasinya:";
			$mailbody .= "<table >
							<thead>
								<tr style='text-align:left'>
									<th style='width: 180px'>NAMA PELAPOR</th>
									<th>:</th>
									<td>" .$_POST["nama"]. "</td>
								</tr>
								<tr style='text-align:left'>
									<th>TTL</th>
									<th>:</th>
									<td>".$_POST["ttl"]."</td>
								</tr >
								<tr style='text-align:left'>
									<th>ALAMAT</th>
									<th>:</th>
									<td>".$_POST["alamat"]."</td>
								</tr>
								<tr style='text-align:left'>
									<th>PEKERJAAN</th>
									<th>:</th>
									<td>".$_POST["pekerjaan"]."</td>
								</tr>
								<tr style='text-align:left'>
									<th>AGAMA</th>
									<th>:</th>
									<td>".$_POST["agama"]."</td>
								</tr>
								<tr style='text-align:left'>
									<th>NO. HP</th>
									<th>:</th>
									<td>".$_POST["nohp"]."</td>
								</tr>
								<tr style='text-align:left'>
									<th>EMAIL</th>
									<th>:</th>
									<td>".$_POST["email"]."</td>
								</tr>
								<tr style='text-align:left'>
									<th>URAIAN LAPORAN</th>
									<th>:</th>
									<td>".$_POST["laporan"]."</td>
								</tr>
							</thead>
						</table>
						<br>
						klik <a href=".base_url("admin")."> disini </a> untuk buka Sistem Informasi BNN Kabupaten Gorontalo Utara.<br><br><br>
						<i>Dont Reply This Message</i>";
			// Isi email
			$this->email->message($mailbody);
			// Tampilkan pesan sukses atau error
			if ($this->email->send()) {
				echo 'Sukses! email berhasil dikirim.';
			} else {
				echo 'Error! email tidak dapat dikirim.';
				show_error($this->email->print_debugger());
			}
		}
		// END OF SEND EMAIL



		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			echo "Something went wrong, please close the browser, and try again";
		} else {
			$this->db->trans_commit();
			redirect("operation/success");
		}
	}

	public function success()
	{
		$this->load->view('success');
	}

	public function tentang(){
		$data['page_title'] = "Tentang Page | BNN Kab. Gorontalo Utara";
		$this->load->view('template/header_polos', $data);
		$this->load->view('tentang');
		$this->load->view('template/footer_polos');
	}
	public function visimisi(){
		$data['page_title'] = "Visi & Misi Page | BNN Kab. Gorontalo Utara";
		$this->load->view('template/header_polos', $data);
		$this->load->view('visi&misi');
		$this->load->view('template/footer_polos');
	}
	public function hubungikami(){
		$data['page_title'] = "Hubungi Kami Page | BNN Kab. Gorontalo Utara";
		$this->load->view('template/header_polos', $data);
		$this->load->view('hubungikami');
		$this->load->view('template/footer_polos');
	}
	
}
