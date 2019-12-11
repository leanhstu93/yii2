var Main = function () {
    return Main.fn.init();
};

Main.fn = Main.prototype = {
    config: {
        selectorSelectorCallModalAdvisory : '.js__btn-advisory',
        selectorSliderTop : '.js__slider-top',
        selectorSliderThumb : '.js__gallery-thumbs',
        selectorCopyReceive : '.js__copy-receive',
        selectorInfoRegister: '.js__info-register',
        selectorInfoReceive: '.js__info-receive',
    },

    init: function () {
        this.handleModalAdvisory();
        this.initSlider();
        this.handleCopyReceive();
    },

    handleModalAdvisory: function() {
        var self = this;

        $(self.config.selectorSelectorCallModalAdvisory).click(function(){
            $("#js__modal-form-advisory").modal("show");
        });
    },
    initSlider :function() {
        const self = this;
        var thumb = new Swiper(self.config.selectorSliderThumb, {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        new Swiper(self.config.selectorSliderTop, {
            spaceBetween: 10,
            loop: true,
            loopedSlides: 5, //looped slides should be the same
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: thumb,
            },
        });
    },

    handleCopyReceive: function() {
        var self = this;

        $(self.config.selectorCopyReceive).click(function(e){
            e.preventDefault();
            console.log($(self.config.selectorInfoRegister + ' [name="Bill[fullname]"]').val());
            $(self.config.selectorInfoReceive + ' [name="Bill[receive_fullname]"]').val($(self.config.selectorInfoRegister + ' [name="Bill[fullname]"]').val());
            $(self.config.selectorInfoReceive + ' [name="Bill[receive_phone]"]').val($(self.config.selectorInfoRegister + ' [name="Bill[phone]"]').val());
            $(self.config.selectorInfoReceive + ' [name="Bill[receive_email]"]').val($(self.config.selectorInfoRegister + ' [name="Bill[email]"]').val());
            $(self.config.selectorInfoReceive + ' [name="Bill[receive_address]"]').val($(self.config.selectorInfoRegister + ' [name="Bill[address]"]').val());
        });
    }
}

var main = new Main();