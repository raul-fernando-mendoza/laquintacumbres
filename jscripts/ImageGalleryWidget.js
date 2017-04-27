$.widget( "mobile.mygallery", {
	options: {
		iconpos: "top",
		grid: null
	},
	$mygallery: null,
	_create: function() {
		$mygallery = this.element;
		if (window.console) console.log('mygallery_create():');

		
		var pageid = $mygallery.closest("[data-role=page]").first().attr("id");

		$( ":mobile-pagecontainer" ).on( "pagecontainershow", function( event, ui ) {
			if (ui.toPage[0].id = pageid){
				if (window.console) console.log( "pagecontainershow:" + ui.toPage[0].id + "event:" + event)
				if (window.console) console.log('pagecreate:' + pageid + "->" + $mygallery.attr("id") + ' w:' + $mygallery.closest(".swiper-container").width() + " h:" + $mygallery.closest(".swiper-container").height());

				var screenHeight = $.mobile.getScreenHeight();
				
				var headerHeight = 0;
				if( $mygallery.closest("div:jqmData(role='page')").find("h1:jqmData(role='myheader')").length > 0 ){
					headerHeight = $mygallery.closest("div:jqmData(role='page')").find("h1:jqmData(role='myheader')").first().outerHeight() + 2*12;
				}
				
				var toolbarHeight = 0
				if( $mygallery.closest("div:jqmData(role='page')").find("ul:jqmData(role='mynavbar')").length > 0 ){ 
					toolbarHeight = $mygallery.closest("div:jqmData(role='page')").find("ul:jqmData(role='mynavbar')").first().outerHeight() + 2*12;
				}
				
				var footerHeight = 0
				if( $mygallery.closest("div:jqmData(role='page')").find(".footer").length > 0 ){ 
					footerHeight = $mygallery.closest("div:jqmData(role='page')").find(".footer").first().outerHeight() + 4*16;
				}
				
				var height = screenHeight - headerHeight - toolbarHeight - footerHeight; 
				$mygallery.find(".swiper-slide").height(height);
			
				var swiper = new Swiper("#" + $mygallery.attr("id"), {
					pagination: '.swiper-pagination',
					paginationClickable: '.swiper-pagination',
					nextButton: '.swiper-button-next',
					prevButton: '.swiper-button-prev',
					spaceBetween: 30,
					effect: 'fade',
					autoplay: 10000,
					autoplayDisableOnInteraction: true        
				});		
		   	}
		});
	}
  
    ,_update: function() {
		if (window.console) console.log('mygallery._update');
	    		
    }
    // Externally callable method to force a refresh of the widget. 
    ,refresh: function() {
		if (window.console) console.log('mygallery.refresh');
      return this._update();
    }  
 
});
