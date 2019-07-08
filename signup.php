<?php 
   require "header.php";
 ?>

    <main>
    	<div class = "wrapper.main">
    		<section class="section-default">
    			<h1> Signup </h1>
    			<form action="includes/signup.inc.php" method="post">
    				<input type="login_id" name="lid" placeholder="=Login ID">
    				<input type="text" name="uid" placeholder="=Username">
    				<input type="text" name="mail" placeholder="=E-mail">
    				<input type="password" name="pwd" placeholder="=Password">
    				<input type="password" name="pwd-repeat" placeholder="=Repeat password">
    				<input type="group_name" name="gname" placeholder="=Group Name">
    				<input type="text" name="gid" placeholder="=Group ID">
    				<button type="submit" name="signup-submit"> Signup </button>
    			</form>
    		</section>
    	</div>    	   	
    </main>


<?php 
   require "footer.php";
 ?>