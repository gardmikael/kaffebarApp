const token = $("meta[name='csrf-token']").attr('content');

var app = new Vue({
  el: '#content',
    data: {
      items: [],
      receipt: [],
      receiptEmpty: true,
    },
    methods: {
      addItem: function(item_id, item_name, item_price){
        if(this.productExists(item_id)){
          var item;
          item = this.items.find(item=>item.id==item_id);
          item.quantity += 1;
        }else{
            this.items.push({id: item_id, name: item_name, price: item_price, quantity: 1});
        }
        this.calculateTotal(this.items);

      },
      removeItem: function(item_id){
        if(this.productExists(item_id)){
          var item;
          item = this.items.find(item=>item.id==item_id);
          if(item.quantity == 1 ){
            var index = this.items.indexOf(item);
            if (index > -1) {
              this.items.splice(index, 1);
            }
          }
          item.quantity -= 1;
        }
        this.calculateTotal(this.items);
      },
      productExists: function(item_id){
        var productExists = false;
        for (var i = 0; i < this.items.length; i++) {
          if(this.items[i].id == item_id){
            productExists = true;
          }
        }
        return productExists;
      },
      calculateTotal: function(items){
        var total = 0;
        for (var i = 0; i < items.length; i++) {
          total += (items[i].price * items[i].quantity);
        }
        return total;
      },
      purchase: function(){
        var self = this;
        $.ajax({
          url: '/purchase',
          type: 'POST',
          data: {
            _token: token,
            cart: this.items
          },
          success: function (data) {
            if($.isEmptyObject(data.error)){
               self.receiptEmpty = false;
               self.receipt = data['receipt'];
               self.items = [];

             }else{
               alert(data.error);
               self.items = [];
             }
          },
          error: function (data){
            console.log(data);
          }
        });
      }
    }
});
