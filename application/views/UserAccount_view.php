<!DOCTYPE html>
<html>
	<head>
		<title>House Rent</title>
		<style type="text/css">
			body{
				font-family: Arial;
			}
		</style>
	</head>
	<body>

		<center>
			<h1>User Account</h1> </br><label style="color:red"> {message} </label><hr> 

			
			
			<label ><a href="{base}">Home</a></label>
			 
			
			
			<hr>
		     <h3 id="ActivePost">Active Post</h3>
		     <hr>
			<table cellpadding="15" cellspacing="20" border="1" rules="all" >
			{ActivePost}
			
				<tr>

					<td>
					<a href="{base}home/postDetail/{PostId}"><img src="./Recources/Images/{Image}" width="40" height="40"></a>
					</td>

					<td>
					<b>Name:<a href="{base}home/postDetail/{PostId}">{HouseName}</a></b></br>
					Area:{AreaName}
					</td>

				<td>
				<a href="{base}UserAccount/deletePost/{PostId}"><input type="Button" value="Delete"></a>
				<a href="{base}UserAccount/DisablePost/{PostId}"><input type="Button" value="Hired"></a>
				</td>
					
				</tr>

			{/ActivePost}
			</table>
			<hr>

			<h3 id="InActivePost">InActive Post</h3>
			<hr>
			<table cellpadding="15" cellspacing="20" border="1" rules="all" >
			{InActivePost}
			
				<tr>

					<td>
					<a href="{base}home/postDetail/{PostId}"><img src="./Recources/Images/{Image}" width="40" height="40"></a>
					</td>

					<td>
					<b>Name:<a href="{base}home/postDetail/{PostId}">{HouseName}</a></b></br>
					Area:{AreaName}
					</td>

				<td>
				<a href="{base}UserAccount/deletePost/{PostId}"><input type="Button" value="Delete"></a>
				<a href="{base}UserAccount/ActivatePost/{PostId}"><input type="Button" value="Available"></a>
				</td>
					
				</tr>

			{/InActivePost}
			</table>

	
			
			
			

		</center>
	</body>

</html>