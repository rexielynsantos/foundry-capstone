@extends('master')
@section('content')

<h1>Data Reactivation</h1>

<ul class="treeview-menu" style="color:teal">
  <li><a href="/maintenance/employee-reactivate"><i class="fa fa-circle-o"></i> Employee</a></li>
  <li><a href="/maintenance/role-reactivate"><i class="fa fa-circle-o"></i> User Role</a></li>
  <li><a href="/maintenance/stage-reactivate"><i class="fa fa-circle-o"></i> Stage</a></li>
  <li><a href="/maintenance/substage-reactivate"><i class="fa fa-circle-o"></i> Substage</a></li>
  <!-- <li><a href="/maintenance/machine-reactivate"><i class="fa fa-circle-o"></i> Machine</a></li> -->
  <li><a href="/maintenance/jobTitle-reactivate"><i class="fa fa-circle-o"></i> Job Title</a></li>
  <li><a href="/maintenance/department-reactivate"><i class="fa fa-circle-o"></i> Department</a></li>
  <li><a href="/maintenance/module-reactivate"><i class="fa fa-circle-o"></i> Module</a></li>
  <li><a href="/maintenance/productType-reactivate"><i class="fa fa-circle-o"></i> Product Type</a></li>
  <li><a href="/maintenance/productVariance-reactivate"><i class="fa fa-circle-o"></i> Product Variance</a></li>
  <!-- <li><a href="/maintenance/product-reactivate"><i class="fa fa-circle-o"></i> Product</a></li>
  <li><a href="/maintenance/paymentTerm-reactivate"><i class="fa fa-circle-o"></i> Payment Term</a></li>
  <li><a href="/maintenance/materialType-reactivate"><i class="fa fa-circle-o"></i> Material Type</a></li>
  <li><a href="/maintenance/material-reactivate"><i class="fa fa-circle-o"></i> Material</a></li>
  <li><a href="/maintenance/uomType-reactivate"><i class="fa fa-circle-o"></i> UOM Type</a></li>
  <li><a href="/maintenance/uom-reactivate"><i class="fa fa-circle-o"></i> Unit Of Measurement</a></li>
  <li><a href="/maintenance/warehouse-reactivate"><i class="fa fa-circle-o"></i> Warehouse</a></li>
  <li><a href="/maintenance/productShelf-reactivate"><i class="fa fa-circle-o"></i> Shelf</a></li> -->
</ul>

<!-- <div class="content-wrapper"> -->
  <section class="content">
      @yield('react')
  </section>
<!-- </div> -->

@stop
