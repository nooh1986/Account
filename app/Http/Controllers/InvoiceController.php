<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\InvoiceRepositoryInterface;

class InvoiceController extends Controller
{
    
    private $Invoice;

    public function __construct(InvoiceRepositoryInterface $Invoice)
    {
        $this->Invoice = $Invoice;
    }
    
    
    public function index()
    {
        return $this->Invoice->index();
    }

    
    public function create()
    {
        return $this->Invoice->create();
    }

    
    public function store(Request $request)
    {
        return $this->Invoice->store($request);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Request $request)
    {
        return $this->Invoice->destroy($request);
    }
}
