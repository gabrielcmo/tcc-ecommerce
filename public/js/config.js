const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
const list = mdc.list.MDCList.attachTo(document.querySelector('.mdc-list'))
const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.querySelector('.mdc-top-app-bar'));
const iconButtonsRipple = document.querySelectorAll('.mdc-icon-button');
const selector = '.mdc-button, .mdc-card__primary-action';
const ripples = [].map.call(document.querySelectorAll(selector), function(el) {
  return new mdc.ripple.MDCRipple.attachTo(el);
});
iconButtonsRipple.forEach(button => {
  const iconButton = mdc.ripple.MDCRipple.attachTo(button);
  iconButton.unbounded = true;
});

topAppBar.setScrollTarget(document.getElementById('main-content'));
topAppBar.listen('MDCTopAppBar:nav', () => {
  drawer.open = !drawer.open;
});

window.onscroll = function() {closeNav()};
function closeNav() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector('.mdc-top-app-bar').classList.add('mdc-top-app-bar--short-collapsed');
  } else {
    document.querySelector('.mdc-top-app-bar').classList.remove('mdc-top-app-bar--short-collapsed');
  }
}
