<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends MY_Controller {
	function __construct(){
		parent::__construct();		

		// Cek apakah user sudah login
		$this->cekLogin();
		// Cek Hak Akses apakah user sebagai admin
		$this->isAdmin();

		$this->load->model('data_pengajar');
		$this->load->helper('url');
 
	}

	public function index()
	{
		$data['title'] = 'Data Pengajar | SmartSMK';
		$data['data_pengajar'] = $this->data_pengajar->tampil_data();
		$this->render_page('pengajar/listPengajar', $data);
	}

	public function dataDetail($id) 
	{
		$data['title'] = 'Data Detail Pengajar | SmartSMK';
		$data['info'] = 'Data Detail Pengajar';

		$data['detail'] = $this->data_pengajar->data_detail($id);
		$this->render_page('pengajar/detailPengajar', $data);
	}

	public function deletePengajar($id='') 
	{
		$data = array(			
			'status_pengajar'	=> '0'
		);

		$data2 = array(
			'status'	=> '0'
		);

		$this->data_pengajar->delete_data($id, $data);
		$this->data_pengajar->take_down($id, $data2);
		$this->session->set_flashdata('sukses',"Data berhasil dihapus");

		redirect('pengajar/index');
	}

	public function tambahPengajar()
	{
		$data['title'] = 'Tambah Pengajar | SmartSMK';

		$this->render_page('pengajar/tambahPengajar', $data);
	}

	public function tambah_aksi() {
		$nip_pengajar		= $this->input->post('nip_pengajar');
		$nama_depan			= $this->input->post('nama_depan');
		$nama_belakang		= $this->input->post('nama_belakang');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$newDate 			= date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
		$alamat				= $this->input->post('alamat');
		$agama				= $this->input->post('agama');
		$email				= $this->input->post('email');
		$gelar				= $this->input->post('gelar');
		$password 			= md5($this->input->post('password'));
		$foto_pengajar		= $this->input->post('foto_pengajar');

		if (!empty($_FILES['foto_pengajar']['name'])) {
			$config['upload_path'] = './assets/images/pengajar/';
			/*add 777 permission to directory*/  
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 1024;

			$new_name = time().$_FILES['foto_pengajar']['name'];
			$config['file_name'] = $new_name;

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto_pengajar')) {
				$uploadData = $this->upload->data();
				$foto_pengajar = $uploadData['file_name'];
			} else {
				$foto_pengajar = 'avatar.png';
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('JPG, JPEG, PNG and GIF type of file only is allowed and atleast 10MB of size');</script>";
			}
		} else {
			$foto_pengajar = 'avatar.png';
		}
		
		$data = array(
			'nip_pengajar'		=> $nip_pengajar,
			'nama_depan' 		=> $nama_depan,
			'nama_belakang' 	=> $nama_belakang,
			'tempat_lahir'  	=> $tempat_lahir,
			'tanggal_lahir'		=> $newDate,
			'alamat'			=> $alamat,
			'agama'				=> $agama,
			'email'				=> $email,
			'gelar'				=> $gelar,
			'foto_pengajar'		=> $foto_pengajar,
			'status_pengajar'	=> '1'
		);		
		$data2 = array(
			'username'		=> $nip_pengajar,
			'password' 		=> $password,
			'kategori_user' => '3',
			'status'  		=> '1'
			);
		
		$query = $this->data_pengajar->input_data($data, 'data_pengajar');
		$query = $this->data_pengajar->input_data($data2, 'user');
		
		$this->session->set_flashdata('sukses',"Data berhasil ditambahkan");

		redirect('pengajar/index');
	}

	public function updatePengajar($id)
	{
		$data['title'] = 'Update Data Pengajar | SmartSMK';
		$data['detail'] = $this->data_pengajar->data_detail($id);

		$this->render_page('pengajar/editPengajar', $data);
	}

	public function update_aksi($id='') {
		// $nip_pengajar		= $this->input->post('nip_pengajar');
		$nama_depan			= $this->input->post('nama_depan');
		$nama_belakang		= $this->input->post('nama_belakang');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$newDate 			= date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
		$alamat				= $this->input->post('alamat');
		$agama				= $this->input->post('agama');
		$email				= $this->input->post('email');
		$gelar				= $this->input->post('gelar');
		$foto_pengajar		= $this->input->post('foto_pengajar');

		if (!empty($_FILES['foto_pengajar']['name'])) {
			$config['upload_path'] = './assets/images/pengajar/';
			/*add 777 permission to directory*/  
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 1024;

			$new_name = time().$_FILES['foto_pengajar']['name'];
			$config['file_name'] = $new_name;

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto_pengajar')) {
				$uploadData = $this->upload->data();
				$foto_pengajar = $uploadData['file_name'];
			} else {
				$foto_pengajar = 'avatar.png';
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('JPG, JPEG, PNG and GIF type of file only is allowed and atleast 10MB of size');</script>";
			}
		} else {
			$foto_pengajar=$this->input->post('old_image');
		}
		
		$data = array(
			// 'nip_pengajar'		=> $nip_pengajar,
			'nama_depan' 		=> $nama_depan,
			'nama_belakang' 	=> $nama_belakang,
			'tempat_lahir'  	=> $tempat_lahir,
			'tanggal_lahir'		=> $newDate,
			'alamat'			=> $alamat,
			'agama'				=> $agama,
			'email'				=> $email,
			'gelar'				=> $gelar,
			'foto_pengajar'		=> $foto_pengajar,
			'status_pengajar'	=> '1'
		);
		
		$this->data_pengajar->update_data($id, $data);
		$this->session->set_flashdata('sukses',"Data berhasil dibah");
		redirect('pengajar/index');
	}

	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('SmartSMK')
			->setLastModifiedBy('SmartSMK')
			->setTitle("Data Pengajar")
			->setSubject("Pengajar")
			->setDescription("Laporan Semua Data Pengajar")
			->setKeywords("Data Pengajar");
		
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENGAJAR"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:H1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIP"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "TEMPAT LAHIR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TANGGAL LAHIR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "AGAMA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "EMAIL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "ALAMAT"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$pengajar = $this->data_pengajar->tampil_data();
		
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($pengajar as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nip_pengajar);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, "$data->nama_depan $data->nama_belakang, $data->gelar");
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tempat_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tanggal_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->agama);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->email);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->alamat);
			  
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			  
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom C
			
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Pengajar");
		$excel->setActiveSheetIndex(0);
		
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Pengajar.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
		
	}

	
}
