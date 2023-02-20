<?
	$link = mysqli_connect("127.0.0.1", "u1162862_gydra", "ivdyfidg1", "u1162862_hailgydra");
	mysqli_set_charset($link, "utf8");
	$rol = 0;
	$answer = mysqli_query($link, "SELECT * FROM items");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<style>
		
		.item{
			width: 250px;
			height: 400px;
			background-color: #d5d5d5;
			border-radius: 5px;
			text-align: center;
			float: left;
			margin-left: 20px;
			margin-top: 20px;
		}
		.item-name{
			font-size: 24px;
			height: 100px;
		}
		.item-img{
			width: 150px;
			height: 150px;
			background-size: cover;
			background-position: center;
			border-radius: 50%;
			border: 5px solid #20913e;
			margin: auto;
			transition: 3s ease-out;
		}
		.item-price{
			color: #20cc3e;
			font-size: 30px;
			margin-top: 40px;
			margin-left: 50px;
			float: left;
		}
		.item-old-price{
			color: #20553e;
			font-size: 22px;
			margin-top: 40px;
			float: left;
		}
		.items-block{
			width: fit-content;
		}
		.item-img:hover{
			border: none;
			border-radius: 0%;
		}
	</style>
</head>
<body>
	<? while($row = mysqli_fetch_row($answer)){ ?>
		<? if($row[0] % 3 == 1){ ?>

		<div class="items-block">

		<? } ?>
		<div class="item">
			<div class="item-name">
				<? echo $row[1]; ?>
			</div>
			<div class="item-img" style="background-image: url(<? echo $row[4]; ?>);">
			</div>
			<div class="plus">плюс</div>
		    <div class="number <? echo $row[0]; ?> ">0</div>
			<? $(".plus").click(function(){
    		let oldnumber = $(".number").html();
    		$(".number").html(parseInt(oldnumber) + 1);
			}); ?>
			<div class="minus">минус</div>
			<? $(".minus").click(function(){
    		let oldnumber = $(".number").html();
    		$(".number").html(parseInt(oldnumber) - 1);
			}); ?>
			<div class="item-price">
				<? echo $row[2]; ?> руб.
			</div>
			<div class="item-old-price">
				<strike><? echo $row[3]; ?> руб.</strike>
			</div>
			<? $rol = $row[0] % 3 ?>
		</div>
		<? if($row[0] % 3 == 0){ ?>
		</div>
		<? } ?>
	<? } ?>
<? if($rol % 3 == 0){ ?>
	</div>
<? } ?>
</body>
</html>
