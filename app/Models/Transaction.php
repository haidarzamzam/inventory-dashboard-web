<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public static function getLastOneMonth(string $type)
    {
        $query = "SELECT trans_date, COUNT(*) AS trx
                FROM `transactions`
                WHERE DATE(trans_date) >= DATE(NOW()) - INTERVAL 30 DAY
                AND trans_type = '$type'
                AND deleted_at IS NULL
                GROUP BY trans_type, trans_date
                ORDER BY trans_date";
        
        return DB::select($query);
    }

    public static function getDailyTotal()
    {
        $query = "SELECT tr.trans_date, tr.trans_type, SUM(td.price) AS total
                FROM `transaction_details` td
                INNER JOIN `transactions` tr ON td.transaction_id = tr.id
                WHERE td.deleted_at IS NULL
                GROUP BY transaction_id, trans_date, trans_type";
        
        return DB::select($query);
    }
}
