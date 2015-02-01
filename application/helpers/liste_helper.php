<?php

if (!function_exists('clips')) {

    function clips($lien, $id, $titre, $annee, $ohm) {
        $classe = ($ohm)?'video_ohm':'video';
        $clip = 
        '<div class="'.$classe.'" style="background-image:url(\'http://img.youtube.com/vi/'.$lien.'/0.jpg\')">
            <a href="http://www.youtube.com/watch?v='.$lien.'&rel=0" rel="prettyPhoto" data-clipid="'.$id.'">
                <span class="info_clip">'.$titre.'</span>
                <span class="year_clip">'.$annee.'</span>
            </a>
        </div>';
        
        echo $clip;
    }
}

if (!function_exists('artistes')) {

    function artistes($nom, $image, $lien) {
        $img = img_url($image);
        $img2 = img_url('mic2.jpg');
        $artiste = 
        '<div class="artiste" style="background-image:url('.$img.'), url('.$img2.')">
            <a href="'.$lien.'"><span class="info_liste">'.$nom.'</span></a>
        </div>';
        
        echo $artiste;
    }
}

if (!function_exists('genres')) {

    function genres($nom, $image, $lien) {
        $img = img_url($image);
        $img2 = img_url('music2.jpg');
        $genre = 
        '<div class="genre" style="background-image:url('.$img.'), url('.$img2.')">
            <a href="'.$lien.'"><span class="info_liste">'.$nom.'</span></a>
        </div>';
        
        echo $genre;
    }
}

if (!function_exists('iles')) {

    function iles($nom, $image, $lien) {
        $img = img_url($image);
        $img2 = img_url('ile3.jpg');
        $ile = 
        '<div class="ile" style="background-image:url('.$img.'), url('.$img2.')">
            <a href="'.$lien.'"><span class="info_liste">'.$nom.'</span></a>
        </div>';
        
        echo $ile;
    }
}



?>
