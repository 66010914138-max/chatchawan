<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ(แบงค์)</title>
</head>

<body>
<h1>ชัชวาล สิงห์เทศ(แบงค์)</h1>

<form method="get" action="">
    กรอกตัวเลข <input type="number" min="0" max="100" name="a" autofocus required>
    <button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if(isset($_GET['Submit'])){
    $score = $_GET['a'];

    	
    if($score > 100) {
        echo "<b style='color: red;'>กรุณากรอกคะแนนไม่เกิน 100</b>";
    } 
   
    else if ($score < 0) {
        echo "<b style='color: red;'>กรุณากรอกคะแนนไม่ต่ำกว่า 0</b>";
    } 
    
    else {
        if($score >= 80){
            $grade = "A"; 
        } else if ($score >= 70) {
            $grade = "B";
        } else if ($score >= 60) {
            $grade = "C";            
        } else if ($score >= 50) {
            $grade = "D";
        } else {
            $grade = "F";
        }

        
        echo "<span style='color: green;'><b>คะแนน $score ได้เกรด $grade</b></span>";
    }
}
?>

</body>
</html>
