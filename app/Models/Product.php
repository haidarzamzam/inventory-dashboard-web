<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public static function getReport()
    {
        $query = "SELECT pr.product_name, COUNT(*) AS stock
                FROM `serial_numbers` sn
                INNER JOIN `products` pr ON sn.product_id = pr.id
                WHERE used_table = 0
                GROUP BY product_id, product_name";
        
        return DB::select($query);
    }
}
