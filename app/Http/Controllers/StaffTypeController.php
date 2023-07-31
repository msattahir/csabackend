<?php

namespace App\Http\Controllers;

use App\Models\StaffType;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StaffTypeController extends Controller
{
    use HttpResponses;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->success(StaffType::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Please fix the following errors!!', 500);
        }

        $staffType = StaffType::create([
            'name' => $request->name,
            'label' => Str::slug($request->name)
        ]);

        return $this->success($staffType, 'Staff Type created successfully!!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffType $staffType): \Illuminate\Http\JsonResponse
    {
        return $this->success($staffType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffType $staffType): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Please fix the following errors!!', 500);
        }

        $staffType->update([
            'name' => $request->name,
            'label' => Str::slug($request->name)
        ]);

        return $this->success($staffType, 'Staff Type created successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffType $staffType): \Illuminate\Http\JsonResponse
    {
        $staffType->delete();
        return $this->success(null, 'Staff Type deleted successfully!!');
    }
}
