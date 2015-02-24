$(function() {
	
	var isMovingImages = false;
	var movingToward;
	const LEFT = "left";
	const RIGHT = "right";
	const UP = "up";
	const DOWN = "down";
	
	var dom ={};
	
	var work = $('#work');
	var workLi = work.find('li');
	
	// 画像位置・スライダーの初期化
	initPositoin();
	
	// ウインドウリサイズ時に画像位置・スライダーを再設定
	$(window).resize(function(){
		initPositoin();
	});
	
    // 画像ロールオーバー/ロールアウトの設定
	var mouseover = function() {
		work.find('.active .info').fadeIn(200);
	};
	var mouseout = function() {
		work.find('.active .info').fadeOut(200);
		
	};
	// hoverの設定
	function setHover() {
		$('#work .active a').hover(mouseover, mouseout);
	}
	setHover();
	
	// #workのmargin-leftを取得
	var offset = parseInt(work.css('margin-left'));
	
	// 画像クリック時
	work.find('li').click(function(){
		//aリンクの動作を停止
	 	event.preventDefault();
		// 自分以外をクリックした場合、移動する
		if(!$(this).hasClass('active')) {
			moveImages($(this), work);
			moveSliderHandle($(this));
		} else {
			//自分をクリックした場合、詳細ビューに遷移
			openDetails($(this));
		}
	});
	
	// 画像リストの幅・スライダーの設定
	function initPositoin () {
		
		// 画像リストの初期位置を設定
		work.css("margin-left", -(work.find('li').width()/2));
		// 画像リストの幅を設定
		work.css("width", (work.find('li').width() + parseInt(work.find('li').css("margin-right"))) * work.find('li').length);
		
		// スライダー可動範囲の幅を設定
		$("#slider").css("width", "50%");
		
		//画像リストの長さを取得
		var workImgsWidth = work.find('ul').width();
		var sliderWidth = parseInt($("#slider").width());
		var steps = workLi.length;
		
		// スライダーハンドルの長さをウインドウに合わせて可変に
		var handleWidth = sliderWidth * ($(window).width()/workImgsWidth);
		// スライダー可動範囲の幅を設定
		$("#slider").css("margin-left", (($(window).width() - $('header').width() - parseInt($("#slider").width())) /2) - handleWidth / 2 );
		// スライダー背景の長さを設定 (スライダーの可動範囲 + ハンドルの長さ + パディング1px)
		var sliderTrackWidth = sliderWidth + handleWidth + 1;
		$("#slider-track").css("width", sliderTrackWidth);
	
		// スライダーの初期設定
		$("#slider").slider({
			animate:'fast',
			min:0,
			max:(steps-1),
			step:1,
			slide:function(event, ui) {
				//画像リストの位置を更新する
				var element = workLi.filter(':eq(' + ui.value + ')');
				element.trigger('click');
			}
		});
		// スライダーハンドルの幅を設定
		$(".ui-slider-handle").css("width", handleWidth);
	}
	
	// 画像位置を設定する
	function moveImages (element, target) {

		var prevList = element.prevAll();
		// クリックした画像がactive画像から何個目かを算出する
		var clickNumber = Math.abs(prevList.length - target.find('.active').prevAll().length);
		var clickLaterImg = prevList.hasClass('active');
		// info要素を非表示にする
		target.find('.active .info').hide();
		$('#work .active a').unbind("mouseenter").unbind("mouseleave");
		// activeクラスの削除、追加
		target.find('.active').removeClass('active');
        element.addClass('active');
		setHover();
		var add;
		if (target==work) {
			
			//画像一覧ビューの場合
			if(!isMovingImages) {
				if(clickLaterImg) {
					movingToward=LEFT;
				}else {
					movingToward=RIGHT;
				}
			}
			add = parseInt(element.width()) + parseInt(element.css("margin-right"));
			
			if(movingToward === LEFT){
				offset -= add*clickNumber;
			} else {
				offset += add*clickNumber;
			}
			
			target.stop().animate({'margin-left':offset},300,"easeOutCirc",function(){
				isMovingImages = false;
			});
		} else {
			
			//画像詳細ビューの場合
			if(!isMovingImages) {
				if(clickLaterImg) {
					movingToward=UP;
				}else {
					movingToward=DOWN;
				}
			}
			add = parseInt(element.height()) + parseInt(element.css("margin-bottom"));
			var offsetDetails = parseInt($('#details').css('margin-top'));
			
			if(movingToward === UP){
				offsetDetails -= add*clickNumber;
			} else {
				offsetDetails += add*clickNumber;
			}
			
			target.stop().animate({'margin-top':offsetDetails},300,"easeOutCirc",function(){
				isMovingImages = false;
			});
		}
	}
	
	// スライダーハンドルの位置を設定する
	function moveSliderHandle (element) {
		$("#slider").slider( "option", "value", workLi.index(element));
	}
	
	// 詳細ビューを開く
	function openDetails(element) {
		isMovingImages = false;
		// info要素を非表示にする
		work.find('.active .info').hide();
		// オーバーレイを設定し、クリックイベントを登録する
		var overlay = $('<div id="overlay"></div>').bind("click", function(){closeDetails()});
		overlay.css('opacity', 0).stop().animate({'opacity': .8}, 200);
		$(document.body).append(overlay);
		
		// 詳細画像一覧を表示する
		var details = $('div #details');
		details.empty().css('opacity', 0).removeClass('hide');
		// 画像リストを取得する
		var prevList = element.prevAll();
		var clickNumber = Math.abs(prevList.length - element.find('.active').prevAll().length);
		var linkUrl = element.find("a").attr('href') + '_' + (clickNumber + 1) + '.html';
		if(typeof linkUrl !== "undefined") {
			details.load(linkUrl+' div.imgList', function(){
				//詳細画像クリック時
				details.find('li').click(function(){
					//aリンクの動作を停止
					/*event.preventDefault();*/
					// 自分以外をクリックした場合、移動する
					if(!$(this).hasClass('active')) {
						moveImages($(this), details);
					}/* else {
						//自分をクリックした場合
					}*/
				});
			});
			details.css('opacity', 1);
		} else {
			details.addClass('hide');
		}
		overlay.bind("click", function(){closeDetails()});
		
	}
	
	// 詳細ビューを閉じる
	function closeDetails() {
		isMovingImages = false;
		
		// 詳細画像一覧を非表示にする
		$('div #details').addClass('hide');
		// オーバーレイを削除する
		var overlay = $('#overlay');
		overlay.remove();

	}
	
	// スクロール時
	$(document).mousewheel(function(event, delta) {
		if ($('#overlay').size()>0) {
			// 下方向にスクロール時は上に移動、上方向にスクロール時は下に移動
			(delta>0) ? triggerClickImage(DOWN, true) : triggerClickImage(UP, true);
		} else {
			// 下方向にスクロール時は左に移動、上方向にスクロール時は右に移動
			(delta>0) ? triggerClickImage(RIGHT, true) : triggerClickImage(LEFT, true);
		}
	});
	// スクロール時イベントハンドラ
	function triggerClickImage(direction, mousewheel) {
		
		// スクロール中かつ画像移動中は実行しない
		if(mousewheel&&isMovingImages) return true;
		isMovingImages = true;
		
		// 左方向に画像移動時はactiveの次の要素、右方向に移動時は前の要素でクリックイベント実行
		movingToward = direction;
		var active;
		
		if ($('#overlay').size()>0) {
			var details = $('div #details');
			active = details.find('.active');
		} else {
			active = work.find('.active');
		}
		
		var next = (movingToward === LEFT || movingToward === UP) ? active.next() : active.prev();
		
		if(next.length==0) {
			isMovingImages = false;
			return true;
		}
		next.trigger('click');
	}
});
