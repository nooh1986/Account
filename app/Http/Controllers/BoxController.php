<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BoxRequest;
use App\Interfaces\BoxRepositoryInterface;

class BoxController extends Controller
{
    
    private $Box;

    public function __construct(BoxRepositoryInterface $Box)
    {
        $this->Box = $Box;
    }

    public function index()
    {
        return $this->Box->index();
    }

   
    public function create()
    {
        return $this->Box->create();
    }

   
    public function store(BoxRequest $request)
    {
        return $this->Box->store($request);
    }

    
    public function edit($id)
    {
        return $this->Box->edit($id);
    }

    public function update(BoxRequest $request)
    {
        return $this->Box->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->Box->destroy($request);
    }
}
