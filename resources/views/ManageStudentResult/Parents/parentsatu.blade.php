@extends('ManageRegistration.Parent.template')

@section('content')
<h1>Results</h1>

@if($results->isEmpty())
<p>No results found.</p>
@else
<table class="table">
   <thead>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Score</th>
         <!-- Add other columns as needed -->
      </tr>
   </thead>
   <tbody>
      @foreach($results as $result)
      <tr>
         <td>{{ $result->id }}</td>
         <td>{{ $result->resultMark }}</td>
         <td>{{ $result->Grade }}</td>
         <!-- Add other columns as needed -->
      </tr>
      @endforeach
   </tbody>
</table>
@endif
@endsection