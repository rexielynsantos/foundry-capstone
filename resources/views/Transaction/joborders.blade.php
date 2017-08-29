@extends('master')
@section('pageTitle', 'Job Orders')
@section('content')


<h3 style="color:black;font-family: 'Abel', sans-serif;font-size: 200%;">Job Orders </h3>

<div class="box box-default">
  <div class="box-body">

    <div class="col-md-12">
      <table id="jobOrdersTable" name="jobOrdersTable" class="table table-bordered">
        <thead>
        		<th> Job Order No. </th>
            <th> Reference </th>
        		<th> Job Description </th>
            <th> Material</th>
            <th> Qty</th>
            <th> Remarks</th>
            <th> Action</th>
        </thead>
        <tbody>
          @foreach ($joborder as $jobordertable)
            <tr>
              <td> {{$jobordertable->strJobOrderID}}</td>
              <td> {{$jobordertable->strQuoteRequestID}}</td>
              <td> {{$jobordertable->strProductName}} </td>
              <td> {{$jobordertable->strVarianceCode}} </td>
              <td> {{$jobordertable->intOrderQty}}pcs </td>
              <td> {{$jobordertable->strRemarks}}</td>
              <td><button type="button" name="PDF">PDF</button><br>
                <button type="button" id ="{{$jobordertable->strJobOrderID}}" onclick="matReq(this.id)" name="Material Requisiton">Material Requisiton</button><br>
                <button type="button" name="Production Head">Production Head</button></td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@push('scripts')
 <script type="text/javascript" src="{{URL::asset('js/logic/joborder.js')}}"></script>

@endpush

@stop
