<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CSVImporter {

    public static function fromForm($name) {
        return array_map('str_getcsv', file($_FILES[$name]['tmp_name']));
    }
}
