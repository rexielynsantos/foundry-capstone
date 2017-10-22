 <aside class="main-sidebar">
  <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/1x1.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        @if (Auth::guest())
        @else
          <p>{{ Auth::user()->name }} </p>

        @endif
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <ul class="sidebar-menu">

          <li class="treeview">
          <a href="#">
            <img src="../images/maintenance.png"> <span>&nbsp;&nbsp;&nbsp;&nbsp;Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">


            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Measurements
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="/maintenance/uomType"><i class="fa fa-plus"></i> Unit Type </a></li> -->
                <li class="treeview">
                  <a href="/maintenance/uom"><i class="fa fa-plus"></i> Unit </a>
                </li>
              </ul>
            </li>

            <li><a href="/maintenance/supplier"><i class="fa fa-circle-o"></i> Suppliers</a></li>
             <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Raw Materials
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/materialVariants"><i class="fa fa-circle-o"></i> Material Variants</a></li>
                <li><a href="/maintenance/material"><i class="fa fa-circle-o"></i> Materials</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Products
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/productType"><i class="fa fa-circle-o"></i> Product Types</a></li>

               <!--  <li> <a href="/transaction/jobOrder-monitoring"><i class="fa fa-circle-o"></i> Product Variance </a> -->
            <li><a href="/maintenance/product"><i class="fa fa-circle-o"></i> Products</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Employees
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/department"><i class="fa fa-plus"></i> Department</a></li>
                <li><a href="/maintenance/jobTitle"><i class="fa fa-plus"></i> Job Title</a></li>
                <li><a href="/maintenance/employee"><i class="fa fa-plus"></i> Employee</a></li>
              </ul>
            </li>
   <!--          <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Workflow
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/module"><i class="fa fa-plus"></i> Module</a></li>

                <li><a href="/maintenance/workflow"><i class="fa fa-plus"></i> Workflow</a> </li>
              </ul>
            </li> -->

          </ul>
        </li>
   <!--      <li class="treeview">
          <a href="/transaction/estimate">
            <img src="../images/new-order.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Order Processing</span>
          </a>
        </li> -->
         <li class="treeview">
          <a href="/transaction/customer-list">
            <img src="../images/customer-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Customer</span>
          </a>
        </li>
        <li class="treeview">
         <a href="/transaction/jobOrder-monitoring">
           <img src="../images/bill-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Bill of Materials</span>
         </a>
       </li>
         <li class="treeview">
          <a href="/transaction/product-costing-list">
            <img src="../images/costing-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Product Costing</span>
          </a>
        </li>

        <li class="treeview">
          <a href="/transaction/estimate">
            <img src="../images/quotation-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Quotation</span>
          </a>
        </li>

         <li class="treeview">
          <a href="/transaction/customerPurchases">
            <img src="../images/purchase-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Sales Order </span>
          </a>
        </li>

         <li class="treeview">
          <a href="/transaction/joborders">
            <img src="../images/joborder-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Job Order</span>
          </a>
        </li>

         <li class="treeview">
          <a href="/transaction/materialrequisition-add">
            <img src="../images/materialrequi-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Material Requisition </span>
          </a>
        </li>

   <!--       <li class="treeview">
        <a href="#">
          <img src="../images/new-order.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Order Processing</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>



          <ul class="treeview-menu">
            <li><a href="/transaction/customers"><i class="glyphicon glyphicon-object-align-bottom"></i> New Customer </a></li>
          </ul>

          <ul class="treeview-menu">
            <li><a href="/transaction/order-costing"><i class="glyphicon glyphicon-object-align-bottom"></i> New Product Costing </a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="/transaction/product-costing-list"><i class="glyphicon glyphicon-object-align-bottom"></i> View Product Costings </a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="/transaction/estimate-add"><i class="glyphicon glyphicon-object-align-bottom"></i> New Quotation </a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="/transaction/estimate"><i class="glyphicon glyphicon-object-align-bottom"></i> View Quotations </a></li>
          </ul>
           <ul class="treeview-menu">
            <li><a href="/transaction/customerPurchase-new"><i class="glyphicon glyphicon-object-align-bottom"></i> New Customer Purchase </a></li>
          </ul>
           <ul class="treeview-menu">
            <li><a href="/transaction/customerPurchases"><i class="glyphicon glyphicon-object-align-bottom"></i> View Customer Purchases </a></li>
          </ul>
           <ul class="treeview-menu">
            <li><a href="/transaction/joborder-new"><i class="glyphicon glyphicon-object-align-bottom"></i> New Job Order </a></li>
          </ul>
           <ul class="treeview-menu">
            <li><a href="/transaction/customerPurchases"><i class="glyphicon glyphicon-object-align-bottom"></i> View Job Order </a></li>
          </ul>


        </li> -->
         <li class="treeview">
          <a href="/transaction/purchaseOrder">
            <img src="../images/inventory-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Inventory</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/transaction/production-monitoring">
            <img src="../images/production-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Production</span>
          </a>
        </li>
     <!--     <li class="treeview">
          <a href="/transaction/workflowManagement">
            <img src="../images/orders.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Workflow</span>
          </a>
        </li> -->

        <li class="treeview">
          <a href="/queries/queries">
            <img src="../images/queries.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Queries</span>
          </a>

        </li>
        <li class="treeview">
          <a href="/reports">
            <img src="../images/reports.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Reports</span>

          </a>
        </li>
        <li class="treeview">
        <a href="#">
          <img src="../images/utilities.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Utilities</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>


          <ul class="treeview-menu">
            <li><a href="/maintenance/paymentTerms"><i class="fa fa-plus"></i> Payment Terms </a></li>
            <li><a href="/maintenance/dataReactivation"><i class="fa fa-plus"></i> Data Reactivation </a></li>
             <!-- <li><a href="/maintenance/userRole"><i class="fa fa-plus"></i> User Role</a></li> -->
             <li><a href="/utilities/terms-condition"><i class="fa fa-plus"></i> Terms and Condition </a></li>
             <li><a href="/maintenance/module"><i class="fa fa-plus"></i> Module </a></li>
             <li><a href="/maintenance/substage"><i class="fa fa-plus"></i> Sub-stage</a></li>
             <li><a href="/maintenance/stage"><i class="fa fa-plus"></i> Stage</a></li>

          </ul>
        </li>
    </ul>
  </section>
</aside>
