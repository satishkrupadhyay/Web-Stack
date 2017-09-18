@extends('layouts.app2')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <!--#############################################################################-->

                       
                        @foreach ($users as $user) {
                                        echo $user->name;
                                    }
                        @endforeach


                    <!--#############################################################################-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
