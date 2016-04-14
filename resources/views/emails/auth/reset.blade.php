<?php
	$link = route('auth.reset', [
		'token' => $token,
		'email' => $user->getEmailForPasswordReset()
	]);
?>

Click here to reset your password: <a href="{{ $link }}"> {{ $link }} </a>