const linearProgress = mdc.linearProgress.MDCLinearProgress.attachTo(document.querySelector('.mdc-linear-progress'));
const select = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select'));
select.listen('MDCSelect:change', () => {
  alert('Selected option at index ' + select.selectedIndex + ' com o valor ' + select.value);
});

linearProgress.progress = 0.33;
linearProgress.buffer = 0.40;