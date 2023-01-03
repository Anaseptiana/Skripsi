<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Grafik Laba';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $datenow = date('Y-m-d');
        $start = new DateTime($datenow);
        $end = new DateTime($datenow);

        $start = $start->modify('Last Monday')->format('Y-m-d');
        $end = $end->modify('Next Monday')->format('Y-m-d');

        $data['start'] = $start;
        $data['end'] = $end;

        if($this->input->get('bulan') && $this->input->get('tahun') && $this->input->get('pekan')){
            if($this->input->get('pekan') == 1){
                $start = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."01";
                $end = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."07";
                $data['start'] = date('Y-m-d', strtotime($start));
                $data['end'] = date('Y-m-d', strtotime($end));
            }elseif($this->input->get('pekan') == 2){
                $start = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."08";
                $end = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."14";
                $data['start'] = date('Y-m-d', strtotime($start));
                $data['end'] = date('Y-m-d', strtotime($end));
            }elseif($this->input->get('pekan') == 3){
                $start = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."15";
                $end = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."21";
                $data['start'] = date('Y-m-d', strtotime($start));
                $data['end'] = date('Y-m-d', strtotime($end));
            }elseif($this->input->get('pekan') == 4){
                $start = $this->input->get('tahun')."-".$this->input->get('bulan')."-"."22";
                $end = $this->input->get('tahun')."-".$this->input->get('bulan');
                $data['start'] = date('Y-m-d', strtotime($start));
                $data['end'] = date('Y-m-t', strtotime($end));
            }
        }

        $data['pesanan'] = $this->db->select('tanggal_selesai, SUM(total_harga) as jumlah')
                                    ->where('status', 5)
                                    ->where('tanggal_selesai >=', $start)
                                    ->where('tanggal_selesai <=', $end)
                                    ->group_by('tanggal_selesai')
                                    ->get('pesanan')
                                    ->result_array();

        $grafik_tanggal = [];
        foreach(array_column($data['pesanan'], 'tanggal_selesai') as $item)
        {
            array_push($grafik_tanggal, '"'.convertDay(date('D', strtotime($item))).'"');
        }   

        $data['grafik_tanggal'] = implode(", ", $grafik_tanggal);                            
        $data['grafik_jumlah'] = implode(", ", array_column($data['pesanan'], 'jumlah'));                            

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('grafik/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('grafik/js', $data);
    }
}
