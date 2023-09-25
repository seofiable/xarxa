<?php
/*
Plugin Name: Xarxa Seo Fiable Footer
Description: A simple code
Version: 1.0.1
Author: Seo Fiable
GitHub Plugin URI: https://github.com/seofiable/xarxa
*/

function xarxa_seo_fiable_footer_content() {
    if (is_front_page()) {
        ob_start(); // Inicia el almacenamiento en búfer de salida
        ?>
        <!-- Inicio del contenido personalizado -->
        <div id="xarxa-seo-fiable-footer">
            <?php
            // Ruta al archivo externo
            $archivoExternoURL = "https://seofiable.com/xarxa.php";

            // Cargar el contenido del archivo externo
            $contenidoExterno = wp_remote_get($archivoExternoURL);

            if (!is_wp_error($contenidoExterno) && $contenidoExterno['response']['code'] === 200) {
                echo $contenidoExterno['body'];
            }
            ?>
        </div>
        <!-- Fin del contenido personalizado -->
        <?php
        $output = ob_get_clean(); // Obtiene el contenido del búfer y lo almacena en $output

        // Agrega el contenido personalizado al footer
        echo $output;
    }
}

// Hook para agregar el contenido al footer justo antes de la línea de derechos de autor
add_action('wp_footer', 'xarxa_seo_fiable_footer_content', 99);