let previewContainer = document.querySelector('.products-container');
let previewBox = previewContainer.querySelectorAll('.product');

previewBox.forEach(product => {
  product.onclick = () => {
    let id = product.getAttribute('data-id');
    window.location.href = 'detalles.html?producto=' + id;

    product.classList.add('selected');

    previewBox.forEach(p => {
      if (p.getAttribute('data-id') !== id) {
        p.classList.remove('selected');
      }
    });
  };
});