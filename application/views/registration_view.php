<!DOCTYPE html>
<html>
	<head>
		<title></title>

		<style type="text/css">
			 @import url(http://fonts.googleapis.com/css?family=Roboto:400);
       
        
        .form-login {
            background-color: #EDEDED;
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 15px;
            border-color:#d2d2d2;
            border-width: 5px;
            box-shadow:0 1px 0 #cfcfcf;
        }
        h4 {
            border:0 solid #fff;
            border-bottom-width:1px;
            padding-bottom:10px;
            text-align: center;
        }
        .form-control {
            border-radius: 10px;
        }
        .wrapper {
            text-align: center;
        }
        .btn btn-primary btn-block{
            float:left;
        }
		</style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{base}public/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="{base}/public/js/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="{base}public/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="{base}public/css/jquery-ui.theme.css">
        <link rel="stylesheet" type="text/css" href="{base}public/css/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/css" href="{base}public/css/customCss.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	</head>
	<body>
    <header id="header" class="top-bar navbar-fixed-top">
        <div class="container">
            <div class="text-center">
                <h1 style="color: #FFFFFF"><a  href="{base}"><img src="./Recources/home.ico" width="40" height="40"></a>&nbsp HOUSE RENT</h1>
            </div>
        </div>
    </header>
<form method='post' class='form-validate' id="test">
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                	<h4>Welcome</h4>
					<tr>
						
						<td><input name="username" type="text" value="" id="username" placeholder="USERNAME" class="form-control input-sm chat-input"/></td>
					</tr>
					<tr>
						
						<td><input name="password" type="password" id="password" placeholder="PASSWORD" class="form-control input-sm chat-input"/></td>
					</tr>
					<tr>
						
						<td><input name="Repassword" type="password" id="Repassword" placeholder="Re-Type PASSWORD" class="form-control input-sm chat-input"/></td>
					</tr>
					<tr>
						
						<td><input name="FullName" type="text" value="" id="FullName" placeholder="Full Name" class="form-control input-sm chat-input"/></td>
					</tr>
					<tr>
						
						<td><input name="PhoneNo" type="text" value="" id="PhoneNo" placeholder="Phone No(Without +88)" class="form-control input-sm chat-input"/></td>
					</tr>
					
					<tr>
						<td>&nbsp;</td>
						<td><input class="form-control btn custombtn" name="RegistrationBtn" type="submit" value="Submit"  /></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><a href="{base}login"><input  class="btn btn-primary btn-warning  btn-block" type="button" value="Login"  /></a></td>
					</tr>
				</div>
			</div>
		</div>
	</div>

			</form>
			
			<br />
			
			<!-- Label to display error message -->
			<label style="color:red">{message} </label>
		</center>
		
	</body>
</html>