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
    
    $('.header__icon').click(function(e){
        e.preventDefault();
        $('body').toggleClass('side-menu');
    });

    /* Je veux pouvoir masquer le menu si on clique sur le cache */
    $('#site-cache').click(function(e){
        $('body').removeClass('side-menu');
    })
    
    /**
    $('.video').mouseenter(function(e){
        e.target.children[0].style.visibility='visible';
    });
    $('.video a').mouseleave(function(e){
        //console.log(e.target);
        e.target.style.visibility='hidden';
    });
    /**/
});