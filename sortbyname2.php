<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/css" charset="UTF-8">
<meta http-equiv="Content-Language" content="en-us">
<meta name="viewport" content="width=device-width ,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=10">
 <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="jquery1.css">
  <script src="jquery2.js"></script>
  <script src="jquery3.js"></script>
    
     <style>
	  h4{
      background-color: black;
      color: white;
      opacity: 1;
		padding-top:20px;
		padding-bottom:20px;
     }
	.footer{
	 padding-top:2px;
	
      color: white;
      opacity: 1;
		padding-bottom:20px;
		
		float: bottom;
		bottom:0px;
		width: 100%;
			 }
 
     h1{
      background-color: black;
      color: white;
      opacity: 0.9;
	    padding-top:20px;
	  padding-bottom:20px;
    

     }
     h2{
       background: -webkit-linear-gradient(#e96443, #904e95);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 32px;
 
  
     }
     .btn {
  flex: 1 1 auto;
  margin: 20px;
  padding-left: 30px;
   padding-right: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: black;

  box-shadow: 0 0 20px #eee;
  border-radius: 20px;
 }

.btn:hover {
  background-position: right center; 
}

.btn-3 {
  background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
}

body{

  background: linear-gradient(to bottom,green,lightblue,green);
}
table,tr,td{
    border: 3px solid black;

	
    margin-left: auto;
    margin-right: auto;
}
th{border: 3px solid black;
color:red;
text-align:center;}
     .btn1 {  flex: 1 1 auto;
  margin: 20px;
  padding-left: 30px;
   padding-right: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: black;

  box-shadow: 0 0 20px #eee;
  border-radius: 20px;
}
     .btn2 {  flex: 1 1 auto;
  margin: 20px;
  padding-left: 30px;
   padding-right: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: black;

  box-shadow: 0 0 20px #eee;
  border-radius: 20px;
}
     .btn3 {  flex: 1 1 auto;
  margin: 20px;
  padding-left: 30px;
   padding-right: 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: black;

  box-shadow: 0 0 20px #eee;
  border-radius: 20px;
}
.logo img{
  display: block;
  height: 100px;
  width: 100px;
  float: left;
 
}
.container{
background: linear-gradient(to right,lightblue,white,lightblue);
margin-left: auto;
    margin-right: auto;
}
.status{
margin-left:420px;
margin-right:420px;
background-color:#FFCC33;
border:solid;
border-color:#000000;
}
     </style>
</head>
<h1><big><div class="logo"><img  src="logo.png"  class="img-circle"><center>&nbsp;&nbsp;<big><big><b>आई.टी एवं आई.एस </b></big></big>&nbsp;<b><big><big>&#2358;&#2367;&#2325;&#2366;&#2351;&#2340; &#2344;&#2367;&#2357;&#2366;&#2352;&#2339; &#2346;&#2381;&#2352;&#2339;&#2366;&#2354;&#2368; </big></big></b><br>
<b>IT &amp; IS GRIEVANCE REDRESSAL SYSTEM</b></b></big></div>
</h1>
<br>
<b><center>
<div class="status">
  <h2><br>
    शिकायतें <br>
   <b> COMPLAINTS</b>
</center></b></h2>
</div>       <div class="container">
<br>
<table align="center" class="table table-hover">
<thead>
<tr>
<th size="18"align="center">क्रमांक<br>
  S.no</td>
<th align="center"> शिकायत संख्या<br>
  Complaint no</th>
<th align="center">&#2344;&#2366;&#2350;<br>
  Name</th>

<th align="center">&#2346;&#2342;<br>
  Designation</th> 
<th align="center">शिकायत की तारीख एवं समय<br>
  Date  and Time of complaint</th>
<th align="center"><b>विषय</b><br>
  Subject</th>
<th align="center">स्थिति<br>
  Status</th>
<th align="center"><b>कार्यवाई की तारीख़</b><br>
  Action taken on</th>
<!--<th align="center">दिनों की संख्या<br>
  No Of Days</th>-->
<th align="center">देखें<br>
  View</th>
  <th align="center">प्रिंट<br>
  Print</th>
</tr>
</thead>
<tr class="success">
<?php
$nameentered=$_POST['name'];
 $userid=$_POST['userid'];
  $userpass=$_POST['userpass'];
$connection='DRIVER={SQL SERVER};SERVER=lasteclab;dsn=mis;database=mis';
$user='mis';
$pass='mis';
$conn=odbc_connect($connection, $user, $pass);
$sql="select * from user_complaint where (user_complaint.Login_id='$userid' or user_complaint.fwd='$userid') and (user_complaint.name like '%$nameentered%') order by reqno desc;";
$result=odbc_exec($conn, $sql);
$sno=0;
while(odbc_fetch_row($result))
{
  
    $id=odbc_result($result,'reqno');
$sno=$sno+1;
$date=odbc_result($result,'user_date');
$date1=date('d-m-Y');
	
	 $currdate=date('d-m-Y');
	 $status=odbc_result($result,'status');
	
	 echo "<tr>";
echo "<td>".$sno."</td>";
	 echo "<td>".odbc_result($result,'reqno')."</td>";
echo "<td>".odbc_result($result,'name')."</td>";

echo "<td>".odbc_result($result,'desig')."</td>";
echo "<td>".odbc_result($result,'user_date')."</td>";
echo "<td>".odbc_result($result,'subject')."</td>";

echo "<td>".$status."</td>";
echo "<td>".odbc_result($result,'action_date')."</td>";

	
	


echo "<td>";
	?>
	<form method="POST" action="sortbynameview.php">	
			<INPUT TYPE="HIDDEN" NAME="req" VALUE="<?=odbc_result($result,'reqno')?>" >	<INPUT TYPE="HIDDEN" NAME="userid" VALUE="<?=$userid?>" ><INPUT TYPE="HIDDEN" NAME="userpass" VALUE="<?= $userpass?>" ><INPUT TYPE="HIDDEN" NAME="name" VALUE="<?=$nameentered?>" >
				<p align="center">
				<button type="submit" name="view" class="btn btn-success btn-md"/> 
				<span class="glyphicon glyphicon-eye-open"></span>View MAIL</button></p>
				
				
				</p>
	</form>
	<?php
				echo "<td>";
  if($status!="NEW"){
?> 
<form method="post" action="temp.php">
<INPUT TYPE="HIDDEN" NAME="req" VALUE="<?=odbc_result($result,'reqno')?>" >	<INPUT TYPE="HIDDEN" NAME="userid" VALUE="<?=$userid?>" ><INPUT TYPE="HIDDEN" NAME="userpass" VALUE="<?= $userpass?>" ><button type="submit" name="print" class="btn btn-success btn-md" /> 
				<span class="glyphicon "></span>PRINT</button></p></form>	 
	<?php } echo "</td>";
	echo "</tr>";
	}
	?>
</table>


<center>
<form method="POST" action="sortbyname.php">
  <input type="submit" name="Back" value="वापस  /  Back"  class="btn btn-3">
  <INPUT TYPE="HIDDEN" NAME="userid" VALUE="<?=$userid?>" ><INPUT TYPE="HIDDEN" NAME="userpass" VALUE="<?= $userpass?>" >
</form>
 <input type="submit" name="logout" value="लॉग आउट  /  LOGOUT"  class="btn btn-3" onClick="parent.open('logout.php')">
</center>

</div>       
   </p>
   
 
 </body>
  <center><div class="footer">
    <h4>Designed and developed by IT & IS group&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php date_default_timezone_set("Asia/Kolkata");echo date('d/m/Y'); ?> &nbsp;</h4>
  </div></center>
 </html>
 
 
 
 
 
 
 
 




           
   
   
 
 