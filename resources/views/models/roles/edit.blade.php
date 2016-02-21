@extends('models.roles.form', array(
	'form' => [
		'route' 		=> 'roles.update',
		'params' 		=> ['roles' => $role->slug],
		'role' 			=> $role,
		'submit' 		=> 'Update',
		'type' 			=> 'warning'
	]
))