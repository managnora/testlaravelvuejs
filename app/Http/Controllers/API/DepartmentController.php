<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Core\UseCase\Department\StoreDepartment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StoreDepartment $storeDepartment)
    {
        try {
            $output = $storeDepartment->execute($request->name, $request->description);

            return $this->sendResponse(['department' => $output]);
        } catch (\Exception $exception) {
            return $this->sendError('Internal_server_error.', ['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
