$.widget( "mobile.myimage", {
	options: {
		iconpos: "top",
		grid: null
	},
	$mygallery: null,
	_create: function() {
		$mygallery = this.element;
		if (window.console) console.log('myimage_create():');

		
		var pageid = $mygallery.closest("[data-role=page]").first().attr("id");

		$( ":mobile-pagecontainer" ).on( "pagecontainershow", function( event, ui ) {
			if (ui.toPage[0].id = pageid){
				if (window.console) console.log( "pagecontainershow:" + ui.toPage[0].id + "event:" + event)
				if (window.console) console.log('pagecreate:' + pageid + "->" + $mygallery.attr("id") + " h:" + $mygallery.closest(".swiper-container").height());

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
				$mygallery.height(height);
			
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
