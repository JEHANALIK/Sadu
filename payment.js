const form = document.getElementById('form');
const name = document.getElementById('name');
const number = document.getElementById('number');
const cvv = document.getElementById('cvv');
const date = document.getElementById('date');

//var error=0;

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

// Get fieldname
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

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

// Check name is valid
function checkName(input) {
  let error = 0;
  const re = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'Name is not valid');
    ++error;
  }
  return error;
}

// Check number is valid
function checkNumber(input) {
  let error = 0;
  const re = /^[0-9]{16}$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'Number is not valid');
    ++error;
  }
  return error;
}

// Check cvv is valid
function checkCVV(input) {
  let error = 0;
  const re = /^[0-9]{3}$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'cvv is not valid');
    ++error;
  }
  return error;
}

// Check date is valid
function checkDate(input) {
  let error = 0;
  const re = /^(0[1-9]|1[0-2])\/?(([0-9]{4}|[0-9]{2})$)/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, 'date is not valid');
    ++error;
  }
  return error;
}



// Event listeners
form.addEventListener('submit', function(e) {
  e.preventDefault(); //prevents auto submit
  let allErrors = 0;
  allErrors+=checkRequired([name, number, cvv, date, amount]);
  allErrors+=checkName(name);
  allErrors+=checkNumber(number);
  allErrors+=checkCVV(cvv);
  allErrors+=checkDate(date);
  allErrors+=checkAmount(amount);

  //If all requirements are successful, submit the form
  if (allErrors===0)
      form.submit();
});
