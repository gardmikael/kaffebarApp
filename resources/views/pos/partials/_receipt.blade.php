<div id="receipt" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kvittering</h4>
      </div>
      <div class="modal-body">
        <div v-if="receiptEmpty">
          <p>Du har ikke lagt noen varer i handlekurven</p>
        </div>
        <div v-else id="receipt_items_list">
          <table class="table">
              <thead>
                <tr>
                  <th>Antall</th>
                  <th>Varenavn</th>
                  <th>Pris</th>
                </tr>
              </thead>

              <tfoot>
                <tr v-cloak>
                  <td>Sum</td>
                  <td></td>
                  <td>@{{calculateTotal(receipt)}}</td>
                </tr>
              </tfoot>

              <tbody>
                <tr v-cloak v-for="item in receipt">
                  <td>@{{item.quantity}}</td>
                  <td>@{{item.name}}</td>
                  <td>@{{item.price * item.quantity}}</td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Lukk</button>
      </div>
    </div>
  </div>
</div>
