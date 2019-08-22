const iconButtons = document.querySelectorAll('.mdc-icon-button');

iconButtons.forEach(iconButton => {
  const button = mdc.ripple.MDCRipple.attachTo(iconButton);
  button.unbounded = true;
});