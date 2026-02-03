<?php include 'publicheader.php';


if (isset($_POST['submitbutton'])) 
{
	extract($_POST);
	$h="select * from login where username='$username' and password='$password'  ";
	$res=select($h);

	if (sizeof($res)>0) 
	{

				$_SESSION['login']=$res[0]['login_id'];
				$login_id=$_SESSION['login'];

			if ($res[0]['usertype']=='admin') 
			{
				return redirect('admin_home.php');
			}

			if ($res[0]['usertype']=='police') 
			{
				$d="select * from polices where login_id='$login_id'";
				$do=select($d);
				if (sizeof($do)>0) 
				{
					$_SESSION['police_id']=$do[0]['police_id'];
					$police_id=$_SESSION['police_id'];
				}
				return redirect('police_home.php');
			}

			if ($res[0]['usertype']=='user') 
			{
				$l="select * from users where login_id='$login_id' ";
				$fo=select($l);
				if (sizeof($fo)>0) 
				{
					$_SESSION['user_id']=$fo[0]['user_id'];
					$user_id=$_SESSION['user_id'];
					alert('please verify your aadhar');
					
				}
				return redirect("verify_user_aadhar.php");
			}
	}
	else
	{
		alert('invalid username or password');
		return redirect('login.php');
	}


}





 ?>

<center>

	  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
	
<h1>Log<span>in</span></h1>

<form method="post">
	
<table class="table" style="width: 500px;">
	<tr>
		<th>Username</th>
		<td><input type="text" required="" class="form-control" name="username"></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><input type="password" required="" class="form-control" name="password"></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="submitbutton"></td>
	</tr>
</table>

</form>

    </div>
  </section><!-- End Hero -->


</center>

<?php include 'footer.php' ?>