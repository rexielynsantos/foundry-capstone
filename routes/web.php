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

    // Route::get('/', function () {
    //     return view('Dashboard.dashboard');
    // });

Route::get('/','Admin\DashboardController@viewDashboard');

Route::get('/maintenance/product','Admin\ProductController@viewProduct');
Route::get('/maintenance/product-reactivate','Admin\ProductController@reactivateProduct');
Route::get('/maintenance/variant-all','Admin\ProductController@getAllVariant');
Route::get('/maintenance/product-max','Admin\ProductController@getProductMax');
Route::post('/maintenance/product-add','Admin\ProductController@addProduct');
Route::post('/maintenance/product-edit','Admin\ProductController@editProduct');
Route::post('/maintenance/product-update','Admin\ProductController@updateProduct');
Route::post('/maintenance/product-delete','Admin\ProductController@deleteProduct');
Route::post('/maintenance/product-activate','Admin\ProductController@activateProduct');
Route::post('/maintenance/product-active','Admin\ProductController@activeProduct');
Route::post('/maintenance/product-status','Admin\ProductController@statusProduct');

Route::get('/maintenance/productVariant','Admin\ProductVariantController@viewProductVariant');
Route::get('/maintenance/productVariant-reactivate','Admin\ProductVariantController@reactivateProductVariant');
Route::get('/maintenance/type-all','Admin\ProductVariantController@getAllType');
Route::get('/maintenance/productVariant-max','Admin\ProductVariantController@getProductVariantMax');
Route::post('/maintenance/productVariant-add','Admin\ProductVariantController@addProductVariant');
Route::post('/maintenance/productVariant-edit','Admin\ProductVariantController@editProductVariant');
Route::post('/maintenance/productVariant-update','Admin\ProductVariantController@updateProductVariant');
Route::post('/maintenance/productVariant-delete','Admin\ProductVariantController@deleteProductVariant');
Route::post('/maintenance/productVariant-activate','Admin\ProductVariantController@activateProductVariant');

Route::get('/maintenance/materialVariants','Admin\MaterialVariantController@viewMaterialVariant');
Route::get('/maintenance/materialVariants-max','Admin\MaterialVariantController@getMaterialVariantMax');
// Route::get('/maintenance/materialVariant-reactivate','Admin\MaterialVariantController@reactivateMaterialVariant');
Route::post('/maintenance/materialVariant-add','Admin\MaterialVariantController@addMaterialVariant');
Route::post('/maintenance/materialVariant-edit','Admin\MaterialVariantController@editMaterialVariant');
Route::post('/maintenance/materialVariant-update','Admin\MaterialVariantController@updateMaterialVariant');
Route::post('/maintenance/materialVariant-delete','Admin\MaterialVariantController@deleteMaterialVariant');
Route::post('/maintenance/materialVariant-active','Admin\MaterialVariantController@activeMaterialVariant');
Route::post('/maintenance/materialVariant-status','Admin\MaterialVariantController@statusMaterialVariant');
// Route::post('/maintenance/productVariant-activate','Admin\MaterialVariantController@activateMaterialVariant');


Route::get('/maintenance/productType','Admin\ProductTypeController@viewProductType');
Route::get('/maintenance/productType-reactivate','Admin\ProductTypeController@reactivateProductType');
Route::get('/maintenance/productType-all','Admin\ProductTypeController@getAllStage');
Route::get('/maintenance/productType-max','Admin\ProductTypeController@getProductTypeMax');
Route::post('/maintenance/productType-add','Admin\ProductTypeController@addProductType');
Route::post('/maintenance/productType-edit','Admin\ProductTypeController@editProductType');
Route::post('/maintenance/productType-update','Admin\ProductTypeController@updateProductType');
Route::post('/maintenance/productType-delete','Admin\ProductTypeController@deleteProductType');
Route::post('/maintenance/productType-activate','Admin\ProductTypeController@activateProductType');
Route::post('/maintenance/productType-active','Admin\ProductTypeController@activeProductType');
Route::post('/maintenance/productType-status','Admin\ProductTypeController@statusProductType');

Route::get('/maintenance/uom','Admin\UOMController@viewUOM');
Route::get('/maintenance/uom-max','Admin\UOMController@getMax');
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
Route::get('/maintenance/jobTitle-max','Admin\JobTitleController@getJobTitleMax');
Route::post('/maintenance/jobTitle-add','Admin\JobTitleController@addJobTitle');
Route::post('/maintenance/jobTitle-edit','Admin\JobTitleController@editJobTitle');
Route::post('/maintenance/jobTitle-update','Admin\JobTitleController@updateJobTitle');
Route::post('/maintenance/jobTitle-delete','Admin\JobTitleController@deleteJobTitle');
Route::post('/maintenance/jobTitle-activate','Admin\JobTitleController@activateJobTitle');
Route::post('/maintenance/jobTitle-active','Admin\JobTitleController@activeJobTitle');
Route::post('/maintenance/jobTitle-status','Admin\JobTitleController@statusJobTitle');

Route::get('/maintenance/department','Admin\DepartmentController@viewDepartment');
Route::get('/maintenance/department-reactivate','Admin\DepartmentController@reactivateDepartment');
Route::get('/maintenance/department-max','Admin\DepartmentController@getDepartmentMax');
Route::post('/maintenance/department-add','Admin\DepartmentController@addDepartment');
Route::post('/maintenance/department-edit','Admin\DepartmentController@editDepartment');
Route::post('/maintenance/department-update','Admin\DepartmentController@updateDepartment');
Route::post('/maintenance/department-delete','Admin\DepartmentController@deleteDepartment');
Route::post('/maintenance/department-activate','Admin\DepartmentController@activateDepartment');
Route::post('/maintenance/department-active','Admin\DepartmentController@activeDepartment');
Route::post('/maintenance/department-status','Admin\DepartmentController@statusDepartment');

Route::get('/maintenance/employee','Admin\EmployeeController@viewEmployee');
Route::get('/maintenance/employee-max','Admin\EmployeeController@getEmployeeMax');
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
Route::get('/maintenance/stage-max','Admin\StageController@getStageMax');
Route::post('/maintenance/stage-add','Admin\StageController@addStage');
Route::post('/maintenance/stage-edit','Admin\StageController@editStage');
Route::post('/maintenance/stage-update','Admin\StageController@updateStage');
Route::post('/maintenance/stage-delete','Admin\StageController@deleteStage');
Route::post('/maintenance/stage-activate','Admin\StageController@activateStage');
Route::post('/maintenance/stage-active','Admin\StageController@activeStage');
Route::post('/maintenance/stage-status','Admin\StageController@statusStage');

Route::get('/maintenance/substage','Admin\SubStageController@viewSubStage');
Route::get('/maintenance/substage-reactivate','Admin\SubStageController@reactivateSubStage');
Route::get('/maintenance/substage-max','Admin\SubStageController@getSubStageMax');
Route::post('/maintenance/substage-add','Admin\SubStageController@addSubStage');
Route::post('/maintenance/substage-edit','Admin\SubStageController@editSubStage');
Route::post('/maintenance/substage-update','Admin\SubStageController@updateSubStage');
Route::post('/maintenance/substage-delete','Admin\SubStageController@deleteSubStage');
Route::post('/maintenance/substage-activate','Admin\SubStageController@activateSubstage');
Route::post('/maintenance/substage-active','Admin\SubstageController@activeSubstage');
Route::post('/maintenance/substage-status','Admin\SubstageController@statusSubstage');

Route::get('/maintenance/module','Admin\ModuleController@viewModule');
Route::get('/maintenance/module-max','Admin\ModuleController@getModuleMax');
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
Route::get('/maintenance/supplier-max','Admin\SupplierController@getSupplierMax');
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
Route::get('/maintenance/material-max','Admin\MaterialController@getMaterialMax');
Route::post('/transaction/material-dependVariant','Admin\MaterialController@getSelectedVariant');
Route::post('/transaction/materialCart','Admin\MaterialController@addCart');
Route::post('/maintenance/material-add','Admin\MaterialController@addMaterial');
Route::post('/maintenance/material-edit','Admin\MaterialController@editMaterial');
Route::post('/maintenance/material-update','Admin\MaterialController@updateMaterial');
Route::post('/maintenance/material-delete','Admin\MaterialController@deleteMaterial');
Route::post('/maintenance/material-activate','Admin\MaterialController@activateMaterial');
Route::post('/maintenance/material-active','Admin\MaterialController@activeMaterial');
Route::post('/maintenance/material-status','Admin\MaterialController@statusMaterial');
Route::get('/maintenance/variant-alls','Admin\MaterialController@getAllVariant');
Route::get('/maintenance/uom-alls','Admin\MaterialController@getAllUOM');

Route::get('/transaction/customers','Admin\CustomerController@customerView');
Route::post('/transaction/customers-add','Admin\CustomerController@addCustomer');
Route::post('/transaction/customers-max','Admin\CustomerController@getCustomerMax');
Route::get('/maintenance/customer-get','Admin\CustomerController@viewCustomer');
Route::get('/transaction/customer-list','Admin\CustomerController@viewCustomerr');
Route::get('/maintenance/customer-product-get','Admin\CustomerController@viewCustomerProduct');
Route::post('/maintenance/customer-variance-get','Admin\CustomerController@viewCustomerVariance');
Route::get('/maintenance/costing-uom-get','Admin\CustomerController@uomInfo');
Route::get('/transaction/product-costing-list','Admin\CustomerController@viewCosting');
Route::post('/transaction/product-costing-list-pdf','Admin\CustomerController@pdfCosting');
Route::get('/transaction/estimate-add','Admin\CustomerController@viewCustomerrr');
Route::post('/transaction/costing-submit','Admin\CustomerController@addCosting');
Route::post('/transaction/costing-approve','Admin\CustomerController@approveCosting');
Route::post('/transaction/costing-disapprove','Admin\CustomerController@disapproveCosting');
Route::post('/transaction/customers-viewProfile','Admin\CustomerController@viewProfile');
Route::post('/transaction/customer-orderHistory','Admin\CustomerController@orderHistory');
Route::post('/transaction/customer-currentJob','Admin\CustomerController@currentJob');

Route::post('/transaction/customers-contactPersons','Admin\CustomerController@viewCustomerContacts');
Route::post('/transaction/customers-edit','Admin\CustomerController@editCustomer');
Route::post('/transaction/customers-update','Admin\CustomerController@updateCustomer');
Route::post('/transaction/variance-info','Admin\CustomerController@varianceInfo');
Route::post('/transaction/quotation-new','Admin\CustomerController@newQuote');
Route::post('/transaction/quotation-add','Admin\CustomerController@addQuote');
Route::post('/transaction/customerPurchase-add','Admin\PurchaseController@addPurchase');
Route::post('/transaction/purchase-customerName-get','Admin\PurchaseController@customerName');
Route::get('/transaction/customerPurchases','Admin\PurchaseController@viewCustomerPurchases');
Route::get('/transaction/customerPurchases-view','Admin\PurchaseController@customerPurchases');
Route::post('/transaction/selectedQuote','Admin\PurchaseController@selectedQuote');
Route::post('/transaction/costing-view-summary','Admin\CustomerController@viewSummary');
Route::post('/transaction/view-summaryOfCost','Admin\CustomerController@viewCostingSummary');
Route::post('/transaction/view-summaryMaterials','Admin\CustomerController@viewMaterialCosting');

Route::get('/transaction/joborder-new','Admin\NewJobOrderController@newJobOrder');
Route::get('/transaction/joborders','Admin\NewJobOrderController@viewJobOrder');
Route::post('/transaction/joborders-pdf','Admin\NewJobOrderController@pdfJobOrder');
Route::get('/transaction/joborders-get','Admin\NewJobOrderController@jobOrders');
Route::get('/transaction/joborder-max','Admin\NewJobOrderController@getJobOrderMax');
Route::post('/transaction/joborder-refpo','Admin\NewJobOrderController@getRefPO');
Route::post('/transaction/joborder-add','Admin\NewJobOrderController@addJobOrder');

Route::get('/maintenance/dataReactivation', function () {
    return view('Reactivation.dataReactivation');
});

Route::get('/transaction/customer-profile', function () {
    return view('Transaction.customer-profile');
});

Route::get('transaction/customers-editView', function () {
    return view('Transaction.customer');
});

Route::get('/transaction/order-costing', function () {
    return view('Transaction.order-costing');
});

Route::get('/transaction/order-costing-max','Admin\CustomerController@getCostingMax');
Route::get('/transaction/estimate-add-max','Admin\CustomerController@getQuotationMax');
Route::get('/transaction/customerPurchase-new-max','Admin\PurchaseController@getCustPurchaseMax');
// Route::get('/transaction/order-costing','Admin\CustomerController@newCosting');

Route::get('/transaction/order-costing-summary', function () {
    return view('Transaction.order-costing-summary');
});

Route::get('/transaction/customerPurchase-new', function () {
    return view('Transaction.customer-purchase');
});

Route::get('/transaction/returnItems', function () {
    return view('Transaction.return-items');
});

Route::get('/transaction/returnitems-new', function () {
    return view('Transaction.returnItems-new');
});


Route::get('/queries/queries', function () {
    return view('Queries.query');
});

Route::get('/transaction/query-table1-info','Admin\QueryController@viewTable1Info');
Route::get('/transaction/query-table2-info','Admin\QueryController@viewTable2Info');
Route::get('/transaction/query-table4-info','Admin\QueryController@viewTable4Info');


Route::get('/reports','Admin\ReportsController@viewReport');
Route::get('/transaction/reports-table1-info','Admin\ReportsController@viewTable1Info');
Route::get('/transaction/reports-table2-info','Admin\ReportsController@viewTable2Info');

Route::get('/utilities/terms-condition','Admin\TermsConditionController@viewTerms');
Route::get('/utilities/terms-condition-max','Admin\TermsConditionController@getTermsMax');
Route::post('/utilities/terms-condition-add','Admin\TermsConditionController@addTerms');
Route::post('/utilities/terms-condition-edit','Admin\TermsConditionController@editTerms');
Route::post('/utilities/terms-condition-update','Admin\TermsConditionController@updateTerms');
Route::post('/utilities/terms-condition-delete','Admin\TermsConditionController@deleteTerms');

Route::get('/transaction/estimate','Admin\EstimateController@viewQuote');
Route::get('/transaction/estimate-table','Admin\EstimateController@viewEstimate');
Route::get('/transaction/estimate-add-quote','Admin\EstimateController@viewAddEstimate');
Route::post('/transaction/quoteRequest-view','Admin\EstimateController@editQuote');
Route::post('/transaction/cart','Admin\EstimateController@addCart');
Route::post('/transaction/estimate-variance-add','Admin\EstimateController@varianceInfo');
Route::post('/transaction/estimate-pdf','Admin\EstimateController@pdfEstimate');
Route::post('/transaction/quoteSubmit','Admin\EstimateController@tofinal');
Route::post('/transaction/estimate-final-read','Admin\EstimateController@finalRead');
Route::post('/transaction/estimate-read','Admin\EstimateController@finalRead');
Route::post('/transaction/estimate-terms-view','Admin\EstimateController@termsView');
Route::post('/transaction/modalInfos','Admin\EstimateController@modalInfo');
Route::post('/transaction/estimate-modalTable','Admin\EstimateController@modalTableInfo');
Route::get('/transaction/estimate-variance','Admin\EstimateController@varianceCode');
Route::get('/transaction/getProducts','Admin\EstimateController@getProduct');
Route::post('/transaction/update-quote','Admin\EstimateController@updateQuote');

// Route::post('/transaction/estimate-add','Admin\EstimateController@addEstimate');
Route::post('/transaction/estimate-get','Admin\EstimateController@getEstimate');
Route::post('/transaction/estimate-approve','Admin\EstimateController@approveEstimate');

Route::get('/transaction/joborders-table','Admin\JobOrderController@viewJobOrder');
Route::get('/transaction/jobOrder-add','Admin\JobOrderController@viewAddJobOrder');
Route::post('/transaction/submitGenerate','Admin\JobOrderController@addJobOrder');
Route::post('/transaction/joborder-material','Admin\JobOrderController@joborderMaterial');
Route::post('/transaction/jobOrder-approve','Admin\JobOrderController@approveJob');

Route::get('/transaction/matReq-view','Admin\MatRequisitController@viewMaterialRequisit');
Route::get('/transaction/matReq-max','Admin\MatRequisitController@getMaterialRequisitMax');
Route::post('/transaction/getJoborders','Admin\MatRequisitController@getJoborder');
Route::get('/transaction/matReq-employee','Admin\MatRequisitController@getEmployee');
Route::get('/transaction/matReq-material','Admin\MatRequisitController@getMaterial');
Route::post('/transaction/matReq-modal','Admin\MatRequisitController@matReqModal');
Route::post('/transaction/matReq-matVar','Admin\MatRequisitController@matVar');
Route::post('/transaction/matReq-add','Admin\MatRequisitController@addMatReq');

Route::get('/transaction/jobOrder-monitoring','Admin\MaterialSpecController@viewMatSpec');
Route::get('/transaction/matspec-max','Admin\MaterialSpecController@getMatSpecMax');
Route::post('/Specification/ProductType','Admin\MaterialSpecController@showProductType');
Route::post('/transaction/matspec-add','Admin\MaterialSpecController@addMatSpec');
Route::post('/transaction/matspec-edit','Admin\MaterialSpecController@editMatSpec');
Route::post('/transaction/matspec-update','Admin\MaterialSpecController@updateMatSpec');
Route::post('/transaction/matspec-delete','Admin\MaterialSpecController@deleteMatSpec');
Route::post('/transaction/matspec-active','Admin\MaterialSpecController@activeMatSpec');
Route::post('/transaction/matspec-status','Admin\MaterialSpecController@statusMatSpec');
Route::post('/transaction/matSpecCart','Admin\PurchaseAddController@addCart');
Route::get('/transaction/purchase-products-get','Admin\PurchaseController@getProducts');
Route::get('/transaction/purchase-quote-get','Admin\PurchaseController@getQuote');
Route::post('/transaction/purchase-products-cart','Admin\PurchaseController@addProducts');
Route::get('/transaction/material-all','Admin\JobOrderController@getAllMaterial');

Route::get('/transaction/jobtickets','Admin\JobTicketController@viewJobTicket');
Route::get('/transaction/substage-get','Admin\JobTicketController@getSubStage');
Route::get('/transaction/jobtickets-max','Admin\JobTicketController@getJobTicketMax');
Route::get('/transaction/jobtickets-casting-max','Admin\JobTicketController@getCastingMax');
Route::get('/transaction/jobtickets-productGet','Admin\JobTicketController@getProducts');
Route::post('/transaction/jobtickets-add','Admin\JobTicketController@addJobTicket');
Route::post('/transaction/jobtickets-update','Admin\JobTicketController@updateJobTicket');
Route::post('/transaction/jobtickets-edit','Admin\JobTicketController@editJobTicket');
Route::post('/transaction/jobtickets-stage','Admin\JobTicketController@getStage');
Route::post('/transaction/jobtickets-products','Admin\JobTicketController@getProduct');

Route::get('/transaction/purchaseOrder','Admin\PurchaseAddController@viewPurchase');
Route::get('/transaction/mat-all','Admin\PurchaseAddController@getAllMaterial');
Route::get('/transaction/purchase-max','Admin\PurchaseAddController@getPurchaseAddMax');
Route::post('/transaction/matvar-all','Admin\PurchaseAddController@getAllMaterialVariant');
Route::get('/transaction/purchase-add','Admin\PurchaseAddController@viewaddPurchase');
Route::post('/transaction/purchase-matvar','Admin\PurchaseAddController@matvari');
Route::post('/transaction/purchaseorder-add','Admin\PurchaseAddController@addPurchaseOrder');
Route::post('/transaction/Supplier','Admin\PurchaseAddController@showSupplierDetails');
Route::post('/transaction/GetDetails','Admin\PurchaseAddController@GetDetails');
Route::post('/transaction/purchaseCart','Admin\PurchaseAddController@addCart');
Route::post('/transaction/purchase-final-read','Admin\PurchaseAddController@purchaseFinal');
Route::post('/transaction/purchase-table-read','Admin\PurchaseAddController@finalRead');

Route::get('/transaction/supplier-dropdown','Admin\ReturnController@suppliers');
Route::get('/transaction/return-max','Admin\ReturnController@getReturnMax');
Route::get('/transaction/return-values','Admin\ReturnController@getValues');
Route::post('/transaction/receive-dropdown','Admin\ReturnController@receive');
Route::post('/transaction/receive-infos','Admin\ReturnController@receiveInfos');
Route::post('/transaction/return-submit','Admin\ReturnController@addReturn');

Route::get('/transaction/inspection','Admin\ProductInspectionController@viewInspection');
Route::post('/transaction/inspection-add','Admin\ProductInspectionController@addInspection');
Route::post('/transaction/inspection-edit','Admin\ProductInspectionController@editInspection');
Route::post('/transaction/inspection-update','Admin\ProductInspectionController@updateInspection');

Route::post('/transaction/monitoring-tbl1','Admin\ProductionMonitoringController@monitoringtbl1');
Route::post('/transaction/monitoring-add','Admin\ProductionMonitoringController@addMonitoring');
Route::post('/transaction/monitoring-edit','Admin\ProductionMonitoringController@editMonitoring');
Route::post('/transaction/monitoring-update','Admin\ProductionMonitoringController@updateMonitoring');
Route::post('/transaction/monitoring-stage','Admin\ProductionMonitoringController@getStage');
Route::post('/transaction/monitoring-jobProduct','Admin\ProductionMonitoringController@getJob');

Route::get('/transaction/post-monitoring', function () {
    return view('Transaction.postmonitoring');
});
Route::get('/transaction/production-monitoring', function () {
    return view('Transaction.prodmonitoringver2');
});


Route::get('/transaction/receive','Admin\ReceiveMaterialsController@viewReceivePurchase');
Route::get('/transaction/receive-add','Admin\ReceiveMaterialsController@viewReceiveAddPurchase');
Route::post('/transaction/receive-po','Admin\ReceiveMaterialsController@getPOInfo');
Route::post('/transaction/receive-supplier','Admin\ReceiveMaterialsController@getPO');
Route::get('/transaction/matvariant-all','Admin\ReceiveMaterialsController@getAllMaterialVariant');
Route::post('/transaction/receiveCart','Admin\ReceiveMaterialsController@addCart');
Route::post('/transaction/receiving-add','Admin\ReceiveMaterialsController@addReceiving');
Route::get('/transaction/receiving-max','Admin\ReceiveMaterialsController@getReceivingMax');

Route::get('/transaction/stocks','Admin\StocksController@viewStocks');
Route::post('/transaction/materials-all','Admin\StocksController@getStockDetails');
Route::post('/transaction/receive-records','Admin\StocksController@getReceivingRecords');


// Route::get('/transaction/material-all','Admin\ReceiveAddMaterialsControlelr@getAllMaterial');
// Route::post('/transaction/receiveCart','Admin\ReceiveAddMaterialsController@addCart');

Route::get('htmltopdfview',array('as'=>'htmltopdfview','uses'=>'Admin\PurchaseAddController@htmltopdfview'));
Route::get('htmltopdfviewEst',array('as'=>'htmltopdfviewEst','uses'=>'Admin\EstimateController@htmltopdfview'));
Route::get('htmltopdfviewJobTicket',array('as'=>'htmltopdfviewJobTicket','uses'=>'Admin\JobTicketController@htmltopdfview'));
Route::get('htmltopdfviewReceivePurchase',array('as'=>'htmltopdfviewReceivePurchase','uses'=>'Admin\ReceivePurchaseController@htmltopdfview'));
Route::get('htmltopdfviewJobInspection',array('as'=>'htmltopdfviewJobInspection','uses'=>'Admin\JobInspectionController@htmltopdfview'));



Route::get('/transaction/inspectPurchase', function () {
    return view('Transaction.inspectPurchase');
});


Route::get('/transaction/estimate-final', function () {
    return view('Transaction.estimate-final');
});


Route::get('/transaction/materialrequisition-add', function () {
    return view('Transaction.materialrequisition-add');
});


Route::get('/transaction/estimate-job', function () {
    return view('Transaction.estimate-job');
});

Route::get('/transaction/order-allocation', function () {
    return view('Transaction.order-allocation');
});

Route::get('/transaction/manage-order', function () {
    return view('Transaction.manage-order');
});

Route::get('/transaction/purchase-final', function () {
    return view('Transaction.purchase-final');
});

Route::get('/transaction/production-progress', function () {
    return view('Transaction.production-progress');
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
