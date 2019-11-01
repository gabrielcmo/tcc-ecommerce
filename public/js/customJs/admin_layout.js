const drawer = mdc.drawer.MDCDrawer.attachTo(document.querySelector('.mdc-drawer'));
const topAppBar = mdc.topAppBar.MDCTopAppBar.attachTo(document.querySelector('.mdc-top-app-bar'));
const iconButtons = document.querySelectorAll('.mdc-icon-button');
const buttons = document.querySelectorAll('.mdc-button');
const tabBar = mdc.tabBar.MDCTabBar.attachTo(document.querySelector('.mdc-tab-bar'));

topAppBar.setScrollTarget(document.getElementById('main-content'));
topAppBar.listen('MDCTopAppBar:nav', () => {
  drawer.open = !drawer.open;
});

iconButtons.forEach(iconButton => {
  mdc.ripple.MDCRipple.attachTo(iconButton);
  iconButton.unbounded = true;
});

buttons.forEach(button => {
  mdc.ripple.MDCRipple.attachTo(button);
});

$(document).ready(function () {
  var windowWidth = $(window).width();

  $('.mdc-tab-scroller__scroll-content a').click(function(e) {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
    }
  });

  if ((windowWidth >= 576 && windowWidth < 992) || (windowWidth < 576)) {
    $('#admin-sidebarMenuButton').removeClass('d-none');
    $('#admin-sidebarMenu').removeClass('d-none');
    $('#logout-button').addClass('d-none');
    $('#tablist').addClass('d-none');
  }

  if (windowWidth >= 992) {
    $('#admin-sidebarMenuButton').addClass('d-none');
    $('#admin-sidebarMenu').addClass('d-none');
    $('#logout-button').removeClass('d-none');
    $('#tablist').removeClass('d-none');
  }

  $(window).resize(function () {
    let windowWidth = $(window).width();

    if ((windowWidth >= 576 && windowWidth < 992) || (windowWidth < 576)) {
      $('#admin-sidebarMenuButton').removeClass('d-none');
      $('#admin-sidebarMenu').removeClass('d-none');
      $('#logout-button').addClass('d-none');
      $('#tablist').addClass('d-none');
    }

    if (windowWidth >= 992) {
      $('#admin-sidebarMenuButton').addClass('d-none');
      $('#admin-sidebarMenu').addClass('d-none');
      $('#logout-button').removeClass('d-none');
      $('#tablist').removeClass('d-none');
    }

  });
});