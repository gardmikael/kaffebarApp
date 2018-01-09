<h3>Handlekurv</h3>

<table class="table">
    <thead>
      <tr>
        <th>Antall</th>
        <th>Varenavn</th>
        <th>Pris</th>
        <th></th>
      </tr>
    </thead>

    <tfoot>
      <tr v-cloak>
        <td>Sum</td>
        <td></td>
        <td>@{{calculateTotal(items)}}</td>
      </tr>
    </tfoot>

    <tbody>      
      <tr v-cloak v-for="item in items">
        <td>@{{item.quantity}}</td>
        <td>@{{item.name}}</td>
        <td>@{{item.price * item.quantity}}</td>
        <td><button class="btn btn-xs btn-danger" v-on:click="removeItem(item.id)">Slett</button></td>
      </tr>
    </tbody>
  </table>

<button class="form-control btn btn-success" v-on:click="purchase()" data-toggle="modal" data-target="#receipt">Kjøp</button>
