export const rules = {

    required: (field) => {
        let val = $(field).val();

        return val.length >= 1;
    },

    url: (field) => {
        let val = $(field).val();
        let regExp = /^(http|https):\/\/(\w[-\.]*)*\.\w{2,}\/?$/;

        return regExp.test(val);
    }
}

export const rulesMessages = {
    required : 'This attribute is required',
    url : 'Value must be URL (with schema), example: http://google.com'
}