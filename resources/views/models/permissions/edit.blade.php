@extends('models.permissions.form', array(
	'form' => [
		'route' 		=> 'permissions.update',
		'params' 		=> ['permissions' => $permission->slug],
		'permission' 	=> $permission,
		'submit' 		=> 'Update',
		'type' 			=> 'warning'
	]
))