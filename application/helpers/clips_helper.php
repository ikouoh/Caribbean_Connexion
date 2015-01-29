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
?>
