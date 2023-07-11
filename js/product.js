let delete_btns = document.querySelectorAll(".delete-product");
delete_btns.forEach((btn) => btn.addEventListener("click", deleteProduct));

function deleteProduct(){
    const id = this.dataset.productId;

 if (confirm("Do you really want to delete this product?") == true) {
  fetch(`http://localhost/product/deleteProduct.php?product_id=${id}`)
  .then((res)=>res.json())
  .then((data)=>{
    if(data){
        let btn = document.querySelector(`button[data-product-id='${id}']`);
        btn.parentNode.parentNode.remove();
    }
   }); 
}
}
