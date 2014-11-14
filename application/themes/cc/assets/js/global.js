$(document).ready(function () {
    var base_url = $('#base_url').val();

    $("a[rel^='prettyPhoto']").on('click',function(){
            var clipid = $(this).data('clipid');
            $('#clipid').val(clipid);
    });


    $("a[rel^='prettyPhoto']").prettyPhoto({
        changepicturecallback:function(){
            $('a.pp_deadLink').bind('click',function(){
                var clipid = $('#clipid').val();  
                //APPEL AJAX COMPTEUR VUE CLIP
                    $.post(base_url + "ajax/LienMort", {
                        clipid:clipid
                    }, function (data) {
                        if(data.etat == true){
                            // reload la page
                            location.reload();
                            //$.prettyPhoto.close();
                            //message de remerciement
                        }
                    },'json');
            });
        },

        ajaxcallback:function(){
        var clipid = $('#clipid').val();

        //APPEL AJAX COMPTEUR VUE CLIP
        $.post(base_url + "ajax/AddVueClip", {
            clipid:clipid
            }, function (data) {

                if(data.etat == true){
                    //
                }
            },'json');
        }
    });


    $('.actif-art').click(function(e){
        console.log($(this));
        var id = $(this).data('artisteid');
        var entity = 'Artiste';
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
        
        
        
        /**/
        $.post(base_url + "ajax/EditArtiste", {
            id:id,
            nom:nom,
            ile_id:ile,
            bio:bio
            }, function (data) {
                console.log(data);
                if(data.etat === true){
                    location.reload();
                }
        },'json');
        /**/
        e.preventDefault();
    });

});