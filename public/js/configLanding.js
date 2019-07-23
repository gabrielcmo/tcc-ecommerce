const cards = document.querySelectorAll('.mdc-card__primary-action');

cards.forEach(card => {
  mdc.ripple.MDCRipple.attachTo(card);
});