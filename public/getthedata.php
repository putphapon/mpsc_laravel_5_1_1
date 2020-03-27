<!DOCTYPE html>
<?php
	$serverName = "localhost";
	$userName= "mpscente_mpscente";
	$userPassword = "mpsc+072";
	$dbName = "mpscente_infocard";
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	$sql = "SELECT * FROM data_info";
	$query = mysqli_query($conn,$sql);
	mysqli_set_charset($conn, "utf8");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ค้นหาข้อมูล : infocard</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
		</script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
/* Style the body */
body {
  font-family: Arial;
  display: block;
  margin: 0;
}
body:focus { 
  outline: none;
}
/* Header/Logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: blue;
  font-size: 30px;
  background-image: url('images/hero_2.jpg');
}
/* Page Content */
.content {padding:20px;}
      .loading{
       background-image: url("ajax-loader.gif");
       background-repeat: no-repeat;
       display: none;
       height: 100px;
       width: 100px;
       }
 input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit]:hover {
  background-color: #45a049;
}
.nav {
  background-color: Gainsboro; 
  list-style-type: none;
  text-align: center;
  margin: 0;
  padding: 0;
}

.nav li {
  display: inline-block;
  font-size: 20px;
  padding: 20px;
}
.footer {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	background-color: blue;
	color: white;
	text-align: center;
    }
</style>
 </head>
<body>
<div class="header">
  <h1>ระบบฐานข้อมูล</h1>
  <p><h4>MPSC<br>Manuscript Preservation and Study Center</p></h4>
</div>
 <div class="container">
  <h2 align="center"></h2>
  <p></p>
			<form class="form-inline" action="/action_page.php" align="center">
		 	<label for="word">สิ่งที่ต้องการค้น</label>
				<input type="word" class="form-control" id="word" placeholder="คำที่ต้องการค้นหา" name="word">
			<select class="form-control form-control-sm">
				<option >หมวด</option>
				<option >อักษร</option>
				<option >ประเทศ</option>
				<option >ชื่อเรื่อง</option>
			</select>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
            <div class="loading"></div>
            <div class="row" id="list-data" style="margin-top: 10px;">
          </div>
        </div>
        <script type="text/javascript" src="jquery-1.11.2.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#btnSearch").click(function () {
                    $.ajax({
                        url: "search.php",
                        type: "post",
                        data: {itemname: $("#text_code").val()},
                        beforeSend: function () {
                            $(".loading").show();
                        },
                        complete: function () {
                            $(".loading").hide();
                        },
                        success: function (data) {
                            $("#list-data").html(data);
                        }
                    });
                });
                $("#searchform").on("keyup keypress",function(e){
                   var code = e.keycode || e.which;
                   if(code==13){
                       $("#btnSearch").click();
                       return false;
                   }
                });
            });
        </script>
<div class="jumbotron text-center">
<div class="container">
 <table class="table">
	<thead>
		<tr>
		 <th><div align="center">ลำดับที่</div></th>
          <th> <div align="left">ชื่อเรื่อง</div></th>
          <th> <div align="left">ประเภท</div></th>
          <th> <div align="left">จำนวนผูก</div></th>
		  <th> <div align="left">อักษร</div></th>
		  <th> <div align="left">ปีที่จาร</div></th>
          <th> <div align="left">ประเทศ</div></th>
		  <th> <div align="left">หมวด</div></th>
		   <th> <div align="left">ที่มา</div></th>
  </tr>
		<?php
		while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
		?>
		  <tr>
		    <td align="center"><?php echo $result["no"];?></div></td>
			<td align="left"><?php echo $result["title"];?></div></td>
			<td align="left"><?php echo $result["type"];?></div></td>
			<td align="left"><?php echo $result["bundle_no"];?></div></td>
			<td align="left"><?php echo $result["character"];?></div></td>
			<td align="left"><?php echo $result["year"];?></div></td>
			<td align="left"><?php echo $result["country"];?></div></td>
			<td align="left"><?php echo $result["category"];?></div></td>
			<td align="left"><a href="http://mps-center.in.th/home/index.php#database"><?php echo $result["owner"];?></a></div></td>
		  </tr>
		<?php
		}
		?>
		</table>
		<?php
		mysqli_close($conn);
		?>
</div>
<div class="nav">
<div class="container">
  <div class="row">
		<div class="col-sm-4" align="left">
			<h4>แหล่งข้อมูลอักษรธรรม</h4>
			<a href="http://lannamanuscripts.net/th/search/new/"  target="_blank" style="text-decoration: none;" title="หอสมุดดิจิทัล คัมภีร์ใบลานล้านนา">
			 โครงการอนุรักษ์คัมภีร์ล้านนา มหาวิทยาลัยเชียงใหม่</a><br>		
			<a href="http://library.cmu.ac.th/lanna_ebook/"  target="_blank" style="text-decoration: none;" title="โครงการเชื่อมโยงระบบฐานข้อมูลเอกสารล้านนา">
			 สำนักหอสมุด มหาวิทยาลัยเชียงใหม่</a><br>
			<a href="http://202.28.27.140/" target="_blank" style="text-decoration: none;"title="ฐานข้อมูลไมโครฟิล์มเอกสารล้านนา">
			 ฐานข้อมูลไมโครฟิล์ม เอกสารล้านนา มหาวิทยาลัยเชียงใหม่</a><br>
			<a href="https://www.facebook.com/palmleave.cmru/" target="_blank" style="text-decoration: none;"title="ฐานข้อมูลไมโครฟิล์มเอกสารล้านนา">
			 ศูนย์ใบลาน มหาวิทยาลัยเชียงใหม่</a><br>
			<a href="http://www.sri.cmu.ac.th/~elanna/Microfilm/index/"  target="_blank" style="text-decoration: none;" title="ฐานข้อมูลคัมภีร์ใบลานล้านนา">
			วัดสันฐาน จ.ลำปาง </a><br>
			<a href="https://www.facebook.com/manuscriptgathers" target="_blank" style="text-decoration: none;"title="ฐานข้อมูลไมโครฟิล์มเอกสารล้านนา">
			 คัมภีร์ใบลาน พับสาและสมุดข่อย</a><br>
			<a href="https://www.facebook.com/%E0%B8%AA%E0%B8%A1%E0%B8%B2%E0%B8%84%E0%B8%A1%E0%B8%AD%E0%B8%99%E0%B8%B8%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B9%8C%E0%B9%80%E0%B8%AD%E0%B8%81%E0%B8%AA%E0%B8%B2%E0%B8%A3%E0%B9%82%E0%B8%9A%E0%B8%A3%E0%B8%B2%E0%B8%93-1481754822137845/"  target="_blank" style="text-decoration: none;" title="ฐานข้อมูลคัมภีร์ใบลานล้านนา">
			สมาคมอนุรักษ์คัมภีร์โบราณ</a><br>
			<a href="http://mps-center.in.th" target="_blank" style="text-decoration: none;"title="Manuscript Preserversion and Study Center">กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน</a><br>
			</div>
		<div class="col-sm-4" align="left">
			<h4>แหล่งข้อมูลอักษรขอม</h4>
			<a href="http://cac.kku.ac.th/?page_id=70" target="_blank" style="text-decoration: none;" title="กำลังพัฒนา">
			ศูนย์วัฒนธรรม มหาวิทยาลัยขอนแก่น</a><br>
			<a href="http://mps-center.in.th" target="_blank" style="text-decoration: none;"title="Manuscript Preserversion and Study Center">
			กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน</a><br><br><br><br>
		</div>
		<div class="col-sm-4" align="left">      
			<h4>แหล่งข้อมูลอื่นๆ</h4>
				<a href="http://www.bl.msu.ac.th/bailandata/" target="_blank" style="text-decoration: none;"title="โครงการอนุรักษ์และสืบค้นภัมภีร์ใบลาน">
				 มหาวิทยาลัยมหาสารคาม</a><br>
				<a href="http://mps-center.in.th" target="_blank" style="text-decoration: none;"title="Manuscript Preserversion and Study Center">กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน</a><br>
				<a href="https://www.sac.or.th/databases/manuscripts/main.php?m=source&p=index
				" target="_blank" style="text-decoration: none;"title="ศูนย์มานุษยวิทยาสิรินธร">ฐานข้อมูลเอกสารโบราณ</a><br>
			  <a href="https://www.lib.cmru.ac.th/web62/index.php?ge=AZDB&lang=#M" target="_blank" style="text-decoration:none;" title="CMRU LIBRARY">
			สำนักหอสมุด มหาวิทยาลัยราชภัฏเชียงใหม่</a></br>
			<a href="https://mmdl.utoronto.ca/database/" target="_blank" style="text-decoration: none;" title="Myanamar Manuscript Digital Library">
			University of Toronto</a><br>
			<a href="http://www.laomanuscripts.net/en/search
			" target="_blank" style="text-decoration: none;"title="Digital Library Lao">ฐานข้อมูลเอกสารโบราณภูมิภาคตะวันตก</a><br>
			<a href="https://www.facebook.com/palmleafkelaniya/
			" target="_blank" style="text-decoration: none;"title="คัมภีร์ใบลานอักษรสิงหล">Palm Leaf Manuscript Study & Research Library - University of Kelaniya</a><br><br><br><br><br><br>
	</div>
  </div>
</div>
<div class="footer">
	  <p>&copy; Copyright:
	  <a href="https://mdbootstrap.com/education/bootstrap/">msp-center.in.th</a></p>
</div>
</body>
</html>