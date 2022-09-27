$(document).ready(() => {
    const luckyNumberTicketsCountSpan = $("#luckyNumberTicketsCount");
    const minNumberInput = $("#minNumber");
    const maxNumberInput = $("#maxNumber");
    const spinner = $("#spinner");
    const errorList = $("#error");

    minNumberInput.change(() => {
        if (minNumberInput.val() > maxNumberInput.val()) {
            maxNumberInput.val(minNumberInput.val());
        }
    });

    maxNumberInput.change(() => {
        if (maxNumberInput.val() < minNumberInput.val()) {
            maxNumberInput.val(minNumberInput.val());
        }
    });

    $("#luckyNumberForm").submit((e) => {
        e.preventDefault();
        errorList.html("");
        spinner.show();

        $.ajax('script.php', {
            data: {
                first: minNumberInput.val(),
                end: maxNumberInput.val(),
            },
            success: (data) => {
                luckyNumberTicketsCountSpan.html(data.luckyNumberTicketsCount || "XXXXXX");
            },
            error: (xhr, opt, error) => {
                const errors = JSON.parse(xhr.responseText).errors;
                errors.forEach((errorText) => {
                    errorList.append('<li>'+(errorText || error)+'</li>');
                });
            },
            complete: () => {
                spinner.hide();
            }
        })
    });
})