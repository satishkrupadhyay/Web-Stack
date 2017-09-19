@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Display Image</div>
                <table>
                    <tr></tr>


                <table class="table">
                    <tr>
                        <td>Order ID</td>
                        <td>Image</td>
                    </tr>
                    <?php
                        foreach($Images as $image){
                        ?>
                        <tr>
                        <td><?php echo $image->order_id ?></td>
                        <td><?php echo $image->image ?></td>
                        <td><img width="100" src="../../public/upload/<?php echo $image->image ?>" alt="<?php echo $image->image?>"></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

                
            </div>
        </div>
    </div>
</div>
@endsection
