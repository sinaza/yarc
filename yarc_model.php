<?php 

class Yarc_Model
{
	public static $monthLengths =  array(1=>31, 2=>array(28,29), 3=>31, 4=>30, 5=>31, 6=>30, 7=>31, 8=>31, 9=>30, 10=>31, 11=>30, 12=>31);

	public function get_month_info($month = null, $year = null)
	{
		$month = isset($month) ? $month :  $this->get_this_month();
		$year = isset($year) ? $year :  $this->get_this_year();

		$startDay =  date('w', strtotime("$year-$month"));
		$length = (is_int($res = $this->get_fixed_month_length($month))) ? $res : cal_days_in_month(CAL_GREGORIAN, $month, $year);

		/* You can attain number of days in each month using cal_days_in_month
		 * but knowing about their fixed length makes the process quicker by 
		 * taking advantage of O(1) algorithm
		*/

		$result = array('start_day'=>$startDay, 'length'=>$length);

		return $result;
	}

	public function get_this_month()
	{
		return date('m', strtotime('now'));
	}

	public function get_this_year()
	{
		return date('Y', strtotime('now'));
	}

	private function get_fixed_month_length($month)
	{
		$monthsLengths = self::$monthLengths;

		return $monthsLengths[$month];
	}
}

?>
