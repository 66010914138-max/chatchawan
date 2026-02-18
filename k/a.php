<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ 66010914138</title>
</head>

<body>
  <h1>ชัชวาล สิงห์เทศ 66010914138</h1>

  <button onclick="changeImage('img/1.jpg')" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
    รูปตัวเอง
  </button>

  <button onclick="changeImage('img/2.jpg')" style="background-color: #FFA500; color: white; padding: 10px 20px; border: none; cursor: pointer;">
    รูปอาจารย์
  </button>

  <br><br>

  <div style="margin-top: 20px;">
    <img src="img/3.jpg" width="200" id="myDisplay" src="" width="300" alt="กรุณากดปุ่มเพื่อดูรูป">
  </div>

  <script>
    function changeImage(fileName) {
     
      document.getElementById('myDisplay').src = fileName;
    }
  </script> 

</body>
</html>