jQuery(function(r) {
    r(".ciar_loadmore").click(function() {
        var e = r(this),
            a = {
                action: "loadmore",
                query: ciar_loadmore_params.posts,
                page: ciar_loadmore_params.current_page
            };
        r.ajax({
            url: ciar_loadmore_params.ajaxurl,
            data: a,
            type: "POST",
            beforeSend: function(a) {
                e.text("Carregando...")
            },
            success: function(a) {
                a ? (e.text("Carregar mais!").before(a), ciar_loadmore_params.current_page++, ciar_loadmore_params.current_page == ciar_loadmore_params.max_page && e.remove()) : e.remove()
            }
        })
    })
});