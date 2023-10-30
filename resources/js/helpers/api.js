export function getResponseError(error, response) {
    const errorMessage = "API Error, please try again.";
    if (typeof error !== 'object') {
        return errorMessage;
    }

    if (error.name === "Fetch User") {
        return error.message;
    }

    if (error.hasOwnProperty('response') && error.response.hasOwnProperty('data') && error.response.data.hasOwnProperty('errors')) {
        return error.response.data.errors;
    }

    if (error.hasOwnProperty('response') && error.response.hasOwnProperty('data') && error.response.data.hasOwnProperty('message')) {
        return error.response.data.message;
    }

    if (error.hasOwnProperty('message')) {
        return error.message;
    }

    if (!error.response) {
        console.error(`API ${error.config.url} not found`);
        return errorMessage;
    }
    if (process.env.NODE_ENV === "development") {
        console.error(error.response.data);
        console.error(error.response.status);
        console.error(error.response.headers);
    }

    return errorMessage;
}