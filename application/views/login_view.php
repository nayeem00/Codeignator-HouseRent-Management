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
		<center class="container">
			<div class="top_bar">
			<h1 style="color: #FFFFFF"><a  href="{base}"><img src="./Recources/home.ico" width="40" height="40"></a>&nbsp HOUSE RENT</h1> 
			</div>
			</center>
		<center>
			
			
<form method='post' class='form-validate' id="test">
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-md-offset-5 col-md-3">
                <div class="form-login">
                    <h4>Welcome</h4>
					

						<input class="form-control" name="username" type="text" value="" placeholder="UserName" class="form-control input-sm chat-input"/>
					
						
						<input name="password" type="password" placeholder="Password" class="form-control input-sm chat-input"/>
					
					<tr>
						<td>&nbsp;</td>
						<td>{captcha} </td>
					</tr>
					<label ">{captchaField}</label>
					<tr>
						<td>&nbsp;</td>
						<td><input class="form-control btn custombtn" name="buttonLogin" type="submit" value="Login"  /></td>
					</tr>
					<tr></tr>

					<tr>
						<td>&nbsp;</td>
						<td><a href="{base}registration" id="reg" class="btn btn-primary btn-warning  btn-block">Registration</a></td>
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