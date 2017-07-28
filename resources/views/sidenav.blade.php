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
              <a href="#"><i class="fa fa-circle-o"></i> Production Stages
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/substage"><i class="fa fa-plus"></i> Sub-stage</a></li>
                <li class="treeview">
                  <a href="/maintenance/stage"><i class="fa fa-plus"></i> Stage </a>
                    
                </li>
              </ul>
            </li>
            <li><a href="/maintenance/productType"><i class="fa fa-circle-o"></i> Product Types</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Measurements
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/uomType"><i class="fa fa-plus"></i> Unit Type </a></li>
                <li class="treeview">
                  <a href="/maintenance/uom"><i class="fa fa-plus"></i> Unit </a>
        
                </li>
              </ul>
            </li>
            <li><a href="/maintenance/productVariant"><i class="fa fa-circle-o"></i> Product Variants </a></li>
            <li><a href="/maintenance/supplier"><i class="fa fa-circle-o"></i> Suppliers</a></li>
            <li><a href="/maintenance/material"><i class="fa fa-circle-o"></i> Materials</a></li>
           <li> <a href="/transaction/jobOrder-monitoring"><i class="fa fa-circle-o"></i> Product Specification </a>
            <li><a href="/maintenance/product"><i class="fa fa-circle-o"></i> Products</a></li>
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
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Workflow
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/maintenance/module"><i class="fa fa-plus"></i> Module</a></li>
                <li><a href="/maintenance/userRole"><i class="fa fa-plus"></i> User Role</a></li>
                <li><a href="/maintenance/workflow"><i class="fa fa-plus"></i> Workflow</a> </li>
              </ul>
            </li>

          </ul>
        </li>
        <li class="treeview">
          <a href="/transaction/estimate">
            <img src="../images/new-order.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Order Processing</span>
          </a>
        </li>
         <li class="treeview">
          <a href="/transaction/purchaseOrder">
            <img src="../images/inventory-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Inventory</span>
          </a>
        </li>
        <li class="treeview">
          <a href="/transaction/jobtickets">
            <img src="../images/production-icon.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Production</span>
          </a>
        </li>
         <li class="treeview">
          <a href="/transaction/workflowManagement">
            <img src="../images/orders.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Workflow</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <img src="../images/queries.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Queries</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

        </li>
        <li class="treeview">
          <a href="#">
            <img src="../images/reports.png"> <span> &nbsp;&nbsp;&nbsp;&nbsp;Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
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
            <li><a href="/maintenance/paymentTerms"><i class="glyphicon glyphicon-object-align-bottom"></i> Payment Terms </a></li>
            <li><a href="/maintenance/dataReactivation"><i class="glyphicon glyphicon-object-align-bottom"></i> Data Reactivation </a></li>

          </ul>
        </li>
    </ul>
  </section>
</aside>

