var simpleTweets = (function ($) {
	
	var twitterURL = '/wp-content/themes/hohoto-2013/library/twitter-proxy/',
		defaults = {
			username: 'hohoto'
		},
		container;
	
	return {
		draw: function ( tweets ) {
			var i, n = tweets.length,
				tweet, html = [],
				picture = null;

			for( i = 0; tweet = tweets[i], i < n; i++ ) {	

				if ( tweet.entities && tweet.entities.media && tweet.entities.media.length > 0 ) {
					picture = tweet.entities.media[0].media_url;
				}

				html[html.length] = '\
					<li>\
						<p>'+twttr.txt.autoLink(tweet.text, { usernameIncludeSymbol: true })+'</p>\
						'+( picture ? '<a class="user-image" href="'+tweet.entities.media[0].expanded_url+'"><img src="'+picture+'" width="228" /></a>' : '' )+'\
						<p class="from-now">'+moment(new Date(tweet.created_at)).fromNow()+'</p>\
					</li>';

				picture = null;
			}
			
			container.html( html.join('') );

			container.find('li:odd').addClass('odd-row')
		},

		init: function ( options ) {

			this.options = $.extend( {}, defaults, options) ;

			var self = this;

			if ( this.options.$el ) {
				this.$el = this.options.$el;
			} else {
				this.$el = $('.twitter-feed ul');
			}

			container = this.$el;
			
			if ( typeof(settings) === 'undefined' ) {
				
				settings = {
					include_entities: true,
					include_rts: true,
					screen_name: this.options.username,
					count: this.options.count
				};
				
			}
			
			$.ajax({
				url: twitterURL,
				data: {
					screen_name: this.options.screen_name,
					count: this.options.count
				},
				dataType: 'json',
				success: function( tweets ) {
					
					self.draw( tweets );
				},
				failure: function() {
					drawError();
				}
			});
		}
	};
	
}(jQuery));