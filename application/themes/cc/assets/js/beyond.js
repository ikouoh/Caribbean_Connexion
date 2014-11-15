$(document).ready(function () {
    var base_url = $('#base_url').val();
    
    /*
     *  JS actif-inactif
     */
    $('.switch-actif').click(function(e){
        var id = $(this).data('id');
        var entity = $(this).data('entity');
        $.post(base_url + "ajax/SwitchActive", {
            id:id,
            entity:entity
            }, function (data) {
                if(data.etat === true){
                    location.reload();
                    
                }
        },'json');
        
    });
    
    $('#edit-artiste').submit(function(e){
        var id_form = $(this).attr('id');
        var id = $('#'+id_form+' #id_artiste').val();
        var nom = $('#'+id_form+' #nom').val();
        var ile = $('#'+id_form+' #ile').val();
        var bio = $('#'+id_form+' #bio').val();
        
        $.post(base_url + "ajax/EditArtiste", {
            id:id,
            nom:nom,
            ile_id:ile,
            bio:bio
            }, function (data) { 
                if(data.etat === true){
                    location.replace(base_url+"beyond/artiste");
                } else{
                    console.log(data);
                    //location.reload();
                }
        },'json');
        e.preventDefault();
    });
    
    $('#edit-genre').submit(function(e){
        var id_form = $(this).attr('id');
        var id = $('#'+id_form+' #id_genre').val();
        var genre = $('#'+id_form+' #genre').val();
        var descriptif = $('#'+id_form+' #descriptif').val();
        
        $.post(base_url + "ajax/EditGenre", {
            id:id,
            genre:genre,
            descriptif:descriptif
            }, function (data) { 
                if(data.etat === true){
                    location.replace(base_url+"beyond/genre");
                } else{
                    console.log(data);
                    //location.reload();
                }
        },'json');
        e.preventDefault();
    });
    
    $('#edit-ile').submit(function(e){
        var id_form = $(this).attr('id');
        var id = $('#'+id_form+' #id_ile').val();
        var ile = $('#'+id_form+' #ile').val();
        var descriptif = $('#'+id_form+' #descriptif').val();
        
        $.post(base_url + "ajax/EditIle", {
            id:id,
            ile:ile,
            descriptif:descriptif
            }, function (data) { 
                if(data.etat === true){
                    location.replace(base_url+"beyond/ile");
                } else{
                    console.log(data);
                    //location.reload();
                }
        },'json');
        e.preventDefault();
    });
    
    $('#edit-clip').submit(function(e){
        var id_form = $(this).attr('id');
        var id = $('#'+id_form+' #id_artiste').val();
        var nom = $('#'+id_form+' #nom').val();
        var ile = $('#'+id_form+' #ile').val();
        var bio = $('#'+id_form+' #bio').val();
        
        $.post(base_url + "ajax/EditClip", {
            id:id,
            nom:nom,
            ile_id:ile,
            bio:bio
            }, function (data) { 
                if(data.etat === true){
                    location.replace(base_url+"beyond/artiste");
                } else{
                    console.log(data);
                    //location.reload();
                }
        },'json');
        e.preventDefault();
    });
    
});