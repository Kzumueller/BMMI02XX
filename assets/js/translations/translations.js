import requestWorker from 'asynchrolicious';

const translations = ((input, output)=> {

    /**
     * transmits text to the backend translation service and returns the results
     *
     * @param {String} text
     * @param {String} language ISO language code
     * @returns {Promise<String>}
     */
    const translate = async (text, language) => {
        const data = new Map([
            ['language', language],
            ['text', text]
        ]);

        return await requestWorker.request('/votox/translate', data, 'POST');
    };

    /**
     * takes input's current value and the clicked button's inputLanguage,
     * passes them to translate and writes the results to output's value
     *
     * @param {MouseEvent} event
     */
    const translateListener = async event => {
        const button = event.currentTarget;
        output.value = JSON.parse(await translate(input.value, button.dataset.inputLanguage)).results;
    };

    /**
     * copies the contents of output to the user's clipboard
     * @param event
     */
    const copyToClipboardListener = event => {
        output.select();
        document.execCommand('copy');
    };

    /**
     * initializes module-wide vars,
     * binds event listeners,
     * returns prematurely if required node are not present
     */
    const run = () => {
        input = document.getElementById('translations__input');
        output = document.getElementById('translations__output');
        const copyButton = document.querySelector('.translations__button--clipboard');

        if([input, output, copyButton].includes(null)) return;

        document.querySelectorAll('.translations__button').forEach(
            button => button.addEventListener('click', translateListener)
        );

        copyButton.addEventListener('click', copyToClipboardListener)
    };

    return {
        run,
        translate
    }
})();

document.addEventListener('DOMContentLoaded', translations.run);