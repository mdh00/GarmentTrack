//catching image path
function catchID(id) {
    let imgID = id + "-img";
    let priceID = id + "-price";
    let productName = id;
    let imageElement = document.getElementById(imgID);
    let imagePath = imageElement.src;

    let price = document.getElementById(priceID).textContent;

    localStorage.setItem('img-path', imagePath);
    localStorage.setItem('unit-price', price);
    localStorage.setItem('product-name', productName);
    //pass the value
    window.location.href = "customizeOrder.php";
}












