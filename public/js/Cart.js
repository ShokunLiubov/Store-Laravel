const cartIcon = document.querySelector(".cart")
const addToCart = document.querySelectorAll(".add_product")

cartIcon.addEventListener('click', async () => {
    await CartService.showCart()
})

function updateCart(cart = [], cartSum = 0, error = null) {
    document.querySelector('.cart_sum').innerHTML = cartSum + '$';
    const container = document.querySelector('.product_items');
    let itemsHTML;
    container.innerHTML = '';
    console.log(error)
    if (cart) {
        itemsHTML = cart.map(item => {
            console.log(error)
            return `<div>
                <div class='item'>
                    <a href="/make-up/product/{{ $product->id }}" class='productImg'>
                        <img src=${item.image}/>
                    </a>

                    <div class='product_info'>
                        <div class='info_option'>
                            <a href="/make-up/product/{{ $product->id }}">
                                <p class='title'>${item.title}</p>
                            </a>
                            <p class='classification'>
                                helllo
                            </p>
                            <div class='counter'>
                                <div class='decrement'>
                            <span class='material-symbols-outlined' product-id=${item.id}>
                            remove
                            </span>
                                </div>
                                <p class='count'
                                   data-product-id=${item.id}>${item.count}</p>
                                <div class='increment'>
                                <span class='material-symbols-outlined'
                                                          product-id=${item.id}>
                                    add
                                    </span>
                                </div>

                                <div class='remove'>
                                    <span class='material-symbols-outlined'product-id=${item.id}>
                                    close
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class='product_price'>
                            ${error && error.product_id === item.id ? `<p class='error'>${error.message}</p>` : ''}
                            <p class='product_price'>${item.price}$</p>
                        </div>
                    </div>
                </div>

                <div class='line'></div>
            </div>`
        }).join('');
    } else {
        itemsHTML = ` <p>Cart is empty</p>`
    }

    container.innerHTML = itemsHTML;
}

addToCart.forEach(button => {
    button.addEventListener('click', async function (event) {
        event.preventDefault()
        const productId = event.target.getAttribute('product-id')

        await CartService.addToCart(productId)
        await CartService.showCart()
    })
})

function cartAttachEventHandlers() {

    const decrement = document.querySelectorAll(".decrement")
    const increment = document.querySelectorAll(".increment")
    const remove = document.querySelectorAll(".remove")
    const hideCarts = document.querySelectorAll(".hide_cart");
    const cartModal = document.querySelector(".modal_cart");

    cartModal.addEventListener('click', e => e.stopPropagation());

    hideCarts.forEach(hideCart => {
        hideCart.addEventListener('click', async () => {
            const { cartModal } = await CartService.hideCart()
            const cartContent = document.querySelector('.cart-content');

            if (!cartModal) {
                cartContent.classList.remove('show');
                cartContent.classList.add('hidden');
            }
        });
    });

    decrement.forEach(button => {
        button.addEventListener('click', async function (event) {
            const productId = event.target.getAttribute('product-id');
            await CartService.decrement(productId)
        });
    });

    increment.forEach(button => {
        button.addEventListener('click', async function (event) {
            const productId = event.target.getAttribute('product-id');
            await CartService.increment(productId)
        });
    });


    remove.forEach(button => {
        button.addEventListener('click', async function (event) {
            const productId = event.target.getAttribute('product-id');
            await CartService.remove(productId)
        });
    })



}
