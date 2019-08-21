var Base = function () {
    return Base.fn.init();
};

Base.fn = Base.prototype = {
    config: {
        selectorSelectImage : '.js__select-image',
        selectorImageValue : '.js__image-value',
        selectImagePreview : '.js__image-preview',
        selectTitleValue : '.js__title',
        selectAliasValue : '.js__alias',
        selectToggleGetAlias : '.js__toggle-auto-get-alias',
		selectorSideBar: '.js__sidebar',
		selectorSideBarItem: '.js__sidebar-item',
		selectorSelectSumo: '.js__init-select-sumo',
		selectorSelectMultiple: '.js__init-select-multiple',
		selectorSortAble: '.js__init-sort-able',
		classNotEdit : 'Ta_js-not-edit',
		selectorDataMenu : '.Ta_js-data-menu',
		selectorNavItem : '.js-nav-item',
		classNavItem : 'js-nav-item',
		classTabLangDefault: 'js-tab-language-',
		selectorTabLang: '.js-tab-language',
		selectorBtnSubmit: '.js-submit',
		selectorHasError: '.has-error',
		classNavItem: 'js-nav-item',
		selectorForm:'.js-form'
    },
    init: function () {
        this.handleSelectImage();
        this.autoSlugEvent();
        this.handleActiveSideBar();
		this.initSumoSlect();
		this.initSelectMultiple();
		this.initSortAble();
		this.checkSave();
		this.handleListLanguage();
		this.initTabLang();
		this.handleBtnSubmit();
    },

	initSelectMultiple: function() {
		$(this.config.selectorSelectMultiple).selectpicker('show');
	},

	initSumoSlect: function() {
    	var self = this;
		$(self.config.selectorSelectSumo).SumoSelect({placeholder: 'Nhập danh mục ...', csvDispCount: 3 });
	},

    handleSelectImage : function () {
        var self = this;
        $(this.config.selectorSelectImage).click(function(e){
            var self_click = $(this);
            e.preventDefault();
            CKFinder.popup({basePath:"http://"+window.location.host+"/filemanager",selectActionFunction:function (url) {
                    self_click.parent().find(self.config.selectorImageValue).val(url);
                    self_click.parent().find(self.config.selectImagePreview).attr('src',url);
                }
            });
        });
    },
    JS_bodau_tv: function (cataname_id, seo_name, id)
		{
		    var str = cataname_id.val();
		    str = str.toLowerCase();
		    str = str.trim();
		    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
		    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
		    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
		    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
		    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
		    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
		    str = str.replace(/đ/g,"d");
		    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
		    str = str.replace(/-+-/g,"-");
		    str = str.replace(/^\-+|\-+$/g,"");
		    if(typeof id === "undefined" || id == '' || id == 0) $(seo_name).val(str);
		},
    autoSlugEvent: function () {
    	var self = this;
	    if ($(self.config.selectAliasValue).val() == '')
	    {
	        $(self.config.selectAliasValue).attr('readonly', 'readonly');
	        $(self.config.selectToggleGetAlias).attr('checked', 'checked');
	    }

	    $(self.config.selectToggleGetAlias).on('change', function () {
	        if ($(this).prop('checked')) {
	            self.JS_bodau_tv(self.config.selectTitleValue, self.config.selectAliasValue, 0);
	            $(self.config.selectAliasValue).attr('readonly', 'readonly');
	        } else {
	            $(self.config.selectAliasValue).removeAttr('readonly');
	        }
	    });

	    $(self.config.selectTitleValue).on('input ', function () {
	        if ($(self.config.selectToggleGetAlias).prop('checked')) {
	        	console.log($(this).parent().parent().find(self.config.selectAliasValue).length);
				self.JS_bodau_tv($(this), $(this).parent().parent().find(self.config.selectAliasValue), 0);
			}
	    });
	},

	handleActiveSideBar: function () {
    	var self = this;
		$('body').scrollspy({target: self.config.selectorSideBar, offset: 100});
		$(self.config.selectorSideBarItem).click(function(a) {
			var i = $(this).data("link");
			if ("" != i) {
				var t = $("#" + i).offset().top - 67;
				$(window).width() <= 1190 && (t += 7), $("html, body").animate({
					scrollTop: t
				}, 500)
			}
		})
	},

	initSortAble : function () {
		var self = this;

		var group = $(self.config.selectorSortAble).sortable({
			group: 'shared',
			animation: 150,
			pullPlaceholder: false,
			// animation on drop
			onDrop: function  ($item, container, _super) {
				var data = group.sortable("serialize").get();
				var result = JSON.stringify(data[0]);
				$(self.config.selectorSortAble).addClass(self.config.classNotEdit);
				$(self.config.selectorDataMenu).val(result);
				var $clonedItem = $('<li/>').css({height: 0});
				$item.before($clonedItem);
				$clonedItem.animate({'height': $item.height()});

				$item.animate($clonedItem.position(), function  () {
					$clonedItem.detach();
					_super($item, container);
				});
			},

			// set $item relative to cursor position
			onDragStart: function ($item, container, _super) {
				var offset = $item.offset(),
					pointer = container.rootGroup.pointer;

				adjustment = {
					left: pointer.left - offset.left,
					top: pointer.top - offset.top
				};

				_super($item, container);
			},
			onDrag: function ($item, position) {
				$item.css({
					left: position.left - adjustment.left,
					top: position.top - adjustment.top
				});
			}
		});
	},

	checkSave : function() {
		var self  = this;
		$(self.config.selectorEditName).click(function(){
			var has = $(self.config.selectorSortAble).hasClass(self.config.classNotEdit);

			if(has == true) {
				alert('Vui lòng cập nhật trước khi thực hiện thao tác này!');
				return false;
			} else {
				return true;
			}

		});
	},

	handleListLanguage: function() {
		var self = this;

		$(self.config.selectorNavItem).click(function(){
			$(self.config.selectorNavItem).removeClass('active');
			$(this).addClass('active');
			self.initTabLang();
		});
	},

	initTabLang: function()
	{
		var self = this;

		var code = $("."+self.config.classNavItem + '.active').data('code');
		$(self.config.selectorTabLang).hide();
		$("."+self.config.classTabLangDefault + code).show();
	},

	handleBtnSubmit: function()
	{
		var self = this;
		console.log($(self.config.selectorForm).length);
		$("#w1").on('afterValidate', function(e){
			var code = $(this).find(self.config.selectorHasError).closest(self.config.selectorTabLang).data('code');

			if( typeof(code) != 'undefined') {
				console.log(989);
				$(self.config.selectorTabLang).hide();
				$("." + self.config.classTabLangDefault + code).show();
				console.log($("." + self.config.classTabLangDefault + code).length);
				$(self.config.selectorNavItem).removeClass('active');
				$("." + self.config.classNavItem + "-" + code).addClass('active');
			}
		});
	}
};

var base = new Base();