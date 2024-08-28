$.widget( "mobile.mynavbar", {
	options: {
		iconpos: "top",
		grid: null
	},

	_create: function() {
		
		var $navbar = this.element;
		if (window.console) console.log('mynavbar_create():' + $navbar.attr("id") + ' w:' + $navbar.closest(".scrollwrapper").width() + " h:" + $navbar.closest(".scrollwrapper").height());
		var navbarid = $navbar.attr("id");
		
		var wrapper = $navbar.closest(".scrollwrapper").get(0);
		var pageid =  $navbar.closest("[data-role=page]").first().attr("id");
		
		$(document).on("pagecreate", "#" + pageid, function (event) {
			if (window.console) console.log('pagecreate:' + pageid + "->" + navbarid + ' w:' + $navbar.closest(".scrollwrapper").width() + " h:" + $navbar.closest(".scrollwrapper").height());
			
		    setTimeout(function () {
		        myScroll = new IScroll(
		        	wrapper, 
		        	{ scrollX: true, 
		        	scrollY: false, 
		        	bounce: false, 
		        	click:true,
		        	bounceEasing: 'elastic',
		            bounceTime: 1200 
		        });
		/*
		        document.addEventListener('touchmove', function (e) {
		            e.preventDefault();
		        }, false);
		*/		
		
		    }, 20);
			
		    setTimeout(function () {
		    	$navbar.mynavbar("refresh");
		    },21);

		});


		$( window ).resize(function() {
			if (window.console) console.log('resize:' + $navbar.attr("id") + ' w:' + $navbar.closest(".scrollwrapper").width() + " h:" + $navbar.closest(".scrollwrapper").height() );
			$navbar.mynavbar("refresh");
		});


 /*   
		$( ":mobile-pagecontainer" ).on( "pagecontainershow", function( event, ui ) {
			if (ui.toPage[0].id = pageid){
				if (window.console) console.log( "pagecontainershow:" + ui.toPage[0].id + "event:" + event)
		   		$navbar.mynavbar("refresh");	
		   	}
		});

*/
	}
  
    ,_update: function() {
      
      var $navbar = this.element;
      if (window.console) console.log('mynavbar_update():' + $navbar.attr("id") + ' w:' + $navbar.closest(".scrollwrapper").width() + " h:" + $navbar.closest(".scrollwrapper").height());
      
      $navbar.enhanceWithin();
	  $navbar.find("li").children('a').show();
		if( $navbar.find( "li" ).length > 0 &&
		    ($navbar.find( "li" ).last().position().left + $navbar.find( "li" ).last().width()) > $navbar.closest(".scrollwrapper").width() ){
			if (window.console) console.log('hidding headers():' + $navbar.attr("id"));
			$navbar.find("li").children("a:not([data-role='button'])").hide();
		}
		
	  	return true;
    }
    // Externally callable method to force a refresh of the widget. 
    ,refresh: function() {
		var $navbar = this.element;
		
		if (window.console) console.log('mynavbar_refresh():' + $navbar.attr("id") + ' w:' + $navbar.closest(".scrollwrapper").width() + " h:" + $navbar.closest(".scrollwrapper").height());
		return this._update();
    }  
 
});
