@extends('layouts.app2')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Pending Orders</strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <table>
                               <tr>
                                <td>ORDER ID | CUSTOMER NAME | DATE OF ORDER</td>
                                </tr>
                           @foreach ($data as $value)

                                <tr>
                                <td><a href=""> {{$value->order_id}} | {{$value->cust_id}} | {{$value->date_of_purchase}}</a></td>
                                </tr>

                           @endforeach

                    </table> 
                     {{ $data->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
