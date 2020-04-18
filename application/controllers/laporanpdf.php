<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index($id = NULL){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Purchase Order',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pekerjaan = $this->db->get_where('pekerjaan',['id_pekerjaan' => $id])->row_array();
        $pdf->Cell(190,7,$pekerjaan['nama_pekerjaan'],0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,8,'Nama Pekerjaan',1,0);
        $pdf->Cell(20,8,'Total Kata',1,0);
        $pdf->Cell(27,8,'Project Manager',1,0);
        $pdf->Cell(25,8,'Freelance',1,0);
        $pdf->Cell(25,8,'Status',1,0);
        $pdf->Cell(25,8,'Total Bayar',1,0);
        $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,8,$pekerjaan['nama_pekerjaan'],1,1);
            $pdf->Cell(20,8,$pekerjaan['total_kata'],1,1);
            $pdf->Cell(27,8,$pekerjaan['id_pm'],1,1);
            $pdf->Cell(25,8,$pekerjaan['id_fl'],1,1); 
            $pdf->Cell(25,8,$pekerjaan['status'],1,1); 
            $pdf->Cell(25,8,$pekerjaan['total_kata'] * 1000,1,1); 
        $pdf->Output();
    }
}
?>