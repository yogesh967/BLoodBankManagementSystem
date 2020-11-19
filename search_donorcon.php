<?php

$conn = new PDO("mysql:host=localhost;dbname=registerdonor", "root", "");

$column = array('name', 'email', 'birth', 'age', 'gender', 'bgroup', 'weight', 'phone', 'mobile', 'address', 'State', 'city');

$query = "
SELECT * FROM register where status =1
";

if(isset($_POST['filter_bgroup'], $_POST['filter_city']) && $_POST['filter_bgroup'] != '' && $_POST['filter_city'] != '')
{
 $query .= '
 AND bgroup = "'.$_POST['filter_bgroup'].'" AND city = "'.$_POST['filter_city'].'"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY ID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conn->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $conn->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array = array();
 $sub_array[] = $row['name'];
 $sub_array[] = $row['email'];
 $sub_array[] = $row['birth'];
 $sub_array[] = $row['age'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['bgroup'];
 $sub_array[] = $row['weight'];
 $sub_array[] = $row['phone'];
 $sub_array[] = $row['mobile'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['State'];
 $sub_array[] = $row['city'];
 $data[] = $sub_array;
}

function count_all_data($conn)
{
 $query = "SELECT * FROM register where status=1";
 $statement = $conn->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($conn),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>
