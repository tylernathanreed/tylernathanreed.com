<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Storage;

class CSVController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function read()
	{
		$csv = $this->import('test.csv');

		// Create the Transactions Response
		$transactions = [];

		// Add each Transaction
		foreach($csv as $entry)
		{
			// Determine the Transaction from the Entry
			$transaction = $this->transform($entry);

			// Ignore POS DEBIT Transactions
			if($transaction['description'] !== 'POS DEBIT')
				$transactions[] = $this->transform($entry);
		}

		return var_dump($transactions);
	}

	/**
	 * Converts a CSV Entry to a Transaction Array.
	 *
	 * @param  array  $entry  The specified CSV Entry.
	 *
	 * @return array
	 */
	protected function transform($entry)
	{
		return [
			'traded_at' => $this->transformDate($entry['Trade Date']),
			'posted_at' => $this->transformDate($entry['Post Date']),
			'settled_at' => $this->transformDate($entry['Settlement Date']),
			'description' => $this->transformDescription($entry['Description']),
			'cents' => $this->transformCents($entry['Amount USD'])
		];
	}

	/**
	 * Converts a Date from a CSV Entry to a Carbon Instance.
	 *
	 * @param  string  $date  The specified Date.
	 *
	 * @return Carbon
	 */
	protected function transformDate($date)
	{
		return Carbon::createFromFormat('d/m/Y', $date);
	}

	/**
	 * Converts an Amount from a CSV Entry to a Cent Integer.
	 *
	 * @param  string  $amount  The specified Amount.
	 *
	 * @return int
	 */
	protected function transformCents($amount)
	{
		return intval(floatval($amount) * 100);
	}

	/**
	 * Converts a Description from a CSV Entry to a Transaction Description.
	 *
	 * @param  string  $description  The specified Description.
	 *
	 * @return string
	 */
	protected function transformDescription($description)
	{
		return str_replace('-ELEVEN', '7-ELEVEN', preg_replace('/^\d*((?:7-)?(?: ?[A-Za-z\.&\-\/]+)+).*/', '$1', $description));
	}

	/**
	 * Imports the specified CSV File into an Array.
	 *
	 * @param  string  $file  The specified File.
	 *
	 * @return array
	 */
	protected function import($file)
	{
		// Split the File by Lines
		$lines = explode("\n", Storage::get($file));

		// Read in the Headers
		$headers = array_filter(str_getcsv($lines[0]), function($field) {
			return $field !== '';
		});

		// Remove the Headers from the Lines
		unset($lines[0]); $lines = array_values($lines);

		// Initialize the CSV Map
		$csv = [];

		// Iterate each Line
		foreach($lines as $index => $line)
		{
			// Determine the Fields on each Line
			$fields = str_getcsv($line);

			// Place the Fields into the CSV Map
			foreach($headers as $j => $header)
				$csv[$index][$header] = $fields[$j];
		}

		return $csv;
	}
}
