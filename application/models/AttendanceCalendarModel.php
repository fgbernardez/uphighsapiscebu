<?php
    class AttendanceCalendarModel extends CI_Model{

		public $months = array(
			'january',
			'february',
			'march',
			'april',
			'may',
			'june',
			'july',
			'august',
			'september',
			'october',
			'november',
			'december',
		);

		public function ifExist($data){
			$exist = $this->db->where( $data )->get( "attendance_calendar" );
        	return $exist;
		}
		/*
		public function firsttolast ($data) {
			$monthsFirsttoLast = array();

			foreach ($data as $key => $value) 
			{
				if ( in_array($key, $this->months) && $value == 1) 
				{
					$monthsFirsttoLast[$key] = $value;
				}
			}
			if ($monthsFirsttoLast == null) {
				$monthsFirsttoLast["sy_id"] = $data["sy_id"];
				$monthsFirsttoLast["grade_level"] = $data["grade_level"];
				//UPDATE attendance months to 0 if month is inactive
				$this->db->set($monthsFirsttoLast);
				$this->db->where(array("sy_id" => $monthsFirsttoLast["sy_id"], "grade_level" => $monthsFirsttoLast["grade_level"]));
				$this->db->update('attendance', $monthsFirsttoLast);
		
				$this->db->set($data);
				$this->db->where('atc_id', $data["atc_id"]);
				if($this->db->update('attendance_calendar', $data)){
				return true;
				}
				return false;
		}
		*/
		public function add($data) {
			$chckData = array(
				"sy_id" => $data["sy_id"],
				"grade_level" => $data["grade_level"],
				"attendance_type" => $data["attendance_type"]
			);
			$checkIfExist = $this->ifExist($chckData)->result_array();
			if ($checkIfExist == null) {
				$this->db->insert("attendance_calendar", $data);
				return true;
			}
			return false;
		}

		public function update ($data) {
			$monthsNotActive = array();
			foreach ($data as $key => $value) {
				if ( in_array($key, $this->months) && $value == 0) {
					$monthsNotActive[$key] = $value;
				}
			}

			if ($monthsNotActive != null) {
				$monthsNotActive["sy_id"] = $data["sy_id"];
				$monthsNotActive["grade_level"] = $data["grade_level"];
				//UPDATE attendance months to 0 if month is inactive
				$this->db->set($monthsNotActive);
				$this->db->where(array("sy_id" => $monthsNotActive["sy_id"], "grade_level" => $monthsNotActive["grade_level"]));
				$this->db->update('attendance', $monthsNotActive);
			}

			$this->db->set($data);
			$this->db->where('atc_id', $data["atc_id"]);
			if($this->db->update('attendance_calendar', $data)){
				return true;
			}
			return false;
		}

		public function get ($data) {
			$attendanceCalendar = $this->db->where($data)->get("attendance_calendar")->result_array();
			if (isset($attendanceCalendar) && $attendanceCalendar) {
				return $attendanceCalendar[0];
			}
			return false;
		}

       
    }
?>
