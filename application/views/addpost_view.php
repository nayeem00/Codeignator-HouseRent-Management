<!DOCTYPE html>
<html>
	<head>
        <title>House Rent</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{base}public/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="{base}public/css/jquery-ui.theme.css">
        <link rel="stylesheet" type="text/css" href="{base}public/css/jquery-ui.structure.css">
        <link rel="stylesheet" type="text/css" href="{base}public/css/customCss.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{base}public/js/jquery-3.1.1.js"></script>
        <script type="text/javascript" src="{base}/public/js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(document).ready(function($){
                $('#SearchBox').autocomplete({
                    source: '{base}home/getSearchResult',
                    type: 'GET'
                });
            });
        </script>
	</head>
	<body>
    <header id="header" class="top-bar navbar-fixed-top">
        <div class="container">
            <div class="text-center">
                <h1 style="color: #FFFFFF"><a  href="{base}"><img src="./Recources/home.ico" width="40" height="40"></a>&nbsp HOUSE RENT</h1>
            </div>
        </div>
    </header>
    <div id="body-content" class="container">
        <div class="text-center">
            <form id="addNewPostFrom" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>House Name</label>
                        <input name="HouseName" type="text" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Floor</label>
                        <input name="Floor" type="text"  class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Bed Rooms</label>
                        <select name="BedRoom" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Area</label>
                        <select name="area" class="form-control">
                            {area}
                            <option value="{AreaId}">{AreaName}</option>
                            {/area}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone No</label>
                        <input name="PhoneNo" type="text" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label style="padding-right: 10px">Rent(.BDT)</label>&nbsp;<label class="text-primary"><input type="radio"
                                                                                                                   name="rentStatus"
                                                                                                    value="Fixed"
                                                                                       checked> Fixed
                            <input type="radio" name="rentStatus" value="Negotiable"> Negotiable</label>
                        <input name="rent" type="text" class="form-control" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group" style="border: 1px solid grey; padding: 10px">
                        <label class="checkbox-inline"><input type="checkbox" name="Kitchen" value="Kitchen">Kitchen</label>
                        <label class="checkbox-inline"><input type="checkbox" name="Dining" value="Dining">Dinning</label>
                        <label class="checkbox-inline"><input type="checkbox" name="Drawing" value="Drawing">Drawing</label>
                    </div>
                    <div class="form-group" style="border: 1px solid grey; padding: 10px">
                        <label class="checkbox-inline"><input type="checkbox" name="Category[]" value="Family" checked>Family</label>
                        <label class="checkbox-inline"><input type="checkbox" name="Category[]" value="Bachelor">Bachelor</label>
                        <label class="checkbox-inline"><input type="checkbox" name="Category[]" value="Office">Office</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Full Adress</label>
                        <textarea name="address" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Additional Info(Optional)</label>
                        <textarea name="additional" class="form-control"></textarea>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label>Rent Type</label>-->
<!--                        <input type="radio" name="rentStatus" value="Fixed" checked> Fixed-->
<!--                        <input type="radio" name="rentStatus" value="Negotiable"> Negotiable-->
<!--                    </div>-->
                    <div class="form-group">
                        <label>Image(Size < 1MB)</label>
                        <input type="file" name="Image">
                    </div>
<!--                    <div class="form-group">-->
<!--                        <input name="postBtn" type="submit" class="btn btn-primary" value="Post"/>-->
<!--                        <a href="{HomeAction}"><input type="button" class="btn btn-info" value="Back"  /></a>-->
<!--                    </div>-->
                </div>
                <div class="col-md-6">
                    <input name="postBtn" type="submit" class="btn btn-block btn-success" value="Post"/>

                </div>
                <div class="col-md-6">

                    <a href="{HomeAction}"><input type="button" class="btn btn-block btn-info" value="Back"  /></a>
                </div>

            </form>
            <div class="col-md-12">

                <div id="message" style="color:red">{message}</div>
            </div>

        </div>
    </div>

<!--		<center>-->
<!--			-->
<!--			<fieldset style="width: 40%">-->
<!--			<legend><h2>Create New Post</h2></legend>-->
<!--			<form method="post" enctype="multipart/form-data">-->
<!--			-->
<!--				<table cellpadding="4" cellspacing="4">-->
<!--					<tr>-->
<!--						<td>House Name</td>-->
<!--						<td><input name="HouseName" type="text" /></td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Floor</td>-->
<!--						<td><input name="Floor" type="text" /></td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--					<td>Bed Rooms</td>-->
<!--					<td>-->
<!--					<select name="BedRoom">-->
<!--					  <option value="1">1</option>-->
<!--					  <option value="2">2</option>-->
<!--					  <option value="3">3</option>-->
<!--					  <option value="4">4</option>-->
<!--					  <option value="5">5</option>-->
<!--					  <option value="6">6</option>-->
<!--					  <option value="7">7</option>-->
<!--					  <option value="8">8</option>-->
<!--					</select>-->
<!--					</td>-->
<!--					</tr>-->
<!---->
<!--					-->
<!---->
<!--					<tr>-->
<!--                        <td>Kitchen</td>-->
<!--                        <td><input type="checkbox" name="Kitchen" value="Kitchen"><br></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Dining</td>-->
<!--                        <td><input type="checkbox" name="Dining" value="Dining"><br></td>-->
<!--                    </tr>-->
<!---->
<!--                    <tr>-->
<!--                        <td>Drawing</td>-->
<!--                        <td><input type="checkbox" name="Drawing" value="Drawing"><br></td>-->
<!--                    </tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Category</td>-->
<!--						<td><input type="checkbox" name="Category[]" value="Family" checked>Family-->
<!--						<input type="checkbox" name="Category[]" value="Bachelor">Bachelor-->
<!--						<input type="checkbox" name="Category[]" value="Office">Office</td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--					<td>Area</td>-->
<!--					<td>-->
<!--					<select name="area">-->
<!--					{area}-->
<!--					  <option value="{AreaId}">{AreaName}</option>-->
<!--					{/area}-->
<!--					-->
<!--					  -->
<!--					</select>-->
<!--					</td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Full Adress</td>-->
<!--						<td><textarea name="address"></textarea></td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Phone No</td>-->
<!--						<td><input name="PhoneNo" type="text" /></td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Additional Info</td>-->
<!--						<td><textarea name="additional"></textarea>(Optional)</td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Rent</td>-->
<!--						<td><input name="rent" type="text" />BDT</td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td></td>-->
<!--						<td><input type="radio" name="rentStatus" value="Fixed" checked> Fixed-->
<!--  							<input type="radio" name="rentStatus" value="Negotiable"> Negotiable</td>-->
<!--					</tr>-->
<!---->
<!--					<tr>-->
<!--						<td>Image(Size < 1MB)</td>-->
<!--						<td><input type="file" name="Image" > </td>-->
<!--  							-->
<!--					</tr>-->
<!---->
<!--					-->
<!---->
<!--					-->
<!--					-->
<!--					<tr>-->
<!--						<td>&nbsp;</td>-->
<!--						<td><input name="postBtn" type="submit" value="Post"  /></td>-->
<!--					</tr>-->
<!--					<tr>-->
<!--						<td>&nbsp;</td>-->
<!--						<td><a href="{HomeAction}"><input type="button" value="Back"  /></a></td>-->
<!--					</tr>-->
<!--				</table>-->
<!---->
<!--			</form>-->
<!--			</fieldset>-->
<!--			-->
<!--			<br />-->
<!--			-->
			<!-- Label to display error message -->


		
	</body>
</html>