<html>
<body>
	<h1><? echo sprintf(lang('email_forgot_password_heading'), $identity);?></h1>
	<p><? echo sprintf(lang('email_forgot_password_subheading'), anchor('admin/reset-password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
</body>
</html>