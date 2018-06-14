<?php

namespace App\Http\Controllers\Api;

use App\Signature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SignatureResource;

class SignatureController extends Controller
{
	/**
	 * [index return a paginated list of signatures]
	 * @return SignatureResource
	 */
	public function index(){
		$signatures = Signature::latest()
			->ignoreFlagged()
			->paginate(20);

		return SignatureResource::collection($signatures);
	}

	/**
	 * [show fetch and return the signature]
	 * 
	 * @param Signature
	 * @return SignatureResource
	 */
	public function show(Signature $signature){
		return new SignatureResource($signature);
	}

	/**
	 * [store validate and save one signature into database]
	 * @param  Request $request
	 * @return SignatureResource
	 */
	public function store(Request $request){
		$signature = $this->validate($request, [
			"name" => "required|min:3|max:50",
			"email" => "required|email",
			"body" => "required|min:3"
		]);

		$signature = Signature::create($signature);

		return new SignatureResource($signature);
	}
}
