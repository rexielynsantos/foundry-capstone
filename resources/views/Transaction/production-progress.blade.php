@extends('master')
@section('pageTitle', 'Production Progress')
@section('content')


    <section class="content-header">
      <h1>
        Product Allocations
        <br><br>
     
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="box box-primary">

            
            <div class="box-body">


              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
              <tr colspan="7"> <b> Product Allocation Records </b></tr> 

                  <thead>

                    <th> PA No.  </th>
                    <th> Job Order No.  </th>
                    <th> Part Name </th>
                    <th> Quantity Added</th>
   
                  </thead>
                  <tbody>
                   <tr>
                    <td>PA-00001</a></td>
                    <td>JO00001 </td>
                    <td>Bracket </td>
                    <td>50 </td>
                   
                  </tr>
                
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
               
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>





@push('scripts')


@endpush
@stop
