head.js({jQuery: directory+'/js/jquery-1.9.1.min.js'});

head.ready('jQuery', function(){
    head.js(
    	{ jqueryMigrate: directory+'/js/jquery-migrate-1.1.0.min.js' },
    	{ jQueryUI: 'http://code.jquery.com/ui/1.10.0/jquery-ui.js' },
    	{ contact: directory+'/js/contact.js' },
        { scrollpane: directory+'/js/jScrollPane/jquery.jscrollpane.min.js' },
        { scrollpaneMousewheel: directory+'/js/jScrollPane/jquery.mousewheel.js' },
        { fancybox: directory+'/js/fancybox/jquery.fancybox-1.3.4.pack.js' },
        { selectbox: directory+'/js/selectbox/jquery.sexy-combo.js' },
        { cycle: directory+'/js/jquery.cycle.all.latest.js' },
        { flexslider: directory+'/js/flexslider/jquery.flexslider.js' },
        { placeholder: directory+'/js/jquery.placeholder.js' },
        { validate: directory+'/js/validate/jquery.validate.min.js' },
        { messagesValidate: directory+'/js/validate/messages_es.js' },
        { numeric: directory+'/js/jquery.numeric/jquery.numeric.js' },
        { history: directory+'/js/ajax/jquery.history.js' },
        { ajax: directory+'/js/ajax/ajax.js' },
        { script: directory+'/js/screen.js' }
    );
});

