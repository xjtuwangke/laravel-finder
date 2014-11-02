<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 14/11/2
 * Time: 21:07
 */

namespace Xjtuwangke\LaravelFinder;


class Authentication {

    public static function guarantee(){
        setcookie( '_lckfinder_auth' , static::v() );
    }

    public static function unGuarantee(){
        setcookie( '_lckfinder_auth' , null );
    }

    public static function check(){
        $string = $_COOKIE[ '_lckfinder_auth' ];
    }

    protected static function v(){
        $ts = time();
        $salt = \Config::get( 'laravel-finder::config.salt' );
        return \Hash::make( $ts . $salt . $ts ) . '@' . $ts;
    }
}