/* =================================================
// jQuery Tabs Plugins 1.3
// author : chenmnkken@gmail.com
// Url: http://stylechen.com/jquery-tabs.html
// Data : 2012-09-06
// =================================================*/

;(function($){
	$.fn.Tabs = function(options){
		return this.each(function(){
			// 处理参数
			options = $.extend({
				event : 'mouseover',
				timeout : 0,
				auto : 0,
				callback : null,
				switchBtn : false
			}, options);
			
			var self = $(this),
				tabBox = self.children( 'div.tabCon' ).children( 'div' ),
				menu = self.children( 'div.tabNav' ),
				items = menu.find( 'li' ),
				timer;
					
			var tabHandle = function( elem ){
					elem.siblings( 'li' )
						.removeClass( 'cur' )
						.end()
						.addClass( 'cur' );
						
					tabBox.siblings( 'div' )
						.addClass( 'hide' )
						.end()
						.eq( elem.index() )
						.removeClass( 'hide' );
				},
					
				delay = function( elem, time ){
					time ? setTimeout(function(){ tabHandle( elem ); }, time) : tabHandle( elem );
				},
				
				start = function(){
					if( !options.auto ) return;
					timer = setInterval( autoRun, options.auto );
				},
				
				autoRun = function( isPrev ){
					var current = menu.find( 'li.cur' ),
						firstItem = items.eq(0),
						lastItem = items.eq(items.length - 1),
						len = items.length,
						index = current.index(),
						item, i;
					
					if( isPrev ){
						index -= 1;
						item = index === -1 ? lastItem : current.prev( 'li' );
					}
					else{
						index += 1;
						item = index === len ? firstItem : current.next( 'li' );
					}
					
					i = index === len ? 0 : index;
					
					current.removeClass( 'cur' );
					item.addClass( 'cur' );
					
					tabBox.siblings( 'div' )
						.addClass( 'hide' )
						.end()
						.eq(i)
						.removeClass( 'hide' );
						
					if( options.callback ){
						options.callback.call( self );
					}
				};
		
			items.bind( options.event, function(){
				delay( $(this), options.timeout );
				if( options.callback ){
					options.callback.call( self );
				}
			});
			
			if( options.auto ){
				start();
				self.hover(function(){
					clearInterval( timer );
					timer = undefined;
				},function(){
					start();
				});
			}
			
		});
	};
})(jQuery);