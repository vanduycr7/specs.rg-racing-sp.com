<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body>
	<div style="font-size:31px;font-family:'Open Sans','HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;color:#404040;padding:0;width:100%!important;font-weight:300!important;margin:0" marginheight="0" marginwidth="0" id="m_9005326079781818848dbx-email-body">
		<div style="max-width:600px!important;padding:4px">
			<table cellpadding="0" cellspacing="0" style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" border="0" align="center">
				<tbody>
					<tr>
						<td align="center">
							<table cellspacing="0" border="0" width="100%">
								<tbody>
									<tr>
										<td style="font-size:0px;text-align:left" valign="top">
											<img alt="File Service Logo" src="/images/remapas-logo-md.png" class="CToWUd">
										</td>
									</tr>
								</tbody>
							</table>
							<table cellpadding="0" cellspacing="0" border="0" width="100%">
								<tbody>
									<tr style="font-size:14px;font-weight:300;color:#404040;font-family:'Open Sans','HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:26px;text-align:left">
										<td>
												<br>
												Request Received {{ Carbon\Carbon::now() }}
												<br>
												<br>
											<table cellspacing="0" border="0" width="100%">
												<tbody>
													<tr>
														<td>Tuning Type</td>
														<td>{{ $location }}</td>
													</tr>
													<tr>
														<td>Type of transport</td>
														<td>{{ $type }}</td>
													</tr>
													<tr>
														<td>Make</td>
														<td>{{ $make }}</td>
													</tr>
													<tr>
														<td>Model</td>
														<td>{{ $model }}</td>
													</tr>
													<tr>
														<td>Engine</td>
														<td>{{ $engine }}</td>
													</tr>
													<tr>
														<td>Name</td>
														<td>{{ $name }}</td>
													</tr>
													<tr>
														<td>Email</td>
														<td>{{ $email }}</td>
													</tr>
													<tr>
														<td>Message:</td>
														<td></td>
													</tr>
												</tbody>												
														</td>
													</tr>
													<tr>
														<td height="40" style="font-size: 12px;">
															{{ $text }}
														</td>
													</tr>
												</tbody>
											</table>
											<span style="color: #cecece; font-size: 12px;">______________________________________<br>End of Request :)</span><br><br>
										</td>
									</tr>
								</tbody>
							</table>
		</div>
	</div>
</body>
</html>