<?php 
session_start();
?>
<HTML>
<HEAD>
<TITLE>
Employee
</TITLE>
</HEAD>
<BODY>
<h1 align="center">Employee List</h1>
       <table cellpadding="10px" align="center" >
           <form name="f1" action="employeeretrieve.php" method="post">
           <tr><td><b> Employee Id</td></b><td><input type="text" name="eid"></td></tr>
		   
<tr><td><input type="submit" value="Search"></td><td><input type="reset" value="Reset"></td></tr>           
      </form></table> 
</BODY>
</HTML>