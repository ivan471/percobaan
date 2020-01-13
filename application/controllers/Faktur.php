<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faktur extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('pdf');
		$this->load->model('model_data');
		$this->load->model('model_barang');
	}
	public function index($id){
		$pdf = new FPDF('p','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
		$data = $this->db->query("SELECT * FROM pesanan inner join customer using(id_cust) inner join user on pesanan.sales = user.username where id_pesanan='".$id."'");
		$ssd = $data->row();
		$nama_cust = $ssd->nama_cust;
		$alamat = $ssd->alamat;
		$status_pesanan = $ssd->status_pesanan;
		if ($status_pesanan == "0") {
			$this->model_barang->pengantaran($id);
		}
		$data = $this->db->query("SELECT * FROM tb_data_pesanan inner join stok_barang using(id_barang) where id_pesanan='".$id."'");
		$query = $data->result_array();
		// mencetak string
		$pdf->Cell(190,7,'PT.ADINATA',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'JL.Dato Gappa No.16 Gowa',0,1,'C');
		$pdf->Line(28,28,183,28);
		$pdf->Ln(4);
		$pdf->SetLeftMargin(28);
		$pdf->SetRightMargin(28);
		$pdf->cell(40,8,'Nama Customer',0,0);
		$pdf->cell(40,8,':'.$nama_cust,0,1);
		$pdf->cell(40,8,'Alamat',0,0);
		$pdf->cell(40,8,':'.$alamat,0,1);
		$pdf->Ln(4);
		$pdf->cell(10,8,'No',1,0);
		$pdf->cell(60,8,'Nama Barang',1,0);
		$pdf->cell(25,8,'Jumlah',1,0);
		$pdf->cell(25,8,'Harga',1,0);
		$pdf->cell(30,8,'TotalHarga',1,1);
		$i='1';
		$total='0';
		$total1='0';
		$ttl='0	';
		foreach ($query as $data) {
			$ttl =$total1;
			$pdf->cell(10,8,$i,1,0);
			$pdf->cell(60,8,$data['nama_barang'],1,0);
			$pdf->cell(25,8,$data['jumlah'],1,0);
			$pdf->cell(25,8,'Rp.'.number_format($data['harga'], 0, ".", "."),1,0);
			$total=$data['jumlah']*$data['harga'];
			$pdf->cell(30,8,'Rp.'.number_format($total, 0, ".", "."),1,1,'R');
			$total1=($ttl + $total);
			$i++;
		}
		$pdf->cell(120,8,'Sub total',1,0,'R');
		$pdf->cell(30,8,'Rp.'.number_format($total1, 0, ".", "."),1,1,'R');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Output('Faktur.pdf','D');
		// redirect('/');
	}
}
