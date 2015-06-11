$(function() {
	 // ativar modal 
	 $('.modal-trigger').leanModal();

	 // campo de pesquisa paginas internas
	 $('.menu-standard .search').click(function(){
	 	// remover campo de pesquisa
	 	if($('.search-standard').css('display') == 'block') {
	 		$('.search-standard').fadeTo( "slow", 0.33 ).slideUp();
	 		$('.menu-standard .search-open').removeClass('search-open');	
	 		// adicionar campo de pesquisa
	 	} else{
	 		$('.search-standard').animate({"opacity": 1}).fadeIn("slow").slideDown();
	 		$('.menu-standard .search').addClass('search-open');	
	 	};
	 });
	 
	 // imagem random bg pagina inicial ativar modo responsivo
	$(function() {
    	var images = ['bg2.png', 'riven.jpg', 'ekko.jpg', 'anri.jpg'];
    	$('.bg-search').css({'background-image': 'url(assets/img/bg/' + images[Math.floor(Math.random() * images.length)] + ')'});
   	});
});
