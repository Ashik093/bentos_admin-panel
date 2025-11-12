<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thank You for Contacting Us</title>
	<style type="text/css">
		body {
			
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			font-weight: bold;
		}
		.container {
			background-color: rgba(255, 255, 255, 0.8);
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			max-width: 600px;
			margin: 0 auto;
		}
		h1 {
			color: #333;
			font-size: 36px;
			margin-top: 0;
			text-align: center;
			margin-bottom: 20px;
		}
		p {
			color: #666;
			font-size: 18px;
			line-height: 1.5;
			margin-bottom: 20px;
			margin-top: 0;
		}
	</style>
</head>
<body style="background-image: url('{{$details['emailbg']}}');
background-repeat: no-repeat;
background-size: cover;
margin: 0;
padding: 0;
font-family: Arial, sans-serif;">
	<div  style="background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 600px; margin: 0 auto;">
		<h1 style="color: #333; font-size: 36px; margin-top: 0; text-align: center; margin-bottom: 20px;">A new email from {{$details['name']}}</h1>
		
		<p style="color: #666; font-size: 18px; line-height: 1.5; margin-bottom: 20px; margin-top: 0;">There is new message from Tiles Corner contact us. Here is the preview of email:</p>
		<table style="border-collapse: collapse; width: 100%;">
			<tr>
				<th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; font-weight: bold;">Name:</th>
				<td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{$details['name']}}</td>
			</tr>
			<tr>
				<th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; font-weight: bold;">Email/Phone:</th>
				<td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{$details['emailPhone']}}</td>
			</tr>
			<tr>
				<th style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd; font-weight: bold;">Message:</th>
				<td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{$details['description']}}</td>
			</tr>
		</table>
	</div>
</body>
</html>