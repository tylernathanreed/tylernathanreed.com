<?php
	switch($years)
	{
		case 1:
			$type = 'danger';
			break;

		case 2:
			$type = 'warning';
			break;

		case 3:
		case 4:
			$type = 'primary';
			break;

		default:
			$type = 'success';
			break;
	}
?>

<td class="skill skill-{{ $type }}">{{ $name }}</td><td class="skill skill-{{ $type }}">{{ $years }} Year{{ $years != 1 ? 's' : '' }}</td>