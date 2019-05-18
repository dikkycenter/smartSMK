<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {
	function __construct(){
		parent::__construct();	
		
		// Cek Apakah sudah Login
		$this->cekLogin();

		// Cek Apakah Sebagai Admin
		$this->isAdmin();
		
		$this->load->model('data_siswa');
		$this->load->helper('url');
 
	}

	public function index()
	{
		$data['title'] = 'Data Siswa | SmartSMK';
		$data['data_siswa'] = $this->data_siswa->tampil_data();
		$this->render_page('siswa/listSiswa', $data);
	}

	public function dataDetail($id) 
	{
		$data['title'] = 'Data Detail Siswa | SmartSMK';
		$data['info'] = 'Data Detail Siswa';

		$data['detail'] = $this->data_siswa->data_detail($id);
		$this->render_page('siswa/detailSiswa', $data);
	}

	public function deleteSiswa($id) 
	{
		$data['delete'] = $this->data_siswa->delete_data($id);
		$this->session->set_flashdata('sukses',"Data berhasil dihapus");

		redirect('pengajar/index');
	}

	public function tambahSiswa()
	{
		$data['title'] = 'Tambah Siswa | SmartSMK';
		$data['kelas'] = $this->data_siswa->tampil_kelas();
		$this->render_page('siswa/tambahSiswa', $data);
	}

	public function tambah_aksi() {
		$now = date('Y-m-d H:i:s');

		$nis				= $this->input->post('nis');
		$nama_depan			= $this->input->post('nama_depan');
		$nama_belakang		= $this->input->post('nama_belakang');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$newDate 			= date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
		$alamat				= $this->input->post('alamat');
		$agama				= $this->input->post('agama');
		$email_wali			= $this->input->post('email_wali');
		$kelas				= $this->input->post('kelas');
		$nama_wali			= $this->input->post('nama_wali');
		$password 			= md5($this->input->post('password'));
		$foto				= $this->input->post('foto');
		$input_date			= $now;
		$update_date		= $now;
		$update_by			= $this->input->post('update_by');

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/images/siswa/';
			/*add 777 permission to directory*/  
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 1024;

			$new_name = time().$_FILES['foto']['name'];
			$config['file_name'] = $new_name;

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$uploadData = $this->upload->data();
				$foto = $uploadData['file_name'];
			} else {
				$foto = 'avatar.png';
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('JPG, JPEG, PNG and GIF type of file only is allowed and atleast 10MB of size');</script>";
			}
		} else {
			$foto = 'avatar.png';
		}
		
		$data = array(
			'nis'				=> $nis,
			'nama_depan' 		=> $nama_depan,
			'nama_belakang' 	=> $nama_belakang,
			'tempat_lahir'  	=> $tempat_lahir,
			'tanggal_lahir'		=> $newDate,
			'nama_wali'			=> $nama_wali,
			'email_wali'		=> $email_wali,			
			'alamat'			=> $alamat,
			'agama'				=> $agama,
			'kelas'				=> $kelas,
			'foto'				=> $foto,
			'input_date'		=> $input_date,
			'update_date'		=> $update_date,
			'update_by'			=> 'admin',
			'status'			=> '1'
		);		
		$data2 = array(
			'username'		=> $nis,
			'password' 		=> $password,
			'kategori_user' => '4',
			'status'  		=> '1'
			);
		
		$query = $this->data_siswa->input_data($data, 'data_siswa');
		$query = $this->data_siswa->input_data($data2, 'user');
		
		$this->session->set_flashdata('sukses',"Data berhasil ditambahkan");

		redirect('siswa/index');
	}

	public function updateSiswa($id)
	{
		$data['title'] = 'Update Data Siswa | SmartSMK';
		$data['detail'] = $this->data_siswa->data_detail($id);
		$data['kelas'] = $this->data_siswa->tampil_kelas();
		$this->render_page('siswa/editSiswa', $data);
	}

	public function update_aksi($id='') {
		$now = date('Y-m-d H:i:s');

		// $nis				= $this->input->post('nis');
		$nama_depan			= $this->input->post('nama_depan');
		$nama_belakang		= $this->input->post('nama_belakang');
		$tempat_lahir		= $this->input->post('tempat_lahir');
		$newDate 			= date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
		$alamat				= $this->input->post('alamat');
		$agama				= $this->input->post('agama');
		$email_wali			= $this->input->post('email_wali');
		$kelas				= $this->input->post('kelas');
		$nama_wali			= $this->input->post('nama_wali');
		$foto				= $this->input->post('foto');
		$input_date			= $now;
		$update_date		= $now;
		$update_by			= $this->input->post('update_by');

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/images/pengajar/';
			/*add 777 permission to directory*/  
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, TRUE);
			}
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 1024;

			$new_name = time().$_FILES['foto']['name'];
			$config['file_name'] = $new_name;

			//Load upload library and initialize configuration
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$uploadData = $this->upload->data();
				$foto_pengajar = $uploadData['file_name'];
			} else {
				$foto_pengajar = 'avatar.png';
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('JPG, JPEG, PNG and GIF type of file only is allowed and atleast 10MB of size');</script>";
			}
		} else {
			$foto=$this->input->post('old_image');
		}
		
		$data = array(
			// 'nis'				=> $nis,
			'nama_depan' 		=> $nama_depan,
			'nama_belakang' 	=> $nama_belakang,
			'tempat_lahir'  	=> $tempat_lahir,
			'tanggal_lahir'		=> $newDate,
			'nama_wali'			=> $nama_wali,
			'email_wali'		=> $email_wali,			
			'alamat'			=> $alamat,
			'agama'				=> $agama,
			'kelas'				=> $kelas,
			'foto'				=> $foto,
			'input_date'		=> $input_date,
			'update_date'		=> $update_date,
			'update_by'			=> 'admin',
			'status'			=> '1'
		);
		
		$this->data_siswa->update_data($id, $data);
		$this->session->set_flashdata('sukses',"Data berhasil diubah");
		redirect('siswa/index');
	}

	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('SmartSMK')
			->setLastModifiedBy('SmartSMK')
			->setTitle("Data Siswa")
			->setSubject("Siswa")
			->setDescription("Laporan Semua Data Siswa")
			->setKeywords("Data Siswa");
		
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
		
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "KELAS"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "TEMPAT LAHIR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL LAHIR"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "AGAMA"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "NAMA WALI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "EMAIL WALI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "ALAMAT"); // Set kolom E3 dengan tulisan "ALAMAT"
		
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$siswa = $this->data_siswa->tampil_data();
		
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, "$data->nama_depan $data->nama_belakang");
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kelas);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempat_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tanggal_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->agama);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->nama_wali);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->email_wali);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->alamat);
			  
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			  
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
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
			
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Siswa.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
		
	}

	
}
