<link href="{{ asset('dist/creditcardjs/creditcardjs-v0.10.13.min.css') }}" rel="stylesheet">

<div class="ccjs-card">
  <label class="ccjs-number">
    Número de Tarjeta
    <input name="card-number" class="ccjs-number" placeholder="•••• •••• •••• ••••">
  </label>

  <label class="ccjs-csc">
    Código de Seguridad
    <input name="csc" class="ccjs-csc" placeholder="•••">
  </label>

  <button type="button" class="ccjs-csc-help">?</button>

  <label class="ccjs-name">
    Nombre en Tarjeta
    <input name="name" class="ccjs-name">
  </label>

  <fieldset class="ccjs-expiration">
    <legend>Expiración</legend>
    <select name="month" class="ccjs-month">
      <option selected disabled>MM</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>

    <select name="year" class="ccjs-year">
      <option selected disabled>YY</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
    </select>
  </fieldset>

  <select name="card-type" class="ccjs-hidden-card-type">
    <option value="amex" class="ccjs-amex">American Express</option>
    <option value="discover" class="ccjs-discover">Discover</option>
    <option value="mastercard" class="ccjs-mastercard">MasterCard</option>
    <option value="visa" class="ccjs-visa">Visa</option>
    <option value="diners-club" class="ccjs-diners-club">Diners Club</option>
    <option value="jcb" class="ccjs-jcb">JCB</option>
    <!--<option value="laser" class="laser">Laser</option>-->
    <!--<option value="maestro" class="maestro">Maestro</option>-->
    <!--<option value="unionpay" class="unionpay">UnionPay</option>-->
    <!--<option value="visa-electron" class="visa-electron">Visa Electron</option>-->
    <!--<option value="dankort" class="dankort">Dankort</option>-->
  </select>
</div>

<script src="{{ asset('dist/creditcardjs/creditcardjs-v0.10.13.min.js') }}"></script>
<script type="text/javascript" charset="utf-8">
  creditcardjs.onValidityChange(function(isValid) {
    if (isValid) {
      
    } else {
      document.getElementById("myCheckbox").addEventListener("click", function(event){
          event.preventDefault()
      });
    }
  });
</script>