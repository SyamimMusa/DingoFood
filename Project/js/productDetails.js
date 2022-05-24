// Product Class: Represent a Product
class Menu {
    constructor(menu_id, menu_name, menu_price, quantity) {
      this.menu_id = menu_id;
      this.menu_name = menu_name;
      this.menu_price = menu_price;
      this.quantity = quantity;

    }
  }

  // UI Class: Handle UI Tasks
  class UI {
    static displayMenus() {
      const menus = Cart.getMenus();

      let totalPrice = 0;

      menus.forEach((menu, index) => {
        UI.addMenuToList(product,index)
      });
    }

    static addMenuToList(menu,index) {
      const list = document.querySelector('#product-list');

      const row = document.createElement('tr');

      let order_totalPrice = parseFloat(menu.menu_price).toFixed(2) * parseInt(menu.quantity);
      order_totalPrice = parseFloat(order_totalPrice).toFixed(2);

      row.innerHTML = `
      <td>${menu.menu_name}</td>
      <td>${menu.quantity}</td>
      <td>RM ${menu.menu_price}</td>
      <td id="order_totalPrice">RM ${order_totalPrice}</td>
      <td style="display:none;">${menu.menu_id}</td>
      <td><a href="#" class="btn btn-danger btn-sm delete">X</td>
      `;

      list.appendChild(row);
    }

    static deleteMenu(el) {
      if(el.classList.contains('delete')) {
        el.parentElement.parentElement.remove();
      }
    }

  }


  //  Store Class: Handles Storage
  class Cart {
    static getMenus() {
      let menus;
      if(localStorage.getItem('menus') === null) {
        menus = [];
      } else {
        menus = JSON.parse(localStorage.getItem('menus'));
      }

      return menus;
    }

    static addMenu(menu) {
      const menus = Cart.getMenus();

      menus.push(menu);

      localStorage.setItem('menus', JSON.stringify(menus));
    }

    static removeMenu(menu_id) {
      const menus = Cart.getMenus();

      menus.forEach((menu, index) => {
        if(menu.menu_id === menu_id) {
          menus.splice(index, 1);
        }
      });

      localStorage.setItem('menus', JSON.stringify(menus));
    }
  }

  //  Event: Display Products
  document.addEventListener('DOMContentLoaded', UI.displayMenus);

  // Event Add a Product
  document.querySelector('#product-form').addEventListener('submit', (e) => {
    // prevent actual submit
    e.preventDefault();

    //get form values
    const menu_id = document.querySelector('#menu_id').value;
    const menu_name = document.querySelector('#menu_name').value;
    const menu_price = document.querySelector('#menu_price').value;
    const quantity = document.querySelector('#quantity').value;

    // Validate
    if(menu_id === '' || menu_name === '' || menu_price === '' || quantity === '') {
      // console.log('form fields not fill');
      // UI.showAlert('Please fill all field', 'danger');
    } else {
      // Instatiate product
      const menu = new Menu(menu_id, menu_name, menu_price, quantity);

      // Add product to UI
      UI.addMenuToList(menu);

      // Add product to cart
      Cart.addMenu(menu);

    }
  });

  // Event Remove a Product
  document.querySelector('#product-list').addEventListener('click', (e) => {
    // console.log(e.target);

    // Remove product from UI
    UI.deleteMenu(e.target);

    // Remove product from cart
    Cart.removeMenu(e.target.parentElement.previousElementSibling.textContent)

  });
