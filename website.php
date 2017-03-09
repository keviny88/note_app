<?php

mysql_connect("localhost", "root", "");

mysql_select_db("note_application");

$query= mysql_query("SELECT * FROM notes ORDER BY note_date DESC");

?>

<!DOCTYPE html>



<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

	<title> KEVIN's WEBPAGE </title>

</head>
<style>

header{
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	background-color:#3b5998;
	height:43px;
	z-index:1000000;
	
}


#title{
	position:absolute;
	top:5px;
	left: 450px;
	width: 30%;
	height: 35px;
	font-size: 30px;
	font-weight: bold;
	font-family: helvetica;
	color: white;
}

#add_button{
	width:30px;
	height:30px;
	background-color:#fff;
	border-radius:2px;
	position: relative;
	margin-left:1%;
	top:8px;
	text-align:center;
}

#add_inner{
	font-size: 35px;
	font-weight:bold;

}

/*RIGHT SIDE DIV */
#right{
	position: absolute;
	top: 43px;
	left:452px;
	width: 100%;
	height: 80%;
	background-color: white;
	display:inline-block;
}

#right_header{
	position: absolute;
	height: 65px;
	background-color: white;
	width: 75%;
	left: 8px;
	border-bottom: 1px solid #e6e6e6;
	border-bottom-style: outset;

}

#right_header_title{
	top: 10px;
	position:absolute;
	height: 40px;
	width: 400px;
	font-weight: bold;
	font-size: 20px;
	font-family:Tahoma;
	color: #4775d1;
}

#right_header_date{
	top:35px;
	width: 400px;
	position:absolute;
	height:10px;
	font-size: 16px;
	font-family:Tahoma;
	color: #5d85d5;
}

#right_input{
	width: 1300px;
	position:absolute;
	top: 70px;
	left: 10px;
	height: 600px;
}

/* LEFT SIDE BAR NOTE BOXES */
#left{
	position: absolute;
	top:43px;
	left:0px;
	width:450px;
	height: 80%;
	background-color: #9FBED9;
	border-right: 2px solid #e6e6e6;
	border-right-style: outset;

}

.note_box{
	width: 450px;
	height: 115px;
	border-radius:2px;
	position: relative;
	background-color: #ecf2f9;
	border-bottom: 1px solid #d9e6f2;
	border-bottom-style: outset;

}
.note_picture{
	width: 95px;
	height: 95px;
	background-color: white;
	position: absolute;
}

.note_title{
	width: 50%;
	top:5px;
	left: 110px;
	height: 20px;
	font-weight: bold;
	font-size: 15px;
	font-family: Helvetica;
	color: #404040;
	position: absolute;
	display: inline-block;
}

.note_body{
	position: absolute;
	left: 110px;
	top: 30px;
	width: 100%
	max-height: 20px;
	right: 10px;
	font-size: 12px;
	font-family: Helvetica;
	color: #595959;
	bottom: 10px;
}

.note_date{
	position: absolute;
	height: 16px;
	top: 7px;
	left: 300px;
	right: 10px;
	text-align: right;
	font-style: italic;
	font-family: Helvetica;
	font-size: 12px;
	color:  #737373;
}

img {
	max-height: 100%;
	max-width: 100%;
}

</style>



<body>

<script>

console.log("HELLO");
/* Function for bringing the note information to the screen when clicked
*/
	
$(".note_box").click(function()
{
	var $right_input = $('#right_input')
	var url= "api.php?id=" + $(this).attr("id")
	$.ajax(
	{
		type: 'GET',
		url: url,
		success: function(data) 
		{
			$right_input.append(data);
		}
	})
});
*/



$(function(){
	var $right_input = $('#right_input')
	$.ajax({
		type: 'GET',
		url: "api.php?id=" + "1",
		success: function(data) {
			$right_input.append(data);
		}
	});


});


</script>


<header>
	<div id= "title"> MyNOTE </div>
	<div id="add_button"><span id="add_inner">+</span></div>



</header>


<div id= "left">
	<?php
	
	/* Fetching all of the notes and displaying them on the website
	*/

	while($row= mysql_fetch_array($query))
	{
		echo "<div class= 'note_box' id=".$row['note_id'].">";
		echo "<div class= 'note_picture'></div>";
		echo "<div class= 'note_title'>".$row['note_title']."</div>";
		echo "<div class= 'note_date'>".$row['note_date']."</div>";
		echo "<div class= 'note_body'>".$row['note_body']."</div>";
		echo "</div>";
	}

	?>
</div>



<div id= "right">
	<div id= "right_header"> 
		<div id= "right_header_title"> this is the greatest note ever</div>
		<div id= "right_header_date"> January 4th, 2017</div>
	</div>
	<div id= "right_input">
	</div>
</div>







</body>























</html>



