(function ( $ ) {
 
    $.fn.coloring = function( options ) {
 

        var settings = $.extend({
            // Ustawienia podstawowe
            color: "white",
            border: "4px solid red",
        }, options );
 
        // nadpisywanie ustawień odzielną funckją 
        return this.css({
            color: settings.color,
            //backgroundColor: settings.backgroundColor,
            border: settings.border
        });
 
    };
 
}( jQuery ));