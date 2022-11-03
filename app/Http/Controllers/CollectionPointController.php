<?php

namespace App\Http\Controllers;

use App\Models\CollectionPoint;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CollectionPointController extends Controller
{

    public function index(): JsonResponse
    {
        $collectionPoints = CollectionPoint::all();
        return response()->json(['collectionPoints' => $collectionPoints], Response::HTTP_OK);
    }

    public function create(Request $request): JsonResponse
    {
        $collectionPoint = CollectionPoint::create([
            'owner_id' => $request->owner_id,
            'name' => $request->name,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'localidade' => $request->localidade,
            'uf' => $request->uf,
        ]);

        return response()->json(['collectionPoint' => $collectionPoint], Response::HTTP_CREATED);
    }

    public function show(CollectionPoint $collectionPoint)
    {
        return response()->json(['collectionPoint' => $collectionPoint], Response::HTTP_OK);
    }

    public function update(Request $request, CollectionPoint $collectionPoint)
    {
        $collectionPoint->name = $request->name;
        $collectionPoint->cep = $request->cep;
        $collectionPoint->logradouro = $request->logradouro;
        $collectionPoint->numero = $request->numero;
        $collectionPoint->complemento = $request->complemento;
        $collectionPoint->bairro = $request->bairro;
        $collectionPoint->localidade = $request->localidade;
        $collectionPoint->uf = $request->uf;
        $collectionPoint->save();

        return response()->json(['collectionPoint' => $collectionPoint], Response::HTTP_OK);
    }

    public function findByAttribute(Request $request) {
        $attribute = $request->attribute;
        $valueAttribute = $request->value;
        $collectionPoints = CollectionPoint::where($attribute, '=', $valueAttribute)->get();
        return response()->json(['collectionPoints' => $collectionPoints], Response::HTTP_OK);
    }

    public function findByOwnerId($id) {
        $collectionPoints = CollectionPoint::where('owner_id', '=', $id)->get();
        return response()->json(['collectionPoints' => $collectionPoints], Response::HTTP_OK);
    }
}
