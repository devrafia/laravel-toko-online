<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stores.index', ['stores' => Store::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.form', [
            'store' => new Store(),
            'title' => 'Create a store',
            'header' => 'Create a new Store',
            'card_description' => 'You can create up to 5 stores',
            'form_action' => route('stores.store'),
            'method' => 'POST',
            'submit_text' => 'Create',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)


    {
        $file = $request->file('logo');

        $request->user()->stores()->create([
            ...$request->validated(),
            'logo' => $file->store('images/stores')
        ]);

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Store $store)
    {

        Gate::authorize('update', $store);
        // abort_if($request->user()->isNot($store->user), 401);
        return view('stores.form', [
            'store' => $store,
            'title' => 'Edit Store',
            'header' => 'Edit',
            'card_description' => 'Edit Store: ' . $store->name,
            'form_action' => route('stores.update', $store),
            'method' => 'PUT',
            'submit_text' => 'Update',

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {

        $file = $request->file('logo');

        $store->update([

            'logo' => $file ? $file->store('images/stores') : $store->logo,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return to_route('stores.index');
    }
}
