<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['drug_name','invoice_no','price','quantity','amount','name'];
}
	