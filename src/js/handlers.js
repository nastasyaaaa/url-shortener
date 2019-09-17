import {functions} from "./functions";

export const handlers = {

    onShortenClick: (e) => {
        e.preventDefault();

        functions.validate();
        const url = $('#url');

        if (!$(url).parent().hasClass('error')) {

            functions.makeRequest('/make', 'POST', {url: $(url).val()})
                .then(
                    functions.showResult,
                    error => alert(`Rejected: ${error}`)
                );
        }
    },


}
