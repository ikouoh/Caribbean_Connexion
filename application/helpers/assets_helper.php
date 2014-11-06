<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('css_url')) {

    function css_url($nom, $tag = false) {
        if ($tag) {
            $media = false;
            if (is_string($tag)) {
                $media = 'media="' . $tag . '"';
            }
            return '<link href="' . base_url() . 'assets/css/' . $nom . '.css" type="text/css" rel="stylesheet" ' . $media . '/>';
        }
        return base_url() . 'assets/css/' . $nom . '.css';
    }

}

if (!function_exists('js_url')) {

    function js_url($nom, $tag = false) {
        if ($tag) {
            return '<script src="' . base_url() . 'assets/js/' . $nom . '.js" type="text/javascript"></script>';
        }
        return base_url() . 'assets/js/' . $nom . '.js';
    }

}

if (!function_exists('js_full_url')) {

    function js_full_url($nom, $tag = false) {
        if ($tag) {
            return '<script src="'. $nom . '" type="text/javascript"></script>';
        }
        return $nom;
    }

}

if (!function_exists('js_addresse_picker')) {



    function js_addresse_picker($lattitude='', $longitude='') {
        if($lattitude=='')
            $lattitude="48.856614"; 
        if($longitude=='')
        $longitude="2.352222";
       
        $html = '<script type="text/javascript">
    $(function() {
       
        var a_Adresse = $( "#a_Adresse" ).addresspicker(
        {
            regionBias: "fr",
            map:      "#map_canvas",
            typeaheaddelay: 1000,
            mapOptions: {
                zoom:14,
                center: new google.maps.LatLng('.$lattitude.','.$longitude.')
            }

        });

        var gmarker = a_Adresse.addresspicker("marker");
        //gmarker.setVisible(true);
        a_Adresse.addresspicker("updatePosition");

        a_Adresse.on("addressChanged", function(evt, address) {
           //alert(address.geometry.location.lat() +"," + address.geometry.location.lng())
         //  console.dir(address);
        });

        a_Adresse.on("positionChanged", function(evt, markerPosition) {
            markerPosition.getAddress( function(address) {
                if (address) {
                    $( "#a_Adresse").val(address.formatted_address);
                }
            })
        });
    });
    </script>';
        return $html;
    }

}


if (!function_exists('jquery_url')) {

    function jquery_url($nom) {
        return base_url() . 'assets/jquery/' . $nom;
    }

}

if (!function_exists('img_url')) {

    function img_url($nom) {
        $CI = & get_instance();
        return base_url() . 'application/themes/' . $CI->config->item('theme') . '/assets/img/' . $nom;
        //return '../assets/img/'. $nom;
    }

}

if (!function_exists('img')) {

    function img($nom, $alt = '') {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }

}

if (!function_exists('theme_url')) {

    function theme_url($uri) {
        $CI = & get_instance();
        return $CI->config->base_url('application/themes/' . $CI->config->item('theme') . '/' . $uri);
    }

}

if (!function_exists('admin_url')) {

    function admin_url($uri) {
        $CI = & get_instance();
        return $CI->config->base_url('application/themes/admin/' . $uri);
    }

}

if (!function_exists('theme_css')) {

    function theme_css($uri, $tag = false) {
	
        if ($tag) {
            $media = false;
            if (is_string($tag)) {
                $media = 'media="' . $tag . '"';
            }
            return '<link href="' . theme_url('assets/css/' . $uri ) . '.css" type="text/css" rel="stylesheet" ' . $media . '/>';
        }
	
        return theme_url('assets/css/' . $uri);
    }

}

if (!function_exists('admin_css')) {

    function admin_css($uri, $tag = false) {
        if ($tag) {
            $media = false;
            if (is_string($tag)) {
                $media = 'media="' . $tag . '"';
            }
            return '<link href="' . admin_url('assets/css/' . $uri ) . '.css" type="text/css" rel="stylesheet" ' . $media . '/>';
        }

        return admin_url('assets/css/' . $uri);
    }

}

if (!function_exists('theme_img')) {

    function theme_img($name_img, $complement = array(), $tag = false, $class = "") {

        //Texte alternatif
        $alt = (!empty($complement['alt']) ? "alt='" . $complement["alt"] . "' " : "");
        //Identifiant de l'image
        $id = (!empty($complement["id"]) ? $complement["id"] : "image-" . time() );

        if ($tag) {
            return '<img id="' . $id . '"  src="' . theme_url('assets/img/' . $name_img) . '"   ' . $alt . ' class="'.$class.'" />';
        }

        return theme_url('assets/img/' . $name_img);
    }

}

if (!function_exists('admin_img')) {

    function admin_img($name_img, $complement = array(), $tag = false) {

        //Texte alternatif
        $alt = (!empty($complement['alt']) ? "alt='" . $complement["alt"] . "' " : "");
        //Identifiant de l'image
        $id = (!empty($complement["id"]) ? $complement["id"] : "image-" . time() );

        if ($tag) {
            return '<img id="' . $id . '"  src="' . admin_url('assets/img/' . $name_img) . '"   ' . $alt . '  />';
        }

        return admin_url('assets/img/' . $name_img);
    }

}

if (!function_exists('theme_js')) {

    function theme_js($nom, $tag = false) {
        if ($tag) {
            return '<script src="' . theme_url('assets/js/' . $nom) . '.js" type="text/javascript"></script>';
        }
        return theme_url('assets/js/' . $nom);
    }

}

if (!function_exists('admin_js')) {

    function admin_js($nom, $tag = false) {
        if ($tag) {
            return '<script src="' . admin_url('assets/js/' . $nom) . '.js" type="text/javascript"></script>';
        }
        return theme_url('assets/js/' . $nom);
    }

}

if (!function_exists('print_rh')) {

    function print_rh($array, $line = null, $file = null) {

        if (!is_null($line) && !is_null($file)) {
            echo "Ligne " . $line . " - " . $file;
        }

        echo"<pre>";
        print_r($array);
        echo"</pre>";
    }

}

if (!function_exists('die_rh')) {

    function die_rh($array) {
        print_rh($array);
        die();
    }

}
?>
