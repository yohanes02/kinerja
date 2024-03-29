<?php

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_type') != 4) {
            redirect('auth');
        }
        $this->load->model(['Karyawan_m', 'Core_m']);
    }
    
    public function index()
    {
  		$departments = $this->Core_m->getAll('departemen')->result_array();
  		$data['employee'] = $this->Core_m->getById($this->session->userdata('id'), 'karyawan')->row_array();
      if($data['employee']['jk'] == 1) {
        $data['employee']['jk'] = 'Pria';
      } else {
        $data['employee']['jk'] = 'Wanita';
      }

      foreach ($departments as $department) {
        if ($department['id'] == $data['employee']['departemen_id']) {
          $data['employee']['departemen_name'] = $department['name'];
        }
      };

      // print_r($data);die;
      $jsFile['jsFile'] = 'karyawan';
      $this->load->view('components/header');
      $this->load->view('components/top_bar');
      $this->load->view('karyawan/v_index', $data);
      $this->load->view('components/footer', $jsFile);
    }

    public function pekerjaan()
    {
      $data['works'] = $this->getPekerjaan();
      
      $jsFile['jsFile'] = 'karyawan';
      $this->load->view('components/header');
      $this->load->view('components/top_bar');
      $this->load->view('karyawan/v_pekerjaan', $data);
      $this->load->view('components/footer', $jsFile);
    }

    public function getPekerjaan() {
      $post = json_decode(file_get_contents('php://input'),true);
      if($post != NULL) {
        // print_r($post);die;
        $month = $post['month'];
        $year = $post['year'];
        $karyawanId = $post['karyawan_id'];
        $result = $this->Karyawan_m->getPekerjaan($month, $year, $karyawanId)->result_array();
        echo json_encode($result);
      } else {
        $month = date('m');
        $year = date('Y');
        $karyawanId = $this->session->userdata('id');
        return $this->Karyawan_m->getPekerjaan($month, $year, $karyawanId)->result_array();
      }
      // print_r($post);die;

    }

    public function insert_pekerjaan()
    {
      $post = $this->input->post();
      $ins = [
        'karyawan_id' => $this->session->userdata('karyawan_id'),
        'description' => $post['pekerjaan'],
        'month'       => date('m'),
        'year'        => date('Y'),
        'status'      => $post['status_pekerjaan']
      ];

      $this->Core_m->insertData($ins, 'work');
      $this->session->set_flashdata('insert_pekerjaan', 'Pekerjaan behasil ditambahkan');
      redirect('karyawan/pekerjaan');
    }

    public function update_pekerjaan()
    {
  		$jsonData = json_decode(file_get_contents('php://input'),true);
      // $post = $this->input->post();
      $id = $jsonData['id_pekerjaan'];
      $data = [
        'status'      => $jsonData['status_pekerjaan']
      ];

      $this->Core_m->updateData($id, $data, 'work');
    }

    public function delete_pekerjaan() {
      $post = $this->input->post();
      $this->Core_m->deleteData($post['id_pekerjaan'], 'work');
      redirect('karyawan/pekerjaan');
    }

}

?>