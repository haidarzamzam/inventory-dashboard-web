<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public static function getTransaction($id)
    {
        $query = "SELECT td.id, tr.trans_no, pr.product_name, sn.serial_no, td.price, td.discount
                FROM `transaction_details` td
                INNER JOIN transactions tr ON td.transaction_id = tr.id
                INNER JOIN products pr ON td.product_id = pr.id
                INNER JOIN serial_numbers sn ON td.serial_no = sn.serial_no
                WHERE tr.id = $id
                AND td.product_id = sn.product_id
                AND td.deleted_at IS NULL";

        return DB::select($query);
    }
}
