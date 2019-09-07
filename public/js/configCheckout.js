const linearProgress = mdc.linearProgress.MDCLinearProgress.attachTo(document.querySelector('.mdc-linear-progress'));
const select = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
const formField_1 = mdc.formField.MDCFormField.attachTo(document.querySelector('#form-field-1'));
const formField_2 = mdc.formField.MDCFormField.attachTo(document.querySelector('#form-field-2'));
const checkbox_1 = mdc.checkbox.MDCCheckbox.attachTo(document.querySelector('#checkbox-1'));
const checkbox_2 = mdc.checkbox.MDCCheckbox.attachTo(document.querySelector('#checkbox-2'));

formField_1.input = checkbox_1;
formField_2.input = checkbox_2;
select.listen('MDCSelect:change', () => {
  alert('Selected option at index ' + select.selectedIndex + ' com o valor ' + select.value);
});

linearProgress.progress = 0.33;
linearProgress.buffer = 0.40;