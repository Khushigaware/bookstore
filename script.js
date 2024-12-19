// Existing code for user navigation menu toggle
let usernav = document.querySelector('.user_header .header_1 .user_flex .navbar');

document.getElementById('user_menu_btn').onclick = () => {
  usernav.classList.toggle('active');
  accbox.classList.remove('active');
};

let accbox = document.querySelector('.header_acc_box');
document.getElementById('user_btn').onclick = () => {
  accbox.classList.toggle('active');
  usernav.classList.remove('active');
};

// Hide the navigation menus when scrolling
window.onscroll = () => {
  accbox.classList.remove('active');
  usernav.classList.remove('active');
  let nav = document.querySelector('.user_header .header_1');

  if (window.scrollY > 70) {
    nav.classList.add('active');
  } else {
    nav.classList.remove('active');
  }
};

// New functionality for the "Collections" dropdown toggle
document.addEventListener("DOMContentLoaded", function () {
  const navItems = document.querySelectorAll('.nav-item');  // Modified selector for dynamic collection list
  navItems.forEach(item => {
    item.addEventListener('click', (event) => {
      const dropdown = item.querySelector('.dropdown');
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
      event.stopPropagation();
    });
  });

  // Close dropdown if clicking outside the navigation menu
  document.addEventListener('click', () => {
    document.querySelectorAll('.dropdown').forEach(drop => drop.style.display = 'none');
  });
});
