export default class FloatingWindow {
    constructor(parent) {
        this.parent = parent;
        // We take advantage of the jQuery UI datepicker widget properties
        // to create a floating window that can be opened and closed
        this.parent.datepicker();

        // We create a virtual DOM to store the content of the floating window
        // and we attach it to the datepicker widget when it is opened
        this.virtualDOM = $("<div>Content</div>");
        this.parent.on('click', () => {
            // Using append() instead of html() because we want to keep the
            // event listeners attached to the virtual DOM.
            // Using empty() because we don't want to see the datepicker widget
            $('.ui-datepicker').empty().append(this.virtualDOM).addClass('floating-window');
            console.log(this.virtualDOM.html());
        });

        this.parent.datepicker("option", "onClose", () => {
            console.log(this.virtualDOM.html());
        });
    }

    setValue(newValue) {
        this.parent.val(newValue);
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

    // We can use the virtual DOM to find elements inside the floating window
    // and attach event listeners to them or manipulate them as we want
    $(selector) {
        return this.virtualDOM.find(selector);
    }
}