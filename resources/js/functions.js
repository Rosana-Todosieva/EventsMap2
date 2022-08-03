export const getParam = (param, defaultValue = null) => {
    let params = new URLSearchParams(decodeURI(document.location.search.substring(1)));
    return params.get(param) ?? defaultValue;
}
