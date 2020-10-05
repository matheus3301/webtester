const apiFetch = function (endpoint, method, form_data = null) {
  var object = {};
  if (form_data) {
    form_data.forEach(function (value, key) {
      object[key] = value;
    });
    object = JSON.stringify(object);
  } else {
    object = null;
  }

  return fetch(endpoint, {
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

const submitForm = function (e, response_id = null, modal_id = null) {
  e.preventDefault();
  console.log('submiting the form...');

  let form_id = e.srcElement.id;

  let action = e.srcElement.action;
  let method = e.srcElement.method;

  apiFetch(action, method, new FormData(document.getElementById(form_id))).then(
    (response) => {
      if ('error' in response) {
        if (response_id) {
          document.getElementById(
            response_id
          ).innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <strong>Error!</strong> ${response.error}
                        </div>`;
        } else {
          alert('Something went wrong: ' + response.error);
        }
      } else {
        document.getElementById(form_id).reset();
        if (modal_id) {
          $(modal_id).modal('hide');
        }
      }
    }
  );
};
