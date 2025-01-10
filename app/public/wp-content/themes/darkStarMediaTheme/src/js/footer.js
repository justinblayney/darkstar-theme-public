document.addEventListener('DOMContentLoaded', function () {
  if (window.innerWidth > 993) {
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(function (dropdown) {
      dropdown.addEventListener('mouseenter', function () {
        const dropdownMenu = this.querySelector('.dropdown-menu');
        const caret = this.querySelector('b');

        if (dropdownMenu) {
          dropdownMenu.style.display = 'block';
          dropdownMenu.style.opacity = '1';
        }
        this.classList.add('open');
        if (caret) {
          caret.classList.toggle('caret');
          caret.classList.toggle('caret-up');
        }
      });

      dropdown.addEventListener('mouseleave', function () {
        const dropdownMenu = this.querySelector('.dropdown-menu');
        const caret = this.querySelector('b');

        if (dropdownMenu) {
          dropdownMenu.style.display = 'none';
          dropdownMenu.style.opacity = '0';
        }
        this.classList.remove('open');
        if (caret) {
          caret.classList.toggle('caret');
          caret.classList.toggle('caret-up');
        }
      });
    });
  }
});
