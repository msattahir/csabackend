<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    // Helpdesk custom routes
    Route::patch('assign/tickets/{ticket}', 'TicketController@assign');

    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::get('refresh', 'AuthController@refresh');

    Route::apiResource('companies', 'CompanyController');
    Route::apiResource('locations', 'LocationController');
    Route::apiResource('availabilities', 'AvailabilityController');
    Route::apiResource('staffTypes', 'StaffTypeController');
    Route::apiResource('gradeLevels', 'GradeLevelController');
    Route::apiResource('departmentTypes', 'DepartmentTypeController');
    Route::apiResource('departments', 'DepartmentController');
    Route::apiResource('users', 'StaffController');
    Route::apiResource('groups', 'GroupController');
    Route::apiResource('applications', 'ApplicationController');
    Route::apiResource('modules', 'ModuleController');
    Route::apiResource('permissions', 'PermissionController');
    Route::apiResource('floors', 'FloorController');

    // Inventory Routes
    Route::apiResource('inventoryCategories', 'InventoryCategoryController');
    Route::apiResource('stockCategories', 'StockCategoryController');
    Route::apiResource('stockTypes', 'StockTypeController');
    Route::apiResource('tags', 'TagController');
    Route::apiResource('stocks', 'StockController');
    Route::apiResource('items', 'ItemController');
    Route::apiResource('itemFeatures', 'ItemFeatureController');
    Route::apiResource('brands', 'BrandController');

    // Store Management Routes
    Route::apiResource('requisitions', 'RequisitionController');
    Route::apiResource('requisitionItems', 'RequisitionItemController');
    Route::apiResource('quotas', 'QuotaController');
    Route::apiResource('quotaItems', 'QuotaItemController');
    Route::apiResource('quotaDistributions', 'QuotaDistributionController');


    // Fleet Management Routes
    Route::apiResource('vehicleRequests', 'VehicleRequestController');
    Route::apiResource('itineraries', 'ItineraryController');
    Route::apiResource('repairCategories', 'RepairCategoryController');
    Route::apiResource('repairs', 'RepairController');
    Route::apiResource('vehicleRepairs', 'VehicleRepairController');

    // Logistics Request Routes
    Route::apiResource('logisticsRequests', 'LogisticsRequestController');
    Route::apiResource('reservations', 'ReservationController');


    // Helpdesk Routes
    Route::apiResource('incidentCategories', 'IncidentCategoryController');
    Route::apiResource('issues', 'IssueController');
    Route::apiResource('tickets', 'TicketController');

    // Facility Management Routes
    Route::apiResource('furnitureRequests', 'FurnitureRequestController');
    Route::apiResource('furnitureRequestItems', 'FurnitureRequestItemController');

    // Meeting Room Request Routes
    Route::apiResource('hallCategories', 'HallCategoryController');
    Route::apiResource('wings', 'WingController');
    Route::apiResource('rooms', 'RoomController');
    Route::apiResource('seatings', 'SeatingController');
    Route::apiResource('bookings', 'BookingController');
    Route::apiResource('bookingDetails', 'BookingDetailController');
});
