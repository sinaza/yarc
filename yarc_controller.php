<?php

class Yarc_Controller
{
	public static $weekDays = array('SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT');
	public static $months   = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 
									'August', 'September', 'October', 'November', 'December');

	public function __construct() 
	{
		$this->model = new Yarc_Model();
	}

	public function index()
	{
		$this->render();	
	} 

	public function get_month_info()
	{
		$args = func_get_args();
		$month = $args[0];
		$year = $args[1];

		echo json_encode($this->model->get_month_info($month, $year));
	}

	public function render()
	{
		$weekDays  = self::$weekDays;
		$months	   = self::$months;

		$thisMonth = $this->model->get_this_month();
		$thisYear  = $this->model->get_this_year();

		$firstYear = Config::instance()->get('years', 'first');
		$lastYear  = Config::instance()->get('years', 'last');

		$vars	   = get_defined_vars();

		Template::instance()->render('main/yarc/calendar', $vars);
	}
}

?>
