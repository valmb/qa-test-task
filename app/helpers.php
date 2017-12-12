<?php

// MY HELPERS

if (! function_exists('jscss')) {
    /**
     * Generate an path for the js or css file with version and minified.
     *
     * @param  string  $path
     * @return string
     */
    function jscss($path)
    {
        // we return minified if flag is set
        if( env("JS_MINIFY", false ) ) {
            //$path = str_replace('.js', '.min.js', $path);
            //$path = str_replace('.css', '.min.css', $path);
        }

        // we add version, if debug mode, we add new version each time
        if( env("JS_CSS_VERSION", false ) )
            $path .= '?ver='.( config('app.debug') ? str_random(6) : config('view.version') );

        return url( $path );
    }
}

// MY HELPERS

if (! function_exists('price')) {
    /**
     * show price with currency
     *
     * @param  float $price
     * @param \App\Currency $currency
     * @return string
     */
    function price( $price, $currency )
    {
        return "<span class='currency-sign' title='{$currency->getName()}'>{$currency->getSign()}</span>".number_format((float)$price , 2, '.', ',');
    }
}

