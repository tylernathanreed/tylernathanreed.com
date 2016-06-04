<?php

namespace App\Exceptions;

use Exception;
use UnexpectedValueException;

class InvalidFactoryException extends UnexpectedValueException
{
	public function __construct($sport, $code = 0, Exception $previous = null)
	{
		// Determine the Message from the Sport
		$message = "Unknown Sport Factory '{$sport}'.";

		// Call Parent Constructor
		parent::__construct($message, $code, $previous);
	}
}