<?php

if ( ! function_exists( 'chilla_error_log' ) ) {
    
    function chilla_error_log ( $string, $var_dump = true ) {
        date_default_timezone_set('Europe/Athens');
        if ( $var_dump ) {
            ob_start();
            var_dump( $string );
            $string = ob_get_clean();
        }
        $str_to_write = '[' .date( 'd-m-Y H:i:s' ) . '] > ' . $string;
        $log_file = fopen( CSPF_PLUGIN_DIR . '/logs/debug.log', 'a' );
        fwrite( $log_file, "\n". $str_to_write );
        fclose( $log_file );
    }
}