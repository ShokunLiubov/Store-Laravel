
class CartService {
    static baseURL = 'http://localhost/make-up/cart'
    static  csrfToken = window.Laravel.csrfToken;


    static async showCart() {
        try {
            const response = await fetch(`${this.baseURL}/show`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
            });

            const { cartModal, cart, cartSum } =  await response.json();
            const cartContent = document.querySelector('.cart-content');

            if (cartModal) {
                cartContent.classList.remove('hidden');
                cartContent.classList.add('show');
            }

            updateCart(cart, cartSum)
            cartAttachEventHandlers();
        } catch (error) {
            console.error('An error occurred:', error);
        }

    }

    static async hideCart() {
        try {
            const response = await fetch(`${this.baseURL}/hide`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
            });

            return await response.json();

        } catch (error) {
            console.error('An error occurred:', error);
        }
    }

    static async addToCart(productId) {
        try {
            await fetch(`${this.baseURL}/add/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
            });

        } catch (error) {
            console.error('An error occurred:', error);
        }
    }

    static async increment(productId) {
        try {
            const response = await fetch(`${this.baseURL}/increment/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
            });

            const { cart, cartSum } =  await response.json();
            updateCart(cart, cartSum)
            cartAttachEventHandlers();
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }

    static async decrement(productId) {
        try {
            const response = await fetch(`${this.baseURL}/decrement/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
            });

            const { cart, cartSum } =  await response.json();
            updateCart(cart, cartSum)
            cartAttachEventHandlers();
        } catch (error) {
            console.error('An error occurred:', error);
        }
    }

    static async remove(productId) {
        try {
            const response = await fetch(`${this.baseURL}/remove/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
            });

            const { cart, cartSum } =  await response.json();
            updateCart(cart, cartSum)
            cartAttachEventHandlers();

        } catch (error) {
            console.error('An error occurred:', error);
        }
    }
}
