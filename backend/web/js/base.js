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
    },
    init: function () {
        this.handleSelectImage();
        this.autoSlugEvent();
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
		    var str = $(cataname_id).val();
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
	        if ($(self.config.selectToggleGetAlias).prop('checked'))
	            self.JS_bodau_tv(self.config.selectTitleValue, self.config.selectAliasValue, 0);
	    });
	}
};

var base = new Base();