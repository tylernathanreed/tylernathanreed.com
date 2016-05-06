@extends('models.tags.form', array(
	'form' => [
		'title' 		=> 'Edit',
		'route' 		=> 'tags.update',
		'params' 		=> ['tags' => $tag->slug],
		'tag' 			=> $tag,
		'submit' 		=> 'Update',
		'type' 			=> 'success'
	]
))