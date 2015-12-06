<?
	session_start();
	if (isset($_GET['action']) && $_GET['action']=='send_form'){
		foreach ($_GET as $key => $val) {
			${$key} = $val;
		}
		
		$to  = "<".$_SESSION['admin_email'].">";
		$from  = "$mail_inp <magic@salon.com>" ;		
							
		$subject = $form_name." \r\n"; 
		
		if($action_type=='order_form'){
		
			$emessage = '
			<html>
				<head>
				<title>'.$form_name.'</title>
				</head>
			<body>
				<div style="width: 660px;">
				<table>
				
					<tr>
						<td>name:</td>
						<td>'.$name_inp.'</td>
					</tr>
					<tr>
						<td>mail:</td>
						<td>'.$mail_inp.'</td>
					</tr>
					<tr>
						<td>phone:</td>
						<td>'.$phone_inp.'</td>
					</tr>
					<tr>
						<td>subject:</td>
						<td>'.$subject_inp.'</td>
					</tr>
					<tr>
						<td>message:</td>
						<td>'.$text_inp.'</td>
					</tr>
				</table><br/>
				</div>
			</body>
			</html>';
		}elseif($action_type=='call_form'){
		
			$emessage = '
			<html>
				<head>
				<title>'.$form_name.'</title>
				</head>
			<body>
				<div style="width: 660px;">
				<table>
					<tr>
						<td>Телефон</td>
						<td>'.$phone_inp.'</td>
					</tr>
				</table><br/>
				</div>
			</body>
			</html>';
		}elseif($action_type=='name_form'){
		
			$emessage = '
			<html>
				<head>
				<title>'.$form_name.'</title>
				</head>
			<body>
				<div style="width: 660px;">
				<table>
					<tr>
						<td>Телефон</td>
						<td>'.$phone_inp.'</td>
					</tr>
					<tr>
						<td>Имя</td>
						<td>'.$name_inp.'</td>
					</tr>
				</table><br/>
				</div>
			</body>
			</html>';
		}
									
			$headers  = "Content-type: text/html; charset=utf-8 \r\n";
			$headers .= "From: ".$from."\r\n";
								
			mail($to, $subject, $emessage, $headers);
			
			echo 'sended';
	}
?>