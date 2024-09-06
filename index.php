<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="skeleton.css">
<style>
th, td {color:#666;}
.primary_1 {margin-left:0px;height:320px;}
.primary_2 {width:100%;display:inline-block;}
.primary_1 img {width:180px;}
label {font-weight:normal;}
</style>
</head>
<body>
<div class="container">

<div>
<form method="get">

<div class="primary_2">
<?php
$data_raw = file_get_contents("a.json");
$data = json_decode($data_raw, true);
$count = count($data);

for ($i=0; $i<$count; $i++) {
echo '<div class="primary_1 three columns">';
echo '<label>';
echo '<img src="'.$data[$i]["img"].'">';
echo "<br>";
echo "￥".$data[$i]["price"];
echo "<br>";
echo '<input type="checkbox" name="'.$data[$i]["name"].'" value="1">'.$data[$i]["item"].'</label>';
echo "</div>";
}
?>
</div>
<input type="submit" class="button button-primary" value="submit">
</form>
</div>

<div>
<table>
<?php
$all_quantity = 0;
$all_price = 0;

foreach ($_GET as $key => $value) {
for ($i=0; $i<$count; $i++) {
if ($data[$i]["name"] == $key) {
echo '<tr><td>';
echo $data[$i]["item"];
echo '</td><td>';
echo $value;
echo '</td><td>';
echo $data[$i]["price"];
echo '元</td></tr>';
$all_quantity = $all_quantity + $value;
$all_price = $all_price + $data[$i]["price"]*$value;
}
}
}
echo '<tr><td></td><td>';
echo $all_quantity;
echo '</td><td>';
echo $all_price;
echo '</td></tr>';

?>
</table>
</div>

</div>
</body>
</html>
