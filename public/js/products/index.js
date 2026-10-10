const dialog = document.getElementById('productDialog');
const openBtn = document.getElementById('openDialogBtn');
const closeBtn = document.getElementById('closeDialogBtn');
const form = document.getElementById('productForm');
const productList = document.getElementById('productList');

// ---------- Dialog ----------
openBtn.addEventListener('click', () => dialog.showModal());
closeBtn.addEventListener('click', () => dialog.close());

dialog.addEventListener('close', () => {
    form.reset();
    clearErrors();
});

// ---------- Form submit ----------
form.addEventListener('submit', async (event) => {
    event.preventDefault(); // stop the page reload
    clearErrors();

    try {
        const response = await fetch(form.action, {
            method: form.method,
            body: new FormData(form),
        });
        const result = await response.json();

        if (!response.ok) {
            showErrors(result.errors);
            return;
        }

        addProductToList(result.product);
        dialog.close(); // the 'close' listener resets the form
    } catch (error) {
        console.error('Submission failed:', error);
        showErrors({ form: 'Something went wrong. Please try again.' });
    }
});

/**
 * Append the created item to the list
 * @param {name, price, quantity} product 
 */
function addProductToList(product) {

    /* Link Element */
    const link = document.createElement('a'); // Instantiate the <a> element
    link.href = `product?id=${encodeURIComponent(product.id)}`; // Add href attribute to the element
    link.className = 'hover:underline'; // Add className to the element
    link.textContent = product.name; // Add name value to the element

    const item = document.createElement('li'); // Instantiate list item
    item.append(link); // Add the link the the item
    productList.append(item); // Add the item to the product list
}

/**
 * Display the error to the user
 */
function showErrors(errors = {}) {
    for (const [field, message] of Object.entries(errors)) {
        const errorElement = document.getElementById(`error-${field}`);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    }
}

/**
 * Remove all errors
 */
function clearErrors() {
    document.querySelectorAll('[id^="error-"]').forEach((el) => {
        el.textContent = '';
        el.classList.add('hidden');
    });
}