<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomersController extends Controller
{
    /**
     * Instantiate a new CustomerController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-customer|edit-customer|delete-customer', ['only' => ['index','show']]);
        $this->middleware('permission:create-customer', ['only' => ['create','store']]);
        $this->middleware('permission:edit-customer', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-customer', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customers.index', [
            'customers' => Customers::latest('id')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['syrinx'] = strtoupper($request->syrinx);
        $input['name'] = ucwords($request->name);
        $customer = Customers::create($input);
        return redirect()->route('customers.show', $customer->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customer): View
    {
        return view('customers.show', [
            'customer'  => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customer): View
    {
        return view('customers.edit', [
            'customer'  => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, Customers $customer): RedirectResponse
    {
        $input = $request->all();
        $input['syrinx'] = strtoupper($request->syrinx);
        $input['name'] = ucwords($request->name);
        $customer->update($input);
        return redirect()->route('customers.show', $customer->id)
            ->withSuccess('Customer has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')
            ->withSuccess('Customer has been successfully deleted');
    }
}
