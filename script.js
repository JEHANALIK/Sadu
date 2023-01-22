const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const phone = document.getElementById('phone');

// Show input error message
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = 'form-control error';
  const small = formControl.querySelector('small');
  small.innerText = message;
}

// Show success outline
function showSuccess(input) {
  const formControl = input.parentElement;
  formControl.className = 'form-control success';
}

// Check email is valid
function checkEmail(input) {
  let error = 0;
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'Email is not valid');
    ++error;
  }
  return error;
}

// Check required fields
function checkRequired(inputArr) {
  let error=0;
  inputArr.forEach(function(input) {
    if (input.value.trim() === '') {
      showError(input, `${getFieldName(input)} is required`);
      ++error;
    } else {
      showSuccess(input);
    }
  });
  return error;
}

// Check input length
function checkLength(input, min, max) {
  let error=0;
  if (input.value.length < min) {
    showError(
      input,
      `${getFieldName(input)} must be at least ${min} characters`
    );
    ++error;
  } else if (input.value.length > max) {
    showError(
      input,
      `${getFieldName(input)} must be less than ${max} characters`
    );
    ++error;
  } else {
    showSuccess(input);
  }
  return error;
}



// Check passwords match
function checkPasswordsMatch(input1, input2) {
  let error = 0;
  if (input1.value !== input2.value) {
    showError(input2, 'Passwords do not match');
    ++error;
  }
  return error;
}

// Check phone is valid
function checkPhone(input) {
  let error = 0;
  var phoneEx=/^[36][0-9]{7}$/;
  if (phoneEx.test(input.value.match(phoneEx))) {
    showSuccess(input);
  } else {
    showError(input, 'phone number is not valid');
    ++error;
  }
  return error;
}


// Get fieldname
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

// Event listeners
form.addEventListener('submit', function(e) {
  e.preventDefault(); //prevents auto submit
  let allErrors = 0;
  allErrors+=checkRequired([username, email, password, password2, phone]);
  allErrors+=checkLength(username, 3, 15);
  allErrors+=checkLength(password, 6, 25);
  allErrors+=checkEmail(email);
  allErrors+=checkPasswordsMatch(password, password2);
  allErrors+=checkPhone(phone);

  //If all requirements are successful, submit the form
  if (allErrors===0)
      form.submit();
});

