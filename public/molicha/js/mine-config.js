var url = "";
fetch('http://localhost:3000/product')
.then(
    function(response) {
      if (response.status !== 200) {
        console.log('Lỗi, mã lỗi ' + response.status);
        return;
      }
      return response.json()
    }
  )
  .then(function (data) { 
       addItem(data);
    })
  .catch(err => {
      console.log('Error :-S', err)
    });

    function addItem(data){
        var item = document.querySelectorAll('.block1');
        item.forEach(function (product,i) { 
            var productTitle = product.querySelector('.block1-content>.js-name-b1');
            var productPrice =product.querySelector('.block1-content-more');
            product.querySelector('.block1-bg>img').src=data[i].images;
            productPrice.innerText = data[i].price;            
            productTitle.innerText = data[i].title;            
         })
  }
  
 