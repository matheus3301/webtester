var apiFetch = function (endpoint, method, form_data = null) {
  var object = {};
  if (form_data) {
    form_data.forEach(function (value, key) {
      object[key] = value;
    });
    object = JSON.stringify(object);
  } else {
    object = null;
  }

  return fetch('backend/api/' + endpoint, {
    method: method,
    body: object,
  }).then(function (response) {
    var contentType = response.headers.get('content-type');
    if (contentType && contentType.indexOf('application/json') !== -1) {
      return response.json();
    } else {
      return {
        error: 'cannot make the request',
      };
    }
  });
};
