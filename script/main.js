var container = document.querySelector('.menu-product');

products = [
    {
        images:"images/dog/dog-1.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },
    {
        images:"images/dog/dog-3.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },
    {
        images:"images/dog/dog-2.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },
    {
        images:"images/dog/dog-4.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },

    {
        images:"images/dog/dog-7.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },

    {
        images:"images/dog/dog-6.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },
    {
        images:"images/dog/dog-10.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },
    {
        images:"images/dog/dog-11.jpg",
        kind_product:"Chó cảnh",
        name_product:"Chó xù",
        price:600000
    },


]
function render(){
    const htmls = products.map(function(product){
        return `
             <div class="item-product text-center mb-5">
                  <div class="images-item">
                    <img src="${product.images}" alt="">
                  </div>
                  <div class="title-item">
                  <p class="item-kind mt-1">${product.kind_product}</p>
                  <p class="item-name"><b>${product.name_product}n</b></p>
                  </div>
                  <div class="price-item mb-2">
                    <span class="price"><b >Giá:</b> ${product.price}</span>
                  </div>
            </div>
        `
        container.innerHTML = htmls.join();
    })
    container.innerHTML = htmls.join();
}

render()

function changeImg(id){
    let imgPath = document.getElementById(id).getAttribute('src');
    document.getElementById('img-main').setAttribute('src',imgPath);
}