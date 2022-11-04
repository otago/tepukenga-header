export default () => {
  const mainMenu = document.getElementById('mainMenu');
  const toggleNavigation = document.getElementById('toggleNavigation');
  const toggleSearch = document.getElementById('toggleSearch');
  const toggleSubnavs = document.getElementsByClassName('op-header__toggle-subnav');
  const searchForm = document.getElementById('searchForm');
  const updateBody = () => {
    if (mainMenu.classList.contains('active') || searchForm.classList.contains('active')) {
      document.body.classList.add('navgiationActive');
    } else {
      document.body.classList.remove('navgiationActive');
    }
  };
  if (toggleSearch) {
    toggleSearch.addEventListener('click', () => {
      mainMenu.classList.remove('active');
      searchForm.classList.toggle('active');
      updateBody();
    });
  }
  toggleNavigation.addEventListener('click', () => {
    if (toggleSearch) {
      searchForm.classList.remove('active');
    }
    mainMenu.classList.toggle('active');
    updateBody();
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
