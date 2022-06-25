<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tbl_course.*, tbl_subject.subject, tbl_schoolyear.schoolyear FROM tbl_course, tbl_subject, tbl_schoolyear WHERE tbl_course.id_subject = tbl_subject.id_subject AND tbl_course.id_schoolyear = tbl_schoolyear.id_schoolyear";
$result = $conn->query($sql);

$data 	= array();
while($item = $result->fetch_assoc()){
	$clase = "event-warning";
	if ($item['period'] == "SA:01" || $item['period'] == "SA:02") {
		$clase = "event-info";
	}

	$value = [
		"id" 	=> $item['id_course'], 
		"title" => "Phòng: " . $item['local'] ." - Buổi ". $item['period'] ." - Nhóm ". $item['group'] ." - ". $item['subject'] ." - Giảng viên: ". $item['teacher'], 
		"url" 	=> "",
		"class" => $clase,
		"start" => strtotime($item['date'])."000", 
		"end" 	=> strtotime($item['date'])."000"
	];
	array_push($data, $value);
}

$conn->close();
?>

{
	"success": 1,
	"result":  <?php echo json_encode( $data, JSON_UNESCAPED_UNICODE ); ?>
}
