(function () {
    let forms = $('.needs-validation');

    let isValid = true;

    $('.add-element-btn').click(function () {
        let length_input = $('input[name="array-length"]');
        let count = length_input.val();
        let newElement = '<div class="col-6 row">' +
            '<label for="element-' + count + '" class="col-sm-2 col-form-label">' + (parseInt(count) + 1) + ': </label>' +
            '<input type="text" class="col-sm form-control" id="element-' + count + '" placeholder="a[' + count + ']" name="element-'+count+'" required>' +
            '</div>';
        let group = $('.elements-group');
        $(group).append(newElement);
        let input = $(group).children().last().find('input');
        $(input).keyup(function () {
            validateElement($(this), isCorrectElement);
        });
        length_input.val(parseInt(count) + 1);
    });

    $('.remove-element-btn').click(function () {
        let length_input = $('input[name="array-length"]');
        let count = parseInt(length_input.val());
        if (count > 1) {
            $('.elements-group').children().last().remove();
            length_input.val(count- 1);
        }
    });

    forms.each(function () {
        let inputs = $(this).find('input,textarea,select');
        let element = $(inputs).filter('[name*="element"]');
        this.addEventListener('submit', function(event) {
            isValid = true;
            let inputs = $(this).find('input,textarea,select');
            let element = $(inputs).filter('[name*="element"]');

            element.map(function () {
                validateElement($(this), isCorrectElement);
            });

            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
            }
        }, false);
        $(element).keyup(function () {
            validateElement($(this), isCorrectElement);
        });
    });

    function validateElement(element, method) {
        let isEmpty = $(element).val() === '';
        let isRequired = $(element).prop('required');
        let elemValue = $(element).val();
        if (!isRequired && isEmpty) {
            removeStats(element);
        } else if (isEmpty || !method(elemValue)) {
            isValid = false;
            setInvalid($(element));
        } else {
            setValid($(element))
        }
    }

    function removeStats(element) {
        element.removeClass('is-valid').removeClass('is-invalid');
    }

    function setValid(element) {
        element.addClass('is-valid').removeClass('is-invalid');
    }

    function setInvalid(element) {
        element.addClass('is-invalid').removeClass('is-valid');
    }

    function isCorrectElement(number) {
        let s = number.replace(',', '.');
        let parseS = parseFloat(s);
        return parseS >= -1000000 && parseS <= 1000000 && /^-?[0-9]+(.[0-9]+)?$/.test(s);
    }
})();