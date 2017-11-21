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
			<h2>Report</h2> </br> 
			<label><a href="{base}admin">Admin Panel</a></label> <hr>

			
			
			
			<table cellpadding="15" cellspacing="20" border="1" rules="all" >
			
			
				<tr>
							<td>
									Most House Available In Area
							</td>

							<td>
						
						     {AreaName}
					
							</td>
				</tr>

				<tr>
							<td>
									Most Active User
							</td>
							<td>
									{UserName}
							</td>
				</tr>
				<tr>
							<td>
									Most Searched Keyword
							</td>
							<td>
								{Keyword}
							</td>
				</tr>
				<tr>
						    <td>
									Most Visited IP
							</td>
						<td>
							{Ip}
						</td>
	            </tr>					
				

			
			</table>
			
			
			
			

		</center>
	</body>

</html>