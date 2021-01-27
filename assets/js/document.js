function DocumentWidget(documentGridId, urlForAjax, options) {
    this.documentGridId = documentGridId;
    this.urlForAjax = urlForAjax;
    this.options = options;

    var self = this;

    this.init = function () {
        self.defaultInit();

        $('.clickable-row').click(function () {
            self.rememberDocumentRow(this)
            self.showDocumentImage(this);
        });
    };

    this.showDocumentImage = function (rowSelector) {
        var documentId = $(rowSelector).attr('data-key');

        $.ajax({
            url: self.urlForAjax,
            data: {id: documentId},
            success: function (data) {
                if (data.url) {
                    var imageOptions = $.map(self.options.documentImage, function (value, index) {
                        return index + "=" + value;
                    });

                    $(self.options.imageContainer).html(
                        '<a href="' + data.url + '"><img ' + imageOptions.join(' ') + ' src="' + data.url + '"></img></a>'
                    );
                }

                $(self.options.imageContainer).html(data.error);
            }
        });
    };

    this.rememberDocumentRow = function (rowSelector) {
        localStorage.setItem('rowDataKey', $(rowSelector).attr('data-key'));
    };

    this.defaultInit = function () {
        var rowDataKey = localStorage.getItem('rowDataKey');

        if (!rowDataKey) {
            $(documentGridId + ' .clickable-row:first').addClass('active');
            self.showDocumentImage(documentGridId + ' .clickable-row:first');
        }

        $(documentGridId + ' .clickable-row[data-key = "' + rowDataKey + '"]').addClass('active');
        self.showDocumentImage(documentGridId + ' .clickable-row[data-key="' + rowDataKey + '"]');
    };
}
