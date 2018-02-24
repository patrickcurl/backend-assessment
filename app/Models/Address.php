<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Address extends Model
{
    /**
     * Search against the db in fulltext mode for name or zipcode.
     * @param $type
     * @param $query
     * @return  Array
     * @author Patrick Curl <patrickwcurl@gmail.com>
     */
    public static function search($field, $query)
    {

        try {
            return self::whereRaw("MATCH($field) AGAINST('+$query*' IN  BOOLEAN MODE)")->get()->toArray();
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
