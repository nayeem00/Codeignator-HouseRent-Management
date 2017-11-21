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
			<h1><a href="{base}"><img src="../../Recources/home.ico" width="32" height="32"></a>&nbsp HOUSE RENT</h1> <hr> 

			
			

			 
			<h2>Details</h2>
			<table cellpadding="25" cellspacing="20" border="1" rules="all" >
			{post}
			
				

					
					<tr><td><img src="../../Recources/Images/{Image}" width="600" height="400"></br></td></tr>
					

					
					<tr><td><b>{HouseName}</b></td></tr>
					<tr><td>Area:{AreaName}</br></td></tr>
					<tr><td>Detail: {Floor} Floor,{BedRoom} Bedrooms,{Dining} Dining,{Drawing}Drawing,{Kitchen} Kitchen<br></td></tr>
					<tr><td>Address: {Address}</br></td></tr>
					<tr><td>Category: {Category} </br></td></tr>
					<tr><td>Additional Info: {Additional}</br></td></tr>
					<tr><td>Rent:<b>{Rent} BDT({RentStatus})</br></b></td></tr>
					<tr><td>Phone Number: <b>{PhoneNumber}</b></td></tr>
					
					
				

			{/post}
			</table>

			<h2>Comment:</h2>
			<table cellpadding="25" cellspacing="20" border="1" rules="all" width="52%">
			{commentList}
				<tr><td><b>{FullName}({Time}): </b>{Commnet}</td></tr>
			{/commentList}
			</table>
			</br>
			<form method="post">
			<textarea name="comment"     style="margin:0px; width:637px;  height: 73px"></textarea></br>
			<input type="submit" name="CommentSubmit" value="Post Comment">
			</form>
			

			<h3>{SuggetionTitle}</h3>
			    
			    <table cellpadding='25' cellspacing='20' border='1' rules='all' >
			{SuggestedPost}
			
				<tr>

					<td>
					<a href='{base}home/postDetail/{PostId}'><img src='../../Recources/Images/{Image}' width='100' height='100'></a>
					</td>

					<td>
					<b>Name:<a href='{base}home/postDetail/{PostId}'>{HouseName}</a></b></br>
					Area:{AreaName}</br>{Floor} Floor,{BedRoom} Bedrooms,{Dining} Dining,{Drawing} Drawing,{Kitchen} Kitchen<br>
					Category: {Category} </br>
					Rent:<b>{Rent} BDT</b><br>Phone Number: <b>{PhoneNumber}</b>
					</td>
					
				</tr>

			{/SuggestedPost}
			</table>

			
			</table>

			
			
			

		</center>
	</body>
</html>