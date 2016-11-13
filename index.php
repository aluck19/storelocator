<html>
<head>
<title> Store Locator </title>
	<link type="Text/CSS" rel="stylesheet" href="bootstrap/dist/css/bootstrap.css"/>
		<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
		<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
		</div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(51.5073509,-0.12775829999998223),mapTypeId: google.maps.MapTypeId.ROADMAP};
		map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
		marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(51.5073509,-0.12775829999998223)});
		infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>London, United Kingdom<br>'});
		google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
		</script>
</head>
<?php 
$districts = Array
(
			0 => "Achham",
			1 => "Arghakhanchi",
			2 => "Baglung",
			3 => "Baitadi",
			4 => "Bajhang",
			5 => "Bajura",
			6 => "Banke",
			7 => "Bara",
			8 => "Bardiya",
			9 => "Bhaktapur",
			10 => "Bhojpur",
			11 => "Chitwan",
			12 => "Dadeldhura",
			13 => "Dailekh",
			14 => "Dang Deukhuri",
			15 => "Darchula",
			16 => "Dhading",
			17 => "Dhankuta",
			18 => "Dhanusa",
			19 => "Dholkha",
			20 => "Dolpa",
			21 => "Doti",
			22 => "Gorkha",
			23 => "Gulmi",
			24 => "Humla",
			25 => "Ilam",
			26 => "Jajarkot",
			27 => "Jhapa",
			28 => "Jumla",
			29 => "Kailali",
			30 => "Kalikot",
			31 => "Kanchanpur",
			32 => "Kapilvastu",
			33 => "Kaski",
			34 => "Kathmandu",
			35 => "Kavrepalanchok",
			36 => "Khotang",
			37 => "Lalitpur",
			38 => "Lamjung",
			39 => "Mahottari",
			40 => "Makwanpur",
			41 => "Manang",
			42 => "Morang",
			43 => "Mugu",
			44 => "Mustang",
			45 => "Myagdi",
			46 => "Nawalparasi",
			47 => "Nuwakot",
			48 => "Okhaldhunga",
			49 => "Palpa",
			50 => "Panchthar",
			51 => "Parbat",
			52 => "Parsa",
			53 => "Pyuthan",
			54 => "Ramechhap",
			55 => "Rasuwa",
			56 => "Rautahat",
			57 => "Rolpa",
			58 => "Rukum",
			59 => "Rupandehi",
			60 => "Salyan",
			61 => "Sankhuwasabha",
			62 => "Saptari",
			63 => "Sarlahi",
			64 => "Sindhuli",
			65 => "Sindhupalchok",
			66 => "Siraha",
			67 => "Solukhumbu",
			68 => "Sunsari",
			69 => "Surkhet",
			70 => "Syangja",
			71 => "Tanahu",
			72 => "Taplejung",
			73 => "Terhathum",
			74 => "Udayapur"
);  ?>
<body>
	<div style="width: 30%; float=left; margin-top: 7%; margin-left: 7%;">
	<table class="table table-hover">
		<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<thead>
				<th colspan="2"> Store Locator </th>
			</thead>
			<tbody>
				<tr>
					<td>Item</td>
					<td>
						<select name="itemName" class="form-control">
							<option> Laptop </option>
							<option> Smartphone </option>
						</select>
					</td>
				</tr>
					<td> Brand </td>
					<td>
						<select name="brandName" class="form-control">
						<?php 
							for ($index; $index != 0; $index--) { 
							foreach ($brandName as $index => $bName) {?>
							<option> <?php echo $bName; ?> </option>
						<?php } 
							}	
						?>
						</select>
					</td>
				<tr>
					<td> Location </td>
					<td> 
						<select name="district" class="form-control">
						<?php 
							for ($index = 0; $index != 75; $index++) { 
							foreach ($districts as $index => $dist) {?>
							<option> <?php echo $dist; ?> </option>
						<?php } 
							}	
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"> <input type="submit" class="btn btn-primary btn-lg" value="Search" name="submit"> </td>
			</tbody>
		</form>
	</table>
	</div>
	<div style='overflow:hidden;height:440px;width:700px;float:right'>
		<div id='gmap_canvas' style='height:440px;width:700px;'> </div>
		<div><small><a href="http://embedgooglemaps.com">embed google maps</a></small></div>
		<div><small><a href="https://www.buyinstagramfollowersreviews.net/">all sellers</a></small></div>
	</div>
</body>
</html>