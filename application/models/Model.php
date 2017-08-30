<?php defined('BASEPATH') OR exit('No direct script access allowed');

    use Illuminate\Database\Eloquent\Model as Eloquent;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Model extends Eloquent {
        public $timestamps = false;
        use SoftDeletes;
    }

?>
