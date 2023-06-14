

function product_id(id) {
    let item_id = id.slice(4, 6);
    sessionStorage.setItem("current_product_id", item_id);
}