window.addEventListener("DOMContentLoaded", () =>
{
    let queryParams = new URLSearchParams(window.location.search);
    let statusMessage = `${queryParams.get("status")} `;
    switch(parseInt(queryParams.get("status")))
    {
        case 400: statusMessage += `Bad Request`; break;
        case 401: statusMessage += `Unauthorized`; break;
        case 402: statusMessage += `Payment Required`; break;
        case 403: statusMessage += `Forbidden`; break;
        case 404: statusMessage += `Not Found`; break;
        case 405: statusMessage += `Method Not Allowed`; break;
        case 406: statusMessage += `Not Acceptable`; break;
        case 407: statusMessage += `Proxy Authentication Required`; break;
        case 408: statusMessage += `Request Timeout`; break;
        case 409: statusMessage += `Conflict`; break;
        case 410: statusMessage += `Gone`; break;
        case 411: statusMessage += `Length Required`; break;
        case 412: statusMessage += `Precondition Failed`; break;
        case 413: statusMessage += `Payload Too Large`; break;
        case 414: statusMessage += `URI Too Long`; break;
        case 415: statusMessage += `Unsupported Media Type`; break;
        case 416: statusMessage += `Range Not Satisfiable`; break;
        case 417: statusMessage += `Range Expectation Failed`; break;
        case 418: statusMessage += `I'm a teapot`; break;
        case 421: statusMessage += `Misdirected Request`; break;
        case 422: statusMessage += `Unprocessable Entity`; break;
        case 423: statusMessage += `Locked`; break;
        case 424: statusMessage += `Failed Dependency`; break;
        case 425: statusMessage += `Too Early`; break;
        case 426: statusMessage += `Upgrade Required`; break;
        case 428: statusMessage += `Precondition Required`; break;
        case 429: statusMessage += `Too Many Requests`; break;
        case 431: statusMessage += `Request Header Fields Too Large`; break;
        case 451: statusMessage += `Unavailable For Legal Reasons`; break;
        default: statusMessage += "Unknown error"; break;
    }
    document.querySelector("#status").innerHTML = statusMessage;
    console.log(`%cAccess to '${queryParams.get("request_uri")}' was attempted and returned a status code of '${queryParams.get("status")}'`, "color: red");
})