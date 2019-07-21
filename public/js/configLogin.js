const buttons = document.querySelectorAll('.mdc-button');
const textFields = document.querySelectorAll('.mdc-text-field');

buttons.forEach(button => {
  mdc.ripple.MDCRipple.attachTo(button);
});

textFields.forEach(textField => {
  mdc.textField.MDCTextField.attachTo(textField);
});