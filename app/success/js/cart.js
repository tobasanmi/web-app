

if (!(localStorage.items_id_list)) {}
else{
     let items_id_list = JSON.parse(localStorage.items_id_list);
     if (items_id_list.length > 0) {
       document.getElementById("cart_plate").innerHTML ='<a href="cart.html"><i class="la la-shopping-cart"><span class="badge badge-dot" style=" padding-left:5px;"><span  style="font-size: 13px; padding:2px 5px 2px 4px; border-radius: 50px; background-color:rgb(219, 24, 24);">'+items_id_list.length+'</span></span></i>Cart</a>';
      }
      else{
        
      }
}




function add2cart(item) {
    const item_details = JSON.parse(item);
    const item_id =  item_details.id;

    ///////// SVG check when item is added to cart from the home page///////////
    if (document.getElementById(item_id)) {
      document.getElementById(item_id).innerHTML ='<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/> </svg>';
      setTimeout(function() { document.getElementById(item_id).innerHTML ='<i class="la la-shopping-cart"></i>'; }, 3000);
    
    }
    else{

    }
 
///////// check is item doesnt exist, (if it doesnt: add to local storage) - (if it does: do nothing) //////////
         if (!(localStorage.getItem(item_id))) {
               
          if (!(sessionStorage.getItem("current_product_qty"))) {
                    localStorage.setItem(item_id, item);
                }
                else{
                  item_details.qty = sessionStorage.getItem("current_product_qty");
                  localStorage.setItem(item_id, JSON.stringify(item_details));
                  sessionStorage.removeItem("current_product_qty");
                }

                
               
                  if (!(localStorage.items_id_list)) {
                    let items_id_list = [];
                    items_id_list.push(item_id);
                    localStorage.items_id_list = JSON.stringify(items_id_list);
                    document.getElementById("cart_plate").innerHTML ='<a href="cart.html"><i class="la la-shopping-cart"><span class="badge badge-dot" style=" padding-left:5px;"><span  style="font-size: 13px; padding:2px 5px 2px 4px; border-radius: 50px; background-color:rgb(219, 24, 24);">1</span></span></i>Cart</a>';
                    }
                    else{
                    let items_id_list = JSON.parse(localStorage.items_id_list);
                    items_id_list.push(item_id);
                    localStorage.items_id_list = JSON.stringify(items_id_list);
                    document.getElementById("cart_plate").innerHTML ='<a href="cart.html"><i class="la la-shopping-cart"><span class="badge badge-dot" style=" padding-left:5px;"><span  style="font-size: 13px; padding:2px 5px 2px 4px; border-radius: 50px; background-color:rgb(219, 24, 24);">'+items_id_list.length+'</span></span></i>Cart</a>';
                    }
         }
         else{}


//<a href="cart.html"><i class="la la-shopping-cart  effect_tada"><span class="badge badge-dot" style=" padding-left:5px;"><span  style="font-size: 13px; padding:2px 5px 2px 4px; border-radius: 50px; background-color:rgb(219, 24, 24);">1</span></span></i>Cart</a>


      // if (!(localStorage.item_details.id)) {
      //   let item_list = [];
      //   item_list.push(item);
      //   localStorage.items = JSON.stringify(item_list);
      // }
      // else{
      //   let item_list = JSON.parse(localStorage.items);
      //   item_list.forEach(check_item_id);

      //  // item_list.push(item);
      //  // localStorage.items = JSON.stringify(item_list);
        
      // }


        // function check_item_id(item, index) {
        //       // let item_content = JSON.parse(item);
        //       //  alert(item_content.id);
        //         //alert(item_details.cart_id);
        //         if (item_list.id == item_content.id) {
        //           alert(item_content.id);
        //         //  item_details.qty = "2";
        //         //  alert( JSON.stringify(item_details));
        //         }
        //         else{
        //           alert("nothing");
        //         }
        // }

      // let item_test = JSON.parse(item_list[0]);
      //   alert(item_test["qty"]);

     // let item_count = eval(localStorage.getItem("item_count"));

    //  let obj = {"name":"l", "qty":1111, "id":11, "cart_id":000000000002222};
    //       var item_list = JSON.parse(localStorage.getItem("items"));
          
    //        item_list.push(JSON.stringify(obj));
    //        //item_list.push(item);
    //       localStorage.items = item_list;
        

    // let items = JSON.parse(localStorage.getItem("items"));

    // alert(items[0]["name"]);    
  
  }

  //var items:"{"name":"smit","qty":1111,"id":103111211,"cart_id":212},{"name":"John", "qty":1, "id":1001, "cart_id":212}"



        // let new_item_count = item_count + 1;
        // alert(new_item_count);
        // localStorage.setItem("item_"+ new_item_count, item);
        // localStorage.setItem("item_count", new_item_count);





