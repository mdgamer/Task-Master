<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

</style>
</head>
<body>

<h1 align="center">Employee Registration Form</h1>


 <table class="table  table-hover">
  <form name="f1" action="employeeinsert.php" method="post">
 <tr><td>
  <label for="fname"><b>Employee Id *</b></label></td>
    <td><input type="text" id="eid" name="eid" placeholder="Employee Id.." required></td></tr>
	
	 <tr><td>
    <label for="fname"><b>First Name *</b></label></td>
   <td> <input type="text" id="fname" name="fname" placeholder="Your name.." required></td></tr>

   <tr><td>
     <label for="lname"><b>Last Name*</b></label></td><td>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." required></td></tr>
    
      <tr><td>
<label for="gender"><b>Gender*</b></label></td>
<td>
<input type="radio" name="gender" value="M" checked > Male </td>
                <td> <input type="radio" name="gender" value="F"> Female</td>
               <td> <input type="radio" name="gender" value="O"> Other</td></tr>
               <tr><td>
    <label for="designation"><b>Designation*</b></label></td>
   <td> <select id="designation" name="desg">
     <option value="Health">Health</option>
  <option value="Investment">Investment</option>
  <option value="Car Insurance">Car Insurance</option>
  <option value="Travel">Travel</option>
    </select>
</td></tr>
   <tr><td> <label for="phno"><b>Phone No*</b></label></td>
   <td> <input type="phno" name="phno" placeholder="Your Phone No.." required></td></tr>
	<tr><td><label for="email"><b>E-Mail*</b></label></td>
    <td><input type="email" name="email" required placeholder="Your Email.."> </td></tr>
   <tr><td> <input type="submit" value="Submit"></td></tr>
  </form>


</body>
</html>
