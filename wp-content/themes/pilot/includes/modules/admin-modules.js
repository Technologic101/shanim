
if(typeof jQuery!="undefined"){
	var $ = jQuery;
	jQuery(document).ready(function($) {
		$('body').on('click', '.acf-icon.-minus', function( e ){				
			return confirm("Delete this Module?");
		});
		$('.acf-flexible-content .layout').addClass('-collapsed');
			var $block_types = [];
			$('.values .layout').each( function(){
				var $block_type = $(this).data('layout');
				if( $('body').hasClass('toplevel_page_global-modules') ){
					var $title = $(this).find("[data-name='" + $block_type + "_title'] input").val();
				}
				else{
					if( $block_type == 'global_block' ){
						var $title = $(this).find( "select option:selected" ).text();
					}
					else{
						var $title = $(this).find("[data-name='" + $block_type + "_title'] input").val();
					}
				}
				var $handle = $(this).find('.acf-fc-layout-handle');
				if( $title ){
					var $content = $title;	
					$content = "<span class='minor-name'>" +  $handle.html() +" : </span><b>"+$content + "</b>";
					
				}
				else{
					var $content = $handle.html();
				}
				$handle.html( $content );
			});
	}); 
}