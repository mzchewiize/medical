<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
	
	public function index()
	{
		$this->load->view('search');
	}

	function test()
	{
		echo "hello";
	}

	function searchItem()
	{
		$output_exaple = array(
			"1" => "อาการปวดหัวที่เกิดจากไมเกรน เกิดจาก การขยายและหดของเส้นเลือดผิดปกติ เราจึงรู้สึกว่ามันปวดตุบ ๆ เป็นจังหวะ ตามการเต้นของหัวใจ 
				บางครั้งก็ปวดไปหมดทั้งหัว บางครั้งก็อาจจะปวดแค่ข้างใดข้างหนึ่ง หรือปวดลงมาถึงตาก็มี สิ่งที่จะมากระตุ้นให้อาการปวดนั้นกำเริบขึ้นก็คือ การนอนดึก มีความเครียด คิดมาก กินกาแฟ หรือ ที่มีสารกระตุ้นหัวใจผสมอยู่ ประจำเดือนมา อาจจะมีอาการ มองเป็นแสงแปลบๆ คลื่นไส้ อาเจียน
				วิธีแก้ไขเบื้องต้น สามารถทำได้โดยการกินยาแก้ปวดหัว และนอนพักผ่อนให้เพียงพอ หากอาการไม่ดีขึ้นอาจจะต้องพบแพทย์และฉีดยาเป็นกรณีพิเศษให้",
			"2" => "lorem ipsum",
			"3" => "firefox is walking cross a street"
		);
		if (array_key_exists($this->input->post('search_map_id'), $output_exaple)) {
			$result = $output_exaple[$this->input->post('search_map_id')];
		}

		echo @$result;
	}
}	

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */