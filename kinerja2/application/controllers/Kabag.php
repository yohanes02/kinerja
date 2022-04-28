<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kabag extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('utype') != 2) {
			redirect('auth');
		}
		$this->load->model(['Core_m', 'Kabag_m']);
	}
	
	public function index()
	{
		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('v_dashboard');
		$this->load->view('components/v_close');
	}

	public function rating()
	{
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('dept_id'))->result_array();
		$criterias_id = array();
		$idx = 0;
		foreach ($criterias as $criteria) {
			array_push($criterias_id, $criteria['id']);
			$idx++;
		}
		$month = date('m') - 1;
		$year = date('Y');

		if($month == 0) {
			$month = 12;
			$year = date('Y') - 1;
		}

		$employees = $this->Kabag_m->getEmployee($this->session->userdata('dept_id'))->result_array();

		for ($i=0; $i < count($employees); $i++) { 
			$rating = $this->Kabag_m->getPenilaian($employees[$i]['id'], $criterias_id, $month, $year)->result_array();
			if(count($rating) == count($criterias_id)) {
				$employees[$i]['haveRating'] = 1;
			} else {
				$employees[$i]['haveRating'] = 0;
			}
		}

		$data['employees'] = $employees;
		$jsData['page'] = 'kabag';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('kabag/v_rating', $data);
		$this->load->view('components/v_close', $jsData);
	}

	public function addRating($employee_id) {
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('dept_id'))->result_array();
		$criterias_id = array();

		$idx = 0;
		foreach ($criterias as $criteria) {
			$targetName = $this->targetValue($criterias[$idx]['target']);
			$criterias[$idx]['target_name'] = $targetName;
			array_push($criterias_id, $criteria['id']);
			$idx++;
		}
		$month = date('m') - 1;
		$year = date('Y');

		if($month == 0) {
			$month = 12;
			$year = date('Y') - 1;
		}
		if($criterias_id == []) {
			$criterias_id = [-1];
		}
		// $rating = $this->Kabag_m->getPenilaian($employee_id, $criterias_id, $month, $year)->result_array();

		$data['criteria_data'] = $criterias;
		// $data['rating_data'] = $rating;
		$data['employee_id'] = $employee_id;
		$jsData['page'] = 'kabag';

		$this->load->view('components/v_open');
		$this->load->view('components/v_sidebar');
		$this->load->view('components/v_topbar');
		$this->load->view('kabag/v_add_rating', $data);
		$this->load->view('components/v_close', $jsData);
		// print_r($data);die;
	}

	public function submitValuation($employee_id) {
		$post = $this->input->post();
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('dept_id'))->result_array();

		$criterias_id = array();
		foreach ($criterias as $criteria) {
			array_push($criterias_id, $criteria['id']);
		}

		$year = date('Y');
		$month = date('m') - 1;
		if($month == 0) {
			$month = 12;
			$year = date('Y') - 1;
		}

		for ($i=0; $i < count($criterias); $i++) { 
			$criteriaValue = $post['criteria'.$i];
			$gradeValue = $post['grade'.$i];
			$data = [
				"employee_id" => $employee_id,
				"criteria_id" => $criteriaValue,
				"grade" => $gradeValue,
				"month" => $month,
				"year" => $year,
			];
			$this->Core_m->insertData($data, 'rating');
		}

		$rating = $this->Kabag_m->getPenilaian($employee_id, $criterias_id, $month, $year)->result_array();

		$finalValue = $this->profileMatchingCalculation($rating, $employee_id);
		$ins = [
			"employee_id" => $employee_id,
			"month" => $month,
			"year" => $year,
			"result" => $finalValue
		];
		$this->Core_m->insertData($ins, 'result_rating');

		redirect('kabag/rating');
	}

	private function profileMatchingCalculation($rating, $employee_id) {
		$aspects = $this->Core_m->getAll('aspect')->result_array();
		$criterias = $this->Kabag_m->getCriteriaData($this->session->userdata('dept_id'))->result_array();

		$data = array();

		for ($i=0; $i < count($aspects); $i++) { 
			// $data['aspect'.$aspects[$i]['id']]['coreWeight'] = $aspects[$i]['core_weight'];
			// $data['aspect'.$aspects[$i]['id']]['secondWeight'] = $aspects[$i]['secondary_weight'];
			// $data['aspect'.$aspects[$i]['id']]['weight'] = $aspects[$i]['weight'];
			$coreWeight = $aspects[$i]['core_weight'];
			$secondWeight = $aspects[$i]['secondary_weight'];
			$weightAspect = $aspects[$i]['weight'];
			$data['aspect'.$aspects[$i]['id']]['coreValue'] = array();
			$data['aspect'.$aspects[$i]['id']]['secondaryValue'] = array();
			$aspectId = 0;
			for ($j=0; $j < count($rating); $j++) { 
				for ($k=0; $k < count($criterias); $k++) {
					$aspectId = $criterias[$k];
					if($rating[$j]['criteria_id'] == $criterias[$k]['id'] && $criterias[$k]['aspect_id'] == $aspects[$i]['id']) {
						if($criterias[$k]['type'] == 1) {
							$weight = $this->getWeight($rating[$j]['grade']-$criterias[$k]['target']);
							array_push($data['aspect'.$aspects[$i]['id']]['coreValue'], $weight);
						} else {
							$weight = $this->getWeight($rating[$j]['grade']-$criterias[$k]['target']);
							array_push($data['aspect'.$aspects[$i]['id']]['secondaryValue'], $weight);
						}
					}
				}
			}
			$CFArrVal = $data['aspect'.$aspects[$i]['id']]['coreValue'];
			$SFArrVal = $data['aspect'.$aspects[$i]['id']]['secondaryValue'];
			$CF = (array_sum($CFArrVal)/count($CFArrVal))*($coreWeight/100);
			$SF = (array_sum($SFArrVal)/count($SFArrVal))*($secondWeight/100);
			$data['aspect'.$aspects[$i]['id']]['resultRawAspect'] = $CF + $SF;
			$data['aspect'.$aspects[$i]['id']]['resultPercentageAspect'] = ($CF + $SF) * ($weightAspect/100);
		}
		// print_r($data);die;
		$finalValue = 0;
		for ($i=0; $i < count($aspects); $i++) {
			$finalValue +=  $data['aspect'.$aspects[$i]['id']]['resultPercentageAspect'];
		}

		return $finalValue;
	}

	private function targetValue($target) {
		if ($target == 1) :
			return 'Sangat Kurang';
		elseif ($target == 2) :
			return 'Kurang';
		elseif ($target == 3) :
			return 'Cukup';
		elseif ($target == 4) :
			return 'Baik';
		elseif ($target == 5) :
			return 'Sangat Baik';
		else :
			return 'Not Defined';
		endif;
	}

	private function getWeight($diffWithTarget) {
		if ($diffWithTarget == 0) {
			return 5;
		}
		if ($diffWithTarget == 1) {
			return 4.5;
		}
		if ($diffWithTarget == -1) {
			return 4;
		}
		if ($diffWithTarget == 2) {
			return 3.5;
		}
		if ($diffWithTarget == -2) {
			return 3;
		}
		if ($diffWithTarget == 3) {
			return 2.5;
		}
		if ($diffWithTarget == -3) {
			return 2;
		}
		if ($diffWithTarget == 4) {
			return 1.5;
		}
		if ($diffWithTarget == -4) {
			return 1;
		}
	}

}


?>
