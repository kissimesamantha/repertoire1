var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  setTimeout( '_paq.push([\'trackEvent\', \'NoBounce\', \'Over 030 seconds\'])', 30000 );
  (function() {
    var u="//piwik.wabeo.fr/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();

  jQuery(document).ready(function($){
	var fixed = false;
	var tocfixed = false;
	var $body = $('body');
	function scrollWindow(e){
		if ( fixed && $(window).scrollTop() < 10 ) {
			$('body').removeClass('fixed');
			fixed = false;
		} else {
			if ( ! fixed && $(window).scrollTop() > 11 ) {
				$('body').addClass('fixed');
				fixed = true;
			}
		}
		if ( tocfixed && $(window).scrollTop() < 161 ) {
			$('body').removeClass('tocfixed');
			tocfixed = false;
		} else {
			if ( ! tocfixed && $(window).scrollTop() > 162 ) {
				$('body').addClass('tocfixed');
				tocfixed = true;
			}
		}
	}
	$(window).on('scroll',scrollWindow);
	scrollWindow();

	var fields = '.frm_form_field input[type="text"],\
		.frm_form_field input[type="url"],\
		.frm_form_field input[type="email"],\
		.frm_form_field input[type="tel"],\
		.frm_form_field select,\
		.frm_form_field textarea,\
		.login-form-p input[type="url"],\
		.login-form-p input[type="text"],\
		.login-form-p input[type="email"],\
		.login-form-p input[type="tel"],\
		.login-form-p input[type="password"],\
		.login-form-p textarea,\
		.login-form-p select,\
		.input-wrapper input,\
		.willy_comment_field input,\
		.willy_comment_field textarea,\
		.frm_form_field textarea';
	$( document ).on('keyup change', fields, function() {
		if ( $( this ).val() != '' ) {
			$( this ).addClass('not-empty');
		} else {
			$( this ).removeClass('not-empty');
		}
	});
	$( fields ).trigger('keyup');
	setTimeout( function() {
		$( fields ).trigger('keyup');
	},500);

	$(document).on('click','#go-top',function(){
		$('body, html').animate({ scrollTop: 0 }, 800);
	});
	$(document).on('click','#go-comments',function(){
		$('body, html').animate({ scrollTop: $('#commentaires').offset().top - 100 }, 800);
	});

	/**
	 * Ajax
	 */
	function getWindowHref( location ){
		return 'https://' + location.hostname + location.pathname;
	}

	var nouveau = true;
	var currentPage = getWindowHref( window.location );
    var actuallyLoading = false;
    setTimeout( function(){
        nouveau = false;
    }, 2000 );

	// Event listener on popstate
    window.addEventListener( 'popstate', function(e) {
        e.preventDefault();
		var windowUrl = getWindowHref(window.location);
        if ( nouveau == false && windowUrl != currentPage ) {
			currentPage = windowUrl;
            perform_ajax_request( windowUrl, true );
        }
    } );

	$( document ).on( 'click', 'a[href^="' + willyHome + '"]:not(.ab-item,.btn,.footnote,.utils,[href$="png"],[href$="jpg"],[href$="jpeg"])', do_ajax_request );
	function do_ajax_request(e){
		if ( e.shiftKey || e.ctrlKey || e.metaKey ) {} else {
			e.preventDefault();
			var url = $(this).attr('href');
			url = url.split(/#/)[0];
			if ( url != currentPage ) {
				currentPage = url;
				perform_ajax_request( url, false );
			}
		}
	}

	$( '<div class="temp" id="temp"/>' ).insertAfter('#main-wrapper');
	$canvas = $('#myCanvas');

    // Perform ajax
    function perform_ajax_request( url, old ) {
		if ( actuallyLoading ) {
			return false;
		}
		actuallyLoading = true;
        var jsonUrl = url.replace( willyHome + '/', '' ).replace( willyHome, '' );
            jsonUrl = jsonUrl.split('/');
            jsonUrl.splice( -1, 0, 'json/1');
            jsonUrl = willyHome + '/' + jsonUrl.join('/');
		$body.removeClass('nav-visible');
		setTimeout(function(){
			$body.removeClass('nav-accessible');
		},500);
        $.ajax({
            url:jsonUrl,
            method:'GET',
			async:false,
			dataType:'json',
        }).done(function(data){
            switchElements( data, url, old );
            //move perfromed ajax to waitForImages callback
        }).error(function(){
            actuallyLoading = false;
            nouveau = true;
            window.history.forward();
            setTimeout(function(){
                nouveau = false;
            },2000);
        });
    }

    function switchElements( data, url, old ) {
    	var $main = $('#main-wrapper');
    	var $temp = $('#temp');
    	$main.css({
    		height:$main.height(),
    	});
    	$('.will-out').addClass('out to-delete');
    	setTimeout(function(){
			// initialSide
			$('#menu-menu-haut-container').replaceWith( $( data.data.menu ) );
			willy_save_form();
			$temp.append($(data.data.contenu));
			$('body,html').animate({
	            scrollTop:0
	        }, 1000);
			if ( initialSide !== data.data.pos ) {
				initialSide = data.data.pos;
				paper.projects[0].view.emit('go',{dest:initialSide});
				$canvas.removeClass('down left right middle').addClass(data.data.pos);
				setTimeout(function(){
					$temp.find('.out').addClass('will-out').removeClass('out');
					$main.animate({
						height:$temp.innerHeight(),
					},750,function(){
						$main.css({height:'auto'});
						$temp.children().detach().appendTo('#main-wrapper');
					});
				},1000);
			} else {
				$temp.find('.out').addClass('will-out').removeClass('out');
				$main.animate({
					height:$temp.innerHeight(),
				},750,function(){
					$main.css({height:'auto'});
					$temp.children().detach().appendTo('#main-wrapper');
				});
			}
			ajaxPerformed(data,url,old);
	    },750);
    }

    function ajaxPerformed( data, url, old ) {
    	Prism.highlightAll();
    	var sommaire = new Sommaire();
            sommaire.init();
		$('.to-delete').remove();
        mcaAjaxChange();
        willy_switch_form();
		do_tabs();
		if ( data.data.title ) {
			document.title = $('<p>' + data.data.title + '</p>').text();
		}
		_paq.push(['setCustomUrl', url.replace('https://wabeo.fr','') ]);
		_paq.push(['setDocumentTitle', document.title ]);
		_paq.push(['trackPageView']);
        if( ! old ) {
            nouveau = false;
            history.pushState( url, data.title, url);
        }
		actuallyLoading = false;
    }

	function do_tabs() {
		$('.tabs dl:not(:first-of-type)').hide();
		$('.tabs a[data-group]').on('click',function(){
			$(this).parents('.tabs').find('dl').hide();
			var group = $(this).attr('data-group');
			$(group).show();
		});
	}
	do_tabs();

    function willy_save_form() {
    	if ( $('#willy-form').size() ) {
			var $frm_form_obj = $('#willy-form').children().detach();
			$frm_form_obj.appendTo('#hidden_forms');
		}
    }

    function willy_switch_form() {
		if ( $('#willy-form').size() ) {
			var $frm_form_obj = $('#hidden_forms').children().detach();
			$frm_form_obj.appendTo('#willy-form');
		}
    }

    willy_switch_form();

	function Sommaire() {

		// NEW
		this.sommaire = new Object();
		this.init = function() {
			if ( document.getElementById( 'toc' ) ) {
				this.sommaireMap();
				this.track();
				this.resize();
			}
		}

		this.sommaireMap = function () {
			this.sommaire.$sommaire = $( '#toc' );
			// Éléments
			var items = [];
			$.each( this.sommaire.$sommaire.find( 'a' ), function( i, el ){
				items.push( {
					element:$(el),
					ancre : $( el ).attr( 'href' ),
					top : $( el ).position().top,
					height : $( el ).outerHeight(),
					pos : i,
				} );
			} );
			this.sommaire.items = items;

			// Article Sections
			var sections = [];
			$( '.article-content-wrapper h2,\
			  .article-content-wrapper h3' ).each( function( i, el ) {
				sections.push( {
				ancre : $( el ).attr( 'id' ),
				top : $( el ).offset().top,
				} );
			} );
			for ( z in sections ) {
				var next = parseInt( z ) + 1;
				sections[z].bottom = typeof sections[ next ] !== 'undefined' ? sections[ next ].top : $('.article-content-wrapper').height() - 200;
			}
			this.sommaire.sections = sections;
		}

		this.track = function() {
			var self = this;
			$( window ).scroll( function() {
				scrollTop = $(window).scrollTop();
				scrollBottom = scrollTop + $(window).height();

				var last = self.sommaire.sections.length - 1;
				$.each( self.sommaire.sections, function( i, el ) {
					if ( scrollBottom > el.top && ( el.bottom - 100 ) > scrollTop ) {
						$(self.sommaire.items[ i ].element).addClass('current');
					} else {
						$(self.sommaire.items[ i ].element).removeClass('current');
					}

					if ( i == last && tocfixed ) {
						if ( scrollTop > el.bottom ) {
							$('body').addClass('tocout');
						} else {
							$('body').removeClass('tocout');
						}
					}
				});
		    } );
	  		$( window ).scroll();
		}

		this.resize = function() {
			var thing = this;
			$( window ).on( 'resize', function() {
				thing.sommaireMap();
				thing.track();
			} );
			$( window ).resize();
		}
	}

	var sommaire = new Sommaire();
	sommaire.init();

	/*	Smooth Scroll for TOC */
	$('body').on('click', '#toc a', function(e) {
		e.preventDefault();
		var anchor = $(this).attr('href');
		$('html,body').animate({scrollTop: $(anchor).offset().top-16}, 300);
	});

	/* Toogle menu responsive */
	function toggleMenu() {
		if ( $body.hasClass('nav-accessible') ) {
			$body.removeClass('nav-visible');
			setTimeout(function(){
				$body.removeClass('nav-accessible');
			},500);
		} else {
			$body.addClass('nav-accessible');
			setTimeout(function(){
				$body.addClass('nav-visible');
			},100);
		}
	}
	$(document).on('click', '#switch-menu', toggleMenu );

	function filterPortfolio() {
		var term = $(this).attr('data-term');
		$('.portfolio-item:not(.portfolio-term-' + term + ')').hide();
		$('.portfolio-item.portfolio-term-' + term).show();
	}
	$(document).on( 'click','.term-filter', filterPortfolio );

	function willyOpenPopup(e) {
		e.preventDefault();
		var imgUrl = $(this).attr('href');
		var popup = '<div class="popup-willy"><img src="' + imgUrl + '"></div>';
		$(popup).appendTo('body');
		return false;
	}
	$( document ).on( 'click', 'a[href$="png"],a[href$="jpg"],a[href$="jpeg"]', willyOpenPopup );

	function willyClosePopup() {
		$(this).remove();
	}
	$(document).on('click', '.popup-willy', willyClosePopup );

	var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
	n = 0;
	$(document).keydown(function (e) {
		if (e.keyCode === k[n++]) {
			if (n === k.length) {
				paper.projects[0].view.emit('glue');
				n = 0;
				return false;
			}
		}
		else {
			n = 0;
		}
	}); 
});
