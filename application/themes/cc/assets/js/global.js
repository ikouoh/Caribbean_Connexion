$(document).ready(function () {
    var base_url = $('#base_url').val();

    $("a[rel^='prettyPhoto']").on('click',function(){
            var clipid = $(this).data('clipid');
            $('#clipid').val(clipid);
            //$('.pp_deadLink').attr('clip_id').val(clipid);
    });


    $("a[rel^='prettyPhoto']").prettyPhoto({
            changepicturecallback:function(){
                    var clipid = $('#clipid').val();
                    $('a.pp_deadLink').bind('click',function(){
                            //APPEL AJAX COMPTEUR VUE CLIP
                            $.post(base_url + "ajax/LienMort", {
                    clipid:clipid
                }, function (data) {
                    if(data.etat == true){
                        //fermeture de PrettyPhoto
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


    $('.pp_social').on('click','.pp_deadLink',function(){
            var clipid = $('#clipid').val();
            console.log(clipid);
            /*
            //APPEL AJAX COMPTEUR VUE CLIP
            $.post(base_url + "ajax/LienMort", {
            clipid:clipid
        }, function (data) {
            console.log('dans fonction ' + clipid);
            if(data.etat == true){
                //fermeture de PrettyPhoto
                $.prettyPhoto.close();
                //message de remerciement

            }
        },'json');
            */
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

});