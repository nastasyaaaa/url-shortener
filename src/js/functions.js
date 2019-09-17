import {rules} from "./validation";
import {rulesMessages} from "./validation";

export const functions = {

    makeRequest: function (url, method, body) {

        return fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(body),
        }).then(response => response.json());
    },

    showResult: function (response) {
        const resultUrl = response.url;

        if (resultUrl) {

            const result = document.getElementById('result');
            const shortened = document.getElementById('shortened');

            result.style.display = 'block';
            shortened.innerText = resultUrl;
            shortened.setAttribute('href', resultUrl);
        }
    },

    validate: function () {
        let fields = $('.js-validate');

        for (let i = 0; i < fields.length; i++) {

            $(fields[i]).siblings('.negative').remove();
            $(fields[i]).parent().removeClass('error');


            let res = this.isValid(fields[i]);

            if (res !== true) {
                $(fields[i]).parent().addClass('error');
                $(fields[i]).parent().append(`<p class="negative message ui">${res}</p>`);
            }
        }
    },

    isValid: function (field) {

        let list = field.dataset.validation.split(' ');

        for (let i = 0; i < list.length; i++) {
            let rule = list[i];

            if (rules[rule] && !rules[rule](field)) {
                return rulesMessages[rule];
            }
        }

        return true;
    }
}

