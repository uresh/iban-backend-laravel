<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIbanRequest;
use Illuminate\Http\Request;
use App\Http\Resources\IbanResource;
use App\Models\Iban;

class IbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return IbanResource::collection(Iban::with('user')->orderBy('id', 'desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreIbanRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIbanRequest $request)
    {
        $data = $request->validated();
        //$data['password'] = bcrypt($data['password']);
        $iban = Iban::create($data);

        return response(new IbanResource($iban) , 201);
    }
}
