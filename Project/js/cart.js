
// UI Class: Handle UI Tasks
class UI {
  static displayMenus() {
    const menus = Cart.getMenus();


    menus.forEach((menu, index) => {
      UI.addMenuToList(menu,index)
    });
  }

  static addMenuToList(menu,index) {
    const list = document.querySelector('#product-list');

    const row = document.createElement('tr');

    let order_totalPrice = Number(menu.menu_price) * Number(menu.quantity);
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

  static showAlert(message, className) {
    const div = document.createElement('div');
    div.className = `alert alert-${className}`;
    div.appendChild(document.createTextNode(message));
    const content = document.querySelector('#content');
    const form = document.querySelector('#product-form');
    content.insertBefore(div, form);
    // Vanish in 2 seconds
    setTimeout(() => {

      document.querySelector('.alert').remove();
      location.reload();
      return false;
    },1000);

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


  static removeMenu(menu_id) {
    const menus = Cart.getMenus();

    menus.forEach((menu, index) => {
      if(menu.menu_id === menu_id) {
        menus.splice(index, 1);

        // Show success message
        UI.showAlert('1 item has been removed', 'success');
      }
    });

    localStorage.setItem('menus', JSON.stringify(menus));

  }

}



//  Event: Display Products
document.addEventListener('DOMContentLoaded', UI.displayMenus);

// Event Remove a Product
document.querySelector('#product-list').addEventListener('click', (e) => {
  // console.log(e.target);

  // Remove product from UI
  UI.deleteMenu(e.target);

  // Remove product from cart
  Cart.removeMenu(e.target.parentElement.previousElementSibling.textContent)



});
