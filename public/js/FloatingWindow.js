export default class FloatingWindow {
    constructor(parent = $("body")) {
        // Floating window will float below the parent element
        this.parent = parent;

        // We take advantage of the jQuery UI datepicker widget properties
        // to create a floating window that can be opened and closed
        this.parent.datepicker();

        // We store the event listeners of the floating window in a buffer because
        // every time the datepicker widget is opened, the content is emptied, so we
        // have to attach the event listeners again

        // Note: append() helps us to keep the event listeners, but empty() makes
        // this impossible, so we have to store the event listeners in a buffer
        this.eventsBuffer = [];

        // We create a virtual DOM to store the content of the floating window
        // and we attach it to the datepicker widget when it is opened
        this.virtualDOM = $("<div>Content</div>");
        this.parent.on('click', () => {
            // Using append() instead of html() because it's faster and we don't duplicate the content
            // Using empty() because we don't want to see the datepicker widget
            $('.ui-datepicker').empty().append(this.virtualDOM).addClass('floating-window');

            // We attach the event listeners that we stored in the buffer
            this.eventsBuffer.forEach(({ event, selector, callback }) => {
                $('.ui-datepicker').find(selector).on(event, callback);
            });
        });
    }

    setValue(newValue) {
        this.parent.val(newValue);
        this.parent.trigger("change");
    }

    getValue() {
        return this.parent.val();
    }

    // When changing the content of the floating window, we can't change
    // it directly because we have to wait for the datepicker widget to
    // be opened. So we store the content in a virtual DOM meanwhile
    setContent(content) {
        this.virtualDOM.html(content);
    }

    // We store the event listeners in a buffer, and will be loaded when
    // the floating window is opened
    event(event, selector, callback) {
        this.eventsBuffer.push({ event, selector, callback });
    }

    // We use the virtual DOM to find elements inside the floating window
    $(selector) {
        return this.virtualDOM.find(selector);
    }
}