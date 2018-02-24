<?php
namespace App\Controllers;

use App\Models\Address;
class AddressController
{
    /**
     * @param $req
     */
    public static function index($req, $resp)
    {
        // set the response to format using json.
        $send = $req->param('format', 'json');
        // Pass all an Address object with all addresses to the response.
        return $resp->$send(Address::get());
    }

    /**
     * Add a new address.
     * @param $req
     * @param $resp
     * @param $service
     */
    public static function store($req, $resp, $service)
    {
        $return = [
            'success' => false
        ];
        // the regex below covers a-z, numeric, hyphen, underscore, and spaces
        $service->validateParam('name', 'Please enter a valid place name')->isLen(3, 100)->isRegex("^[a-zA-Z]([\w -]*[a-zA-Z])?$^");
        $service->validateParam('address_1', 'Please enter a valid address')->isLen(3, 100)->isRegex("^[a-zA-Z]([\w -]*[a-zA-Z])?$^");
        $service->validateParam('city', 'Please enter a valid city')->isLen(3, 100)->isRegex("^[a-zA-Z]([\w -]*[a-zA-Z])?$^");
        $service->validateParam('state', 'Please enter a valid state')->isLen(2, 20)->isRegex("^[a-zA-Z]([\w -]*[a-zA-Z])?$^");

        // Only include numbers in zip.
        $service->validateParam('zipcode', 'Please enter a valid zipcode')->isLen(5, 10)->isChars('0-9');

        // All potential fields to set later on.
        $fields = ['name', 'address_1', 'address_2', 'city', 'state', 'zipcode'];

        // Instantiate an address object.
        $address = new Address;

        foreach ($fields as $field) {
            // Normally I'd coalesce the var in the ternary, but wasn't sure
            // if you wanted php5+ support, since that\s a PHP 7 Feature,
            // but it'd look like:
            // $address->$field = $req->$field ?? null;
            $address->$field = !empty($req->$field) ? $req->$field : null;
        }
        // If we saved successfully let's go ahead and return success.
        if ($address->save()) {
            $return = [
                'success' => true
            ];
        }

        // set the format as json.
        $send = $req->param('format', 'json');

        // Return the json response.
        return $resp->$send($return);
    }

    /**
     * Search for an Address.
     * @param $req
     */
    public static function search($req, $resp)
    {
        $addresses = Address::search($req->field, $req->query);
        $send      = $req->param('format', 'json');
        return $resp->$send($addresses);
    }
}
