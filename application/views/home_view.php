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
   <body style="background-color: #ededed">
   	<header id="header" class="top-bar navbar-fixed-top">
   		<div class="container">
         <div class="text-center">
            <h1 style="color: #FFFFFF"><a  href="{base}"><img src="{base}/Recources/home.ico" width="40" height="40"></a>&nbsp HOUSE RENT</h1>
         </div>
      	</div>
   	</header>
   	<div id="body-content" class="container">
   		<div class="row">
   			<div class="col-md-3">
                <div class="left_bar">
                    <div style="padding: 15%">
                        <form method="post">
                            <label>Price Range</label></br>
                            <div class="radio"><Input  type = 'Radio' Name ='priceRange' value= '' checked><label> None </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='priceRange' value= '0-5000'><label> <5000 </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='priceRange' value= '5000-10000'><label> 5000-9999 </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='priceRange' value= '10000-15000'><label> 10000-14999 </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='priceRange' value= '15000-20000'><label> 15000-19999 </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='priceRange' value= '20000-999999999'><label> >20000 </label></br></div>
                            </br>
                            <label>Room Number:</label></br>
                            <div class="radio">
                                <Input type = 'Radio' Name ='RoomNumber' value= '' checked><label>All</label></br>
                            </div>
                            <div class="radio"><Input type = 'Radio' Name ='RoomNumber' value= '1' > <label>>1</label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='RoomNumber' value= '2'> <label>>2</label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='RoomNumber' value= '3'><label> >3 </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='RoomNumber' value= '4'> <label>>4 </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='RoomNumber' value= '5'> <label>>5 </label></br></div>
                            </br>
                            <label>Category:</label></br>
                            <div class="radio"><Input type = 'Radio' Name ='Category' value= '' checked> <label>All </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='Category' value= 'Family' > <label>Family</label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='Category' value= 'Bachelor'> <label>Bachelor </label></br></div>
                            <div class="radio"><Input type = 'Radio' Name ='Category' value= 'Office'> <label>Office </label></br></div>
                            <input class="btn custombtn" type="submit" name="filterSubmit" value="Filter">
                        </form>
                    </div>
                </div>
   		    </div>
   		    <div class="col-md-9">
                <div class="row" >
                    <div class="account-bar" style="padding: 10px">
                        <div class="col-md-6">
                            <div class="account-bar-links">
                                <a class="btn custombtn" href="{action}">{label}<span style="color: #000000">{username}</span></a>
                                <a class="{regclass}" href="{RegistrationAction}" ">{RegistrationLabel}</a>
                                <a  class="{accclass}" href="{AccountOptionAction}">{AccountOption}</a>
                                <a class="btn custombtn" href="{postad}">Post Ad </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="searchbox">
                                <form method="post" class="form-inline text-right" style="width: 100%">
                                    <div class="form-group" style="width: 80%">
                                        <input name="SearchBox" class="form-control" type="text" value="{SearchBoxValue}" id="SearchBox">
                                    </div>
                                    <input class="btn custombtn" name="Search" type="Submit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 <label style="color:green"> {message} </label>
                <div class="row">
                    <div id="allpost">
                        <table class="post table table-striped table-bordered">
                            {post}
                            <tr>
                                <td class="postimage" style="text-align: center;" >
                                    <a href="{base}home/postDetail/{PostId}"><img src="./Recources/Images/{Image}"></a>
                                </td>
                                <td>
                                    <b>Name:<a href="{base}home/postDetail/{PostId}">{HouseName}</a></b></br>
                                    Area:{AreaName}</br>{Floor} Floor,{BedRoom} Bedrooms,{Dining} Dining,{Drawing} Drawing,{Kitchen} Kitchen<br>
                                    Category: {Category} </br>
                                    Rent:<b>{Rent} BDT</b><br>Phone Number: <b>{PhoneNumber}</b>
                                </td>
                            </tr>
                            {/post}
                        </table>
                       <?php
                       if($SuggetionTitle !="")
                       { ?>
                        <h3 id="suggestion_title">{SuggetionTitle}</h3>
                        <?php
                        
                       }
                       
                        ?>
                       
                        <table class="post table table-striped table-bordered">
                            {SuggestedPost}
                            <tr>
                                <td class="postimage" style="text-align: center;">
                                    <a href='{base}home/postDetail/{PostId}'><img src='./Recources/Images/{Image}'></a>
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
                    </div>
                </div>
            </div>

   		    </div>
   		</div>
   </body>
</html>