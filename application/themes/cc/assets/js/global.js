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
                if(confirm("Confirmez que ce lien est mort") ){
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
                }
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


});