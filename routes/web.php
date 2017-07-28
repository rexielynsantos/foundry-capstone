<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Route::get('/', function () {
//     return view('Foundry.login');
// });
Route::group(
  ['middleware' => ['auth'] ],
  function(){

    Route::get('/', function () {
        return view('Dashboard.dashboard');
    });
Route::get('/maintenance/product','Admin\ProductController@viewProduct');
Route::get('/maintenance/product-reactivate','Admin\ProductController@reactivateProduct');
Route::get('/maintenance/variant-all','Admin\ProductController@getAllVariant');
Route::post('/maintenance/product-add','Admin\ProductController@addProduct');
Route::post('/maintenance/product-edit','Admin\ProductController@editProduct');
Route::post('/maintenance/product-update','Admin\ProductController@updateProduct');
Route::post('/maintenance/product-delete','Admin\ProductController@deleteProduct');
Route::post('/maintenance/product-activate','Admin\ProductController@activateProduct');

Route::get('/maintenance/productVariant','Admin\ProductVariantController@viewProductVariant');
Route::get('/maintenance/productVariant-reactivate','Admin\ProductVariantController@reactivateProductVariant');
Route::get('/maintenance/type-all','Admin\ProductVariantController@getAllType');
Route::post('/maintenance/productVariant-add','Admin\ProductVariantController@addProductVariant');
Route::post('/maintenance/productVariant-edit','Admin\ProductVariantController@editProductVariant');
Route::post('/maintenance/productVariant-update','Admin\ProductVariantController@updateProductVariant');
Route::post('/maintenance/productVariant-delete','Admin\ProductVariantController@deleteProductVariant');
Route::post('/maintenance/productVariant-activate','Admin\ProductVariantController@activateProductVariant');

Route::get('/maintenance/productType','Admin\ProductTypeController@viewProductType');
Route::get('/maintenance/productType-reactivate','Admin\ProductTypeController@reactivateProductType');
Route::get('/maintenance/productType-all','Admin\ProductTypeController@getAllStage');
Route::post('/maintenance/productType-add','Admin\ProductTypeController@addProductType');
Route::post('/maintenance/productType-edit','Admin\ProductTypeController@editProductType');
Route::post('/maintenance/productType-update','Admin\ProductTypeController@updateProductType');
Route::post('/maintenance/productType-delete','Admin\ProductTypeController@deleteProductType');
Route::post('/maintenance/productType-activate','Admin\ProductTypeController@activateProductType');
Route::post('/maintenance/productType-active','Admin\ProductTypeController@activeProductType');
Route::post('/maintenance/productType-status','Admin\ProductTypeController@statusProductType');

Route::get('/maintenance/uom','Admin\UOMController@viewUOM');
Route::get('/maintenance/uom-reactivate','Admin\UOMController@reactivateUOM');
Route::post('/maintenance/uom-add','Admin\UOMController@addUOM');
Route::post('/maintenance/uom-edit', 'Admin\UOMController@editUOM');
Route::post('/maintenance/uom-update', 'Admin\UOMController@updateUOM');
Route::post('/maintenance/uom-delete','Admin\UOMController@deleteUOM');
Route::post('/maintenance/uom-activate','Admin\UOMController@activateUOM');
Route::post('/maintenance/uom-active','Admin\UOMController@activeUOM');
Route::post('/maintenance/uom-status','Admin\UOMController@statusUOM');

Route::get('/maintenance/uomType','Admin\UOMTypeController@viewUOMType');
Route::get('/maintenance/uomType-reactivate','Admin\UOMTypeController@reactivateUOMType');
Route::post('/maintenance/uomType-add','Admin\UOMTypeController@addUOMType');
Route::post('/maintenance/uomType-edit', 'Admin\UOMTypeController@editUOMType');
Route::post('/maintenance/uomType-update', 'Admin\UOMTypeController@updateUOMType');
Route::post('/maintenance/uomType-delete','Admin\UOMTypeController@deleteUOMType');
Route::post('/maintenance/uomType-activate','Admin\UOMTypeController@activateUOMType');
Route::post('/maintenance/uomType-active','Admin\UOMTypeController@activeUOMType');
Route::post('/maintenance/uomType-status','Admin\UOMTypeController@statusUOMType');

Route::get('/maintenance/jobTitle','Admin\JobTitleController@viewJobTitle');
Route::get('/maintenance/jobTitle-reactivate','Admin\JobTitleController@reactivateJobTitle');
Route::post('/maintenance/jobTitle-add','Admin\JobTitleController@addJobTitle');
Route::post('/maintenance/jobTitle-edit','Admin\JobTitleController@editJobTitle');
Route::post('/maintenance/jobTitle-update','Admin\JobTitleController@updateJobTitle');
Route::post('/maintenance/jobTitle-delete','Admin\JobTitleController@deleteJobTitle');
Route::post('/maintenance/jobTitle-activate','Admin\JobTitleController@activateJobTitle');
Route::post('/maintenance/jobTitle-active','Admin\JobTitleController@activeJobTitle');
Route::post('/maintenance/jobTitle-status','Admin\JobTitleController@statusJobTitle');

Route::get('/maintenance/department','Admin\DepartmentController@viewDepartment');
Route::get('/maintenance/department-reactivate','Admin\DepartmentController@reactivateDepartment');
Route::post('/maintenance/department-add','Admin\DepartmentController@addDepartment');
Route::post('/maintenance/department-edit','Admin\DepartmentController@editDepartment');
Route::post('/maintenance/department-update','Admin\DepartmentController@updateDepartment');
Route::post('/maintenance/department-delete','Admin\DepartmentController@deleteDepartment');
Route::post('/maintenance/department-activate','Admin\DepartmentController@activateDepartment');
Route::post('/maintenance/department-active','Admin\DepartmentController@activeDepartment');
Route::post('/maintenance/department-status','Admin\DepartmentController@statusDepartment');

Route::get('/maintenance/employee','Admin\EmployeeController@viewEmployee');
Route::post('/maintenance/employee-add','Admin\EmployeeController@addEmployee');
Route::post('/maintenance/employee-edit','Admin\EmployeeController@editEmployee');
Route::post('/maintenance/employee-update','Admin\EmployeeController@updateEmployee');
Route::post('/maintenance/employee-delete','Admin\EmployeeController@deleteEmployee');
Route::get('/maintenance/employee-reactivate', 'Admin\EmployeeController@reactivateEmployee');
Route::post('/maintenance/employee-activate', 'Admin\EmployeeController@activateEmployee');
Route::post('/maintenance/employee-active','Admin\EmployeeController@activeEmployee');
Route::post('/maintenance/employee-status','Admin\EmployeeController@statusEmployee');

Route::get('/maintenance/paymentTerms','Admin\PaymentTermController@viewPaymentTerms');
Route::get('/maintenance/paymentTerm-reactivate','Admin\PaymentTermController@reactivatePaymentTerms');
Route::post('/maintenance/paymentTerms-add','Admin\PaymentTermController@addPaymentTerms');
Route::post('/maintenance/paymentTerms-edit','Admin\PaymentTermController@editPaymentTerms');
Route::post('/maintenance/paymentTerms-update','Admin\PaymentTermController@updatePaymentTerms');
Route::post('/maintenance/paymentTerms-delete','Admin\PaymentTermController@deletePaymentTerms');
Route::post('/maintenance/paymentTerms-activate','Admin\PaymentTermController@activatePaymentTerms');

Route::get('/maintenance/stage','Admin\StageController@viewStage');
Route::get('/maintenance/stage-reactivate','Admin\StageController@reactivateStage');
Route::get('/maintenance/substage-all','Admin\StageController@getAllSubstage');
Route::post('/maintenance/stage-add','Admin\StageController@addStage');
Route::post('/maintenance/stage-edit','Admin\StageController@editStage');
Route::post('/maintenance/stage-update','Admin\StageController@updateStage');
Route::post('/maintenance/stage-delete','Admin\StageController@deleteStage');
Route::post('/maintenance/stage-activate','Admin\StageController@activateStage');
Route::post('/maintenance/stage-active','Admin\StageController@activeStage');
Route::post('/maintenance/stage-status','Admin\StageController@statusStage');

Route::get('/maintenance/substage','Admin\SubStageController@viewSubStage');
Route::get('/maintenance/substage-reactivate','Admin\SubStageController@reactivateSubStage');
Route::post('/maintenance/substage-add','Admin\SubStageController@addSubStage');
Route::post('/maintenance/substage-edit','Admin\SubStageController@editSubStage');
Route::post('/maintenance/substage-update','Admin\SubStageController@updateSubStage');
Route::post('/maintenance/substage-delete','Admin\SubStageController@deleteSubStage');
Route::post('/maintenance/substage-activate','Admin\SubStageController@activateSubstage');
Route::post('/maintenance/substage-active','Admin\SubstageController@activeSubstage');
Route::post('/maintenance/substage-status','Admin\SubstageController@statusSubstage');

Route::get('/maintenance/module','Admin\ModuleController@viewModule');
Route::get('/maintenance/module-reactivate','Admin\ModuleController@reactivateModule');
Route::post('/maintenance/module-add','Admin\ModuleController@addModule');
Route::post('/maintenance/module-edit','Admin\ModuleController@editModule');
Route::post('/maintenance/module-update','Admin\ModuleController@updateModule');
Route::post('/maintenance/module-delete','Admin\ModuleController@deleteModule');
Route::post('/maintenance/module-activate','Admin\ModuleController@activateModule');
Route::post('/maintenance/module-active','Admin\ModuleController@activeModule');
Route::post('/maintenance/module-status','Admin\ModuleController@statusModule');

Route::get('/maintenance/userRole','Admin\UserRoleController@viewUserRole');
Route::get('/maintenance/role-reactivate', 'Admin\UserRoleController@reactivateUserRole');
Route::post('/maintenance/userRole-add','Admin\UserRoleController@addUserRole');
Route::post('/maintenance/userRole-edit','Admin\UserRoleController@editUserRole');
Route::post('/maintenance/userRole-update','Admin\UserRoleController@updateUserRole');
Route::post('/maintenance/userRole-delete','Admin\UserRoleController@deleteUserRole');
Route::post('/maintenance/userRole-activate','Admin\UserRoleController@activateUserRole');
Route::post('/maintenance/userRole-active','Admin\UserRoleController@activeUserRole');
Route::post('/maintenance/userRole-status','Admin\UserRoleController@statusUserRole');

Route::get('/maintenance/supplier','Admin\SupplierController@viewSupplier');
Route::get('/maintenance/supplier-reactivate', 'Admin\SupplierController@reactivateSupplier');
Route::post('/maintenance/supplier-add','Admin\SupplierController@addSupplier');
Route::post('/maintenance/supplier-edit','Admin\SupplierController@editSupplier');
Route::post('/maintenance/supplier-update','Admin\SupplierController@updateSupplier');
Route::post('/maintenance/supplier-delete','Admin\SupplierController@deleteSupplier');
Route::post('/maintenance/supplier-activate','Admin\UserRoleController@activateUserRole');
Route::post('/maintenance/supplier-active','Admin\SupplierController@activeSupplier');
Route::post('/maintenance/supplier-status','Admin\SupplierController@statusSupplier');

Route::get('/maintenance/material','Admin\MaterialController@viewMaterial');
Route::get('/maintenance/material-reactivate','Admin\MaterialController@reactivateMaterial');
Route::get('/maintenance/supplier-all','Admin\MaterialController@getAllSupplier');
// Route::post('/maintenance/materialCart','Admin\MaterialController@addMat');
Route::post('/maintenance/material-add','Admin\MaterialController@addMaterial');
Route::post('/maintenance/material-edit','Admin\MaterialController@editMaterial');
Route::post('/maintenance/material-update','Admin\MaterialController@updateMaterial');
Route::post('/maintenance/material-delete','Admin\MaterialController@deleteMaterial');
Route::post('/maintenance/material-activate','Admin\MaterialController@activateMaterial');
Route::post('/maintenance/material-active','Admin\MaterialController@activeMaterial');
Route::post('/maintenance/material-status','Admin\MaterialController@statusMaterial');

Route::get('/maintenance/dataReactivation', function () {
    return view('Reactivation.dataReactivation');
});



Route::get('/transaction/estimate','Admin\EstimateController@viewEstimate');
Route::get('/transaction/estimate-add','Admin\EstimateController@viewAddEstimate');
Route::post('/transaction/cart','Admin\EstimateController@addCart');

Route::post('/transaction/estimate-add','Admin\EstimateController@addEstimate');
Route::post('/transaction/estimate-get','Admin\EstimateController@getEstimate');
Route::post('/transaction/estimate-approve','Admin\EstimateController@approveEstimate');

Route::get('/transaction/joborder','Admin\JobOrderController@viewJobOrder');
Route::get('/transaction/jobOrder-add','Admin\JobOrderController@viewAddJobOrder');

Route::get('/transaction/jobOrder-monitoring','Admin\MaterialSpecController@viewMatSpec');
Route::post('/Specification/ProductType','Admin\MaterialSpecController@showProductType');
Route::get('/transaction/material-all','Admin\JobOrderController@getAllMaterial');

Route::get('/transaction/jobtickets','Admin\JobTicketController@viewJobTicket');
Route::get('/transaction/substage-get','Admin\JobTicketController@getSubStage');
Route::post('/transaction/jobtickets-add','Admin\JobTicketController@addJobTicket');
Route::post('/transaction/jobtickets-stage','Admin\JobTicketController@getStage');
Route::post('/transaction/jobtickets-products','Admin\JobTicketController@getProduct');

Route::get('/transaction/purchaseOrder','Admin\PurchaseController@viewPurchase');
Route::get('/transaction/material-all','Admin\PurchaseController@getAllMaterial');


Route::get('/transaction/purchase-add','Admin\PurchaseAddController@viewaddPurchase');
Route::post('/transaction/Supplier','Admin\PurchaseAddController@showSupplierDetails');
Route::post('/transaction/GetDetails','Admin\PurchaseAddController@GetDetails');
Route::post('/transaction/purchaseCart','Admin\PurchaseAddController@addCart');
Route::post('/transaction/purchaseorder-add','Admin\PurchaseAddController@addPurchaseOrder');

Route::get('/transaction/receive','Admin\ReceiveMaterialsController@viewReceivePurchase');

Route::get('/transaction/receive-add','Admin\ReceiveAddMaterialsController@viewReceiveAddPurchase');
Route::get('/transaction/material-all','Admin\ReceiveAddMaterialsControlelr@getAllMaterial');
Route::post('/transaction/receiveCart','Admin\ReceiveAddMaterialsController@addCart');

Route::get('/transaction/inspectPurchase', function () {
    return view('Transaction.inspectPurchase');
});

Route::get('/transaction/stocks', function () {
    return view('Transaction.stockcard');
});

Route::get('/transaction/estimate-final', function () {
    return view('Transaction.estimate-final');
});

Route::get('/transaction/purchase-final', function () {
    return view('Transaction.purchase-final');
});

Route::get('/transaction/inspection', function () {
    return view('Transaction.inspection');
});
Route::get('/transaction/production-monitoring', function () {
    return view('Transaction.production-monitoring');
});
Route::get('/transaction/estimate-addDetail', function () {
    return view('Transaction.estimate-addDetail');
});

Route::get('/transaction/workflowManagement', function () {
    return view('Transaction.workflowManagement');
});

Route::get('/transaction/workflowManagement', function () {
    return view('Transaction.workflowManagement');
});



Route::get('/maintenance/workflow','Admin\WorkflowController@viewWorkflow');
Route::post('/maintenance/workflow-modules','Admin\WorkflowController@changeModule');
Route::post('/maintenance/workflow-update','Admin\WorkflowController@update');

});//END OF AUTH

//Route::get('/maintenance/assignEmployeeRole','Admin\AssignEmployeeRoleController@viewAssignEmployeeRole');


// Route::get('{slug}', function() {
//     return view('Dashboard.dashboard');
// })
// ->where('slug', '(?!api)([A-z\d-\/_.]+)?');

// Auth::routes();

Route::get('login','UserAuth\LoginController@showLoginForm');
Route::post('login','UserAuth\LoginController@login');
Route::post('logout','UserAuth\LoginController@logout');

Route::get('register','UserAuth\RegisterController@showRegistrationForm');
Route::post('register','UserAuth\RegisterController@register');


Route::post('password/email','UserAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset','UserAuth\ForgotPasswordController@showLinkRequestForm');

Route::post('password/reset','UserAuth\ResetPasswordController@reset');
Route::get('password/reset/{token}','UserAuth\ResetPasswordController@showResetForm');

Route::get('/home', 'HomeController@index');
