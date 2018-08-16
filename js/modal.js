var icms = icms || {};

icms.modal = (function ($) {

    this.ModalProcess = function (parameters) {
        this.id = parameters['id'] || 'modal';
        this.selector = parameters['selector'] || '';
        this.title = parameters['title'] || 'Заголовок модального окна';
        this.body = parameters['body'] || 'Содержимое модального окна';
        this.footer = parameters['footer'] || '<button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>';
        this.content = '<div class="modal fade" id="' + this.id + '" tabindex="-1" role="dialog">' +
                '<div class="modal-dialog" role="document">' +
                '<div class="modal-content">' +
                '<div class="modal-header">' +
                '<h5 class="modal-title">' + this.title + '</h5>' +
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '</div>' +
                '<div class="modal-body">' + this.body + '</div>' +
                '<div class="modal-footer">' + this.footer + '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
        
    };
    this.init = function () {
        if ($('#' + this.id).length === 0) {
            $('body').prepend(this.content);
        }
        if (this.selector) {
            $(document).on('click', this.selector, $.proxy(this.showModal, this));
        }
    }
    this.changeTitle = function (content) {
        $('#' + this.id + ' .modal-title').html(content);
    };
    this.changeBody = function (content) {
        $('#' + this.id + ' .modal-body').html(content);
    };
    this.changeFooter = function (content) {
        $('#' + this.id + ' .modal-footer').html(content);
    };
    this.showModal = function () {
        $('#' + this.id).modal('show');
    };
    this.hideModal = function () {
        $('#' + this.id).modal('hide');
    };
    this.updateModal = function () {
        $('#' + this.id).modal('handleUpdate');
    };

    /*комплексные методы*/
    this.showPhoto = function (url, title) {
        icms.modal.ModalProcess({
            id: 'myModal',
            title: title,
            body: '<img src="' + url + '" title="' + title + '" />'
        });
        
        //console.log(icms.modal.body);return false;
        
        icms.modal.init();
        icms.modal.showModal();
    };
    
    return this;

}).call(icms.modal || {}, jQuery);

/*обработка*/
$(function () {
    $('.ajax-modal').click((function (e) {
        e.preventDefault();
        
//        console.log(icms.modal);return false;
        
        var url = $(this).attr('href');
        var title = $(this).attr('title');
        /*разберем url*/
        if (url.search('/.+(jpg|gif|png)$/')) {
            icms.modal.showPhoto(url, title);
        }
    }));
})
