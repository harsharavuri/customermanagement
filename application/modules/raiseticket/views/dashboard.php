<html>
<head>
	 
    
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="assets/css/custom.css" rel="stylesheet">
    --><style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
}

    body {
background-color: light blue;
color: light blue;

background-repeat:no-repeat;
background-size:cover;
font-family:"lucida grande", tahoma, verdana, arial, sans-serif;
font-size: 16px;
line-height: 1.5em;
}
   #header {
    background-color: white;
       
    color:light blue;
       background-size: auto;
    text-align:left;
    padding:5px;
       
}
        #head2{
            background-color: white;
        padding:0.1px;
            
        }

        #tab1{
            height: 30px;
            width: 100%;
            border-spacing: inherit;
            background-color: #00FFFF ;
color:black;
            
        }#row1{
            text-decoration: none;
           color:white ;
           
        } 
        .signup {
background-color: #0079ce;
border: none;
border-radius: 0px 3px 3px 0px;
-moz-border-radius: 0px 3px 3px 0px;
-webkit-border-radius: 0px 3px 3px 0px;
color: #f4f4f4;
cursor: pointer;
height: 50px;
text-transform: uppercase;
width: 250px;
}#complaint1{
            position:absolute;
            top:250px;
            left:250px;
        }/*
        #complaint2{
            position:absolute;
            top:550px;
             left:250px;
        }
         #complaint3{
            position:absolute;
            top:850px;
            left:250px;
            
        }*/
        #h1{
            color:brown;
            font-size: 20px;
            position: absolute;
            top:250px;
        }
         #di
        {
            border-color: black;
            border: 1px;
        }
        #he1{
            color:blueviolet;
            font-size: 15px;
            position: absolute;
            top:200px;
            left:20px;
        } 
        #di
        {
         position: absolute;
            top: 150;
            right:30;
         
            border-radius: 4px;
            background-color: black;
        }
        #aladeen{
            color: white;
        }
    </style>

</head>
<body>
<input type="hidden" name="email" id="storeEmail">
	<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url()?>assets/js/signup.js"></script>
<div id="header">
    
<h2><font color: blue >Welcome To Customer Complaint Portal:</h2>
</div>
    <div id="head2">
     
<h1>    </h1>
</div>

   <div id="tab1"><div id="row1">
            </div><table width="100%">
    <tbody><tr>
        <td><b id="findStatus" >FIND STATUS</b></td>
        <td><b id="previousRequests" >PREVIOUS REQUESTS</b></td>
        <td><b id="allTickets"> All Tickets</b></td>
        <td><b id="tagSearch"> tagSearch</b></td>
        </tr>
    </tbody></table>
    <br/>
    <br/>
 <center>
    <button class="button"><h2>WANT TO REPORT A NEW PROBLEM?</h2></button>
 <br/>
 <br/>
 <h3>PLEASE SELECT AN OPTION:</h3>
   <br>
   </center>
<center>
<select id="selectTag">
  <option value="lan">LAN/INTERNET</option>
  <option value="electricity">ELECTRICITY</option>
  <option value="plumbing">PLUMBING</option>
  <option value="carpenter">CARPENTER</option>
  <option value="mess">MESS</option>
  <option value="OTHER">OTHER</option>
</select>
<input id="description" placeholder="description" type="text">
<input id="raiseTicket" type="submit" ></input>
<input type="submit" value="search" id="getSearchValues">
<div id="writeHere" style="display:none">
	<input type="text" id="containsID">
	<input type="submit" id="getFinalStatus">
	
</div>
<div id="populate"></div>
</center>
<br/><br/>
<br/><br/>
    </div>
	
	
	
	
 <!--
    <form action="#">
        <tbody><tr><td align="center"><i><div id="aladeen">Name :: ************</div></i></td>
        </tr>
        <tr><td align="center"><i><div id="aladeen">ID   :: ************</div></i></td></tr>
        </tbody></table>
  -->
 
</body>

</html>