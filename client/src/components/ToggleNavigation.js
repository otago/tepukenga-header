export default () => {
  const mainMenu = document.getElementById('mainMenu');
  const toggleNavigation = document.getElementById('toggleNavigation');
  const toggleSubnavs = document.getElementsByClassName('op-header__toggle-subnav');
  toggleNavigation.addEventListener('click', () => {
    document.body.classList.toggle('mainMenuActive');
    mainMenu.classList.toggle('active');
  });
  const toggleItemActive = (item, remove) => {
    if (remove) {
      item.classList.toggle('active');
    } else {
      item.classList.remove('active');
    }
    if (item.classList.contains('active')) {
      item.parentElement.classList.add('childActive');
    } else {
      item.parentElement.classList.remove('childActive');
    }
  };
  // eslint-disable-next-line
  for (const toggleSubnav of toggleSubnavs) {
    toggleSubnav.addEventListener('click', () => {
      const parent = toggleSubnav.parentElement;
      const parentList = parent.parentElement;
      // eslint-disable-next-line
      for (const subnav of parentList.children) {
        if (subnav !== parent) {
          toggleItemActive(subnav, false);
        }
      }
      toggleItemActive(parent, true);
    });
  }
};
