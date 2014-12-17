<?php

/**
 * maintains an array-like collection of distinct scalar values.
 * @author  Adrian Testa-Avila <adrian@enspi.red>
 * @license GPL v3
 */
class ArraySet extends ArrayObject{

    public function __construct( array $items ){
        parent::__construct( array_combine( $items,$items ) );
    }
    
    public function offsetSet( $index,$value ){
        if( is_scalar( $value ) ){
            $t = gettype( $value );
            $m = "Members of ArraySet must be scalar; [$t] provided";
            throw new InvalidArgumentException( $m,E_USER_NOTICE);
        }
        parent::offsetSet( $value,$value );
    }
}
