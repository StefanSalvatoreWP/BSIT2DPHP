function validateInput(input) {
    let isValid = input.value.length <= 15 && input.value.length >= 4;
  
    if (isValid && input.value !== "") {
      input.classList.remove("invalidInput");
      input.classList.add("validInput");
    } else if (!isValid && input.value !== "") {
      input.classList.remove("validInput");
      input.classList.add("invalidInput");
    } else {
      input.classList.remove("validInput");
      input.classList.remove("invalidInput");
    }
  }

  function validateInputAge(input) {
  let isValid = input.value.length <= 15 && input.value.length >= 1 && !isNaN(input.value);
  
  if (isValid && input.value !== "") {
    input.classList.remove("invalidInput");
    input.classList.add("validInput");
  } else if (!isValid && input.value !== "") {
    input.classList.remove("validInput");
    input.classList.add("invalidInput");
  } else {
    input.classList.remove("validInput");
    input.classList.remove("invalidInput");
  }
}