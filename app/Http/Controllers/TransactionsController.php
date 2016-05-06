<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Transaction;
use App\Models\User;

class TransactionsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Determine all of the Transactions
		$transactions = Transaction::all();

		return view('models.transactions.index', compact('transactions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Determine all of the Tags (as Options)
		$tags = Tag::all()->keyBy('slug')->map(function($item, $key) { return $item->name; })->toArray();

		// Determine all of the Users (as Options)
		$users = User::all()->keyBy('email')->map(function($item, $key) { return $item->name; })->toArray();

		return view('models.transactions.create', compact('users', 'tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request  The Store Request.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// Create a new Transaction
		$transaction = Transaction::create($request->all());

		// Redirect to the Index Page
		return redirect()->intended(route('transactions.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Transaction  $transaction  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Transaction $transaction)
	{
		return view('models.transactions.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Transaction  $transaction  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Transaction $transaction)
	{
		return view('models.transactions.edit', compact('transaction'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request  The Update Request.
	 * @param  Transaction  $transaction  The specified resource.
	 *
	 * @return Response
	 */
	public function update(Request $request, Transaction $transaction)
	{
		// Update the Transaction
		$transaction->fill($request->all());

		// Save the Transaction
		$transaction->save();

		// Redirect to the Index Page
		return redirect()->intended(route('transactions.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Transaction  $transaction  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Transaction $transaction)
	{
		// Flash the Action
		Flash::info('The ' . $transaction->title . ' Transaction has been deleted!');

		// Delete the Transaction
		$transaction->delete();

		// Redirect to the Index Page
		return redirect()->intended(route('transactions.index'));
	}
}
