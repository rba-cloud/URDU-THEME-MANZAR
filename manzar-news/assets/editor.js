/* Native editor representations for server-rendered presentation blocks. */
(function (blocks, element, editor, i18n) {
    'use strict';
    var el = element.createElement;
    [
        ['current-date', i18n.__('Current newspaper date', 'manzar-news'), 'calendar-alt', 'آج کی تاریخ — سائٹ کے مقامی وقت کے مطابق'],
        ['share-links', i18n.__('Article sharing links', 'manzar-news'), 'share', 'خبر شیئر کریں · Facebook · WhatsApp · Email']
    ].forEach(function (item) {
        blocks.registerBlockType('manzar-news/' + item[0], {
            apiVersion: 3, title: item[1], icon: item[2], category: 'theme',
            supports: {html: false},
            edit: function () { return el('p', editor.useBlockProps(), item[3]); },
            save: function () { return null; }
        });
    });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor, window.wp.i18n);
